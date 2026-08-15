import { Feather, FontAwesome5, MaterialIcons } from "@expo/vector-icons";
import { useNavigation } from '@react-navigation/native';
import { NativeStackNavigationProp } from '@react-navigation/native-stack';
import AsyncStorage from '@react-native-async-storage/async-storage';

import React, { useEffect, useRef, useState } from "react";
import {
  ActivityIndicator,
  Animated,
  Dimensions,
  RefreshControl,
  ScrollView,
  StyleSheet,
  Text,
  TouchableOpacity,
  View
} from "react-native";
import * as Animatable from 'react-native-animatable';
import {
  BarChart,
  LineChart,
  PieChart,
} from "react-native-chart-kit";

type RootStackParamList = {
  Dashboard: undefined;
  Profile: undefined;
  Articles: undefined;
  Messages: undefined;
  Settings: undefined;
  Infos: undefined;
  Sections: undefined;
  contexts: undefined;
};

const screenWidth = Dimensions.get("window").width;

const Dashboard = () => {
  type FeatherIconName = React.ComponentProps<typeof Feather>['name'];

  // Définition correcte du tableau des onglets avec leurs noms, écrans et icônes
  const tabs: { name: string; screen: keyof RootStackParamList; icon: FeatherIconName }[] = [
    { name: "Accueil", screen: "Dashboard", icon: "home" },
    { name: "Profil", screen: "Profile", icon: "user" },
    { name: "Articles", screen: "Articles", icon: "file-text" },
    { name: "Messages", screen: "Messages", icon: "message-square" },
    { name: "Paramètres", screen: "Settings", icon: "settings" },
    { name: "Infos", screen: "Infos", icon: "info" },
    { name: "Sections", screen: "Sections", icon: "layers" },
    { name: "Contexts", screen: "contexts", icon: "book" },
  ];

  const navigation = useNavigation<NativeStackNavigationProp<RootStackParamList>>();

  // Gestion de l'onglet actif
  const [activeTab, setActiveTab] = useState<string>("Accueil");

  const [loading, setLoading] = useState(true);
  const [refreshing, setRefreshing] = useState(false);
  const [error, setError] = useState<string | null>(null);
  const [user, setUser] = useState(null);
const API_URL = 'http://192.168.1.66/ojs/index.php/humanite/api/v1/users';
const TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyI4N2ZjYzExOWI0NWE1ZTk5NmZkNWJlYzQzNmRjZTcxZmRiNjM5NmY1Il0.ugW4pD4h8ww92cEEkMfbPboC7cr5Fas3PD9zqYCZCYM';

  const [totalUsers, setTotalUsers] = useState(0);
  const [totalSubmissions, setTotalSubmissions] = useState(0);
  const [submissionByDate, setSubmissionByDate] = useState<{ date: string; count: number }[]>([]);
  const [submissionByStatus, setSubmissionByStatus] = useState<
    { name: string; count: number; color: string; legendFontColor: string; legendFontSize: number }[]
  >([]);
  const [reviewsCount, setReviewsCount] = useState(0);

  const [isSidebarOpen, setIsSidebarOpen] = useState(false);
  const [isAnimating, setIsAnimating] = useState(false);

  // État pour le nom de l'utilisateur
  const [userName, setUserName] = useState<string>("");

  const sidebarAnimation = useRef(new Animated.Value(-300)).current;

  const token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyI4N2ZjYzExOWI0NWE1ZTk5NmZkNWJlYzQzNmRjZTcxZmRiNjM5NmY1Il0.ugW4pD4h8ww92cEEkMfbPboC7cr5Fas3PD9zqYCZCYM";

  useEffect(() => {
    const fetchUserInfo = async () => {
      try {
        const response = await fetch(API_URL, {
          headers: {
            Authorization: `Bearer ${TOKEN}`,
          },
        });
        const data = await response.json();
        console.log("Données reçues :", data);
        setUser(data.items?.[0] || null);
      } catch (error) {
        console.error('Erreur API :', error);
        setUser(null);
      } finally {
        setLoading(false);
      }
    };

    fetchUserInfo();
  }, []);

  const fetchDashboard = async () => {
    try {
      setLoading(true);
      setError(null);

      // Récupération des informations de l'utilisateur
      const resUserProfile = await fetch("http://192.168.1.66/ojs/index.php/humanite/api/v1/user", {
        headers: { Authorization: `Bearer ${token}` },
      });
      if (!resUserProfile.ok) {
        console.warn("Erreur lors de la récupération du profil utilisateur");
        setUserName("Utilisateur"); // Valeur de secours
      } else {
        const userProfile = await resUserProfile.json();
        setUserName(userProfile.givenName || userProfile.username || "Utilisateur");
      }

      const resUsers = await fetch("http://192.168.1.66/ojs/index.php/humanite/api/v1/users", {
        headers: { Authorization: `Bearer ${token}` },
      });
      if (!resUsers.ok) throw new Error("Erreur chargement utilisateurs");
      const usersData = await resUsers.json();
      setTotalUsers(usersData.itemsMax);

      const resSubs = await fetch("http://192.168.1.66/ojs/index.php/humanite/api/v1/submissions", {
        headers: { Authorization: `Bearer ${token}` },
      });
      if (!resSubs.ok) throw new Error("Erreur chargement soumissions");
      const subsData = await resSubs.json();

      setTotalSubmissions(subsData.itemsMax);

      const dateCountMap: { [key: string]: number } = {};
      const statusCountMap: { [key: string]: number } = {};

      subsData.items.forEach((item: any) => {
        const date = item.dateSubmitted?.split("T")[0] || item.dateSubmitted?.split(" ")[0];
        if (date) {
          dateCountMap[date] = (dateCountMap[date] || 0) + 1;
        }

        const status = item.statusLabel || "Inconnu";
        statusCountMap[status] = (statusCountMap[status] || 0) + 1;
      });

      const sortedDates = Object.keys(dateCountMap).sort();
      setSubmissionByDate(sortedDates.map((date) => ({ date, count: dateCountMap[date] })));

      const colors = ["#4caf50", "#2196f3", "#f44336", "#6b2133ff", "#9c27b0", "#607d8b"];
      const statuses = Object.entries(statusCountMap);
      const pieData = statuses.map(([name, count], index) => ({
        name,
        count,
        color: colors[index % colors.length],
        legendFontColor: "#555",
        legendFontSize: 14,
      }));
      setSubmissionByStatus(pieData);

      setReviewsCount(20);
    } catch (e: any) {
      setError(e.message || "Erreur inconnue");
      console.error("Dashboard error:", e);
    } finally {
      setLoading(false);
      setRefreshing(false);
    }
  };

  useEffect(() => {
    fetchDashboard();
  }, []);

  const onRefresh = () => {
    setRefreshing(true);
    fetchDashboard();
  };

  const toggleSidebar = () => {
    if (isAnimating) return;

    setIsAnimating(true);
    const toValue = isSidebarOpen ? -300 : 0;

    Animated.timing(sidebarAnimation, {
      toValue,
      duration: 300,
      useNativeDriver: true,
    }).start(() => {
      setIsSidebarOpen(!isSidebarOpen);
      setIsAnimating(false);
    });
  };

  const handleNavigation = (screen: keyof RootStackParamList, tabName: string) => {
    setActiveTab(tabName);
    toggleSidebar();
    navigation.navigate(screen);
  };

const handleLogout = async () => {
  try {
    // Supprimer les données de session (par exemple, token)
    await AsyncStorage.removeItem('token');
    await AsyncStorage.removeItem('user'); // si tu stockes aussi l'utilisateur

    console.log("Utilisateur déconnecté");

    // Redirection vers l'écran de connexion en réinitialisant la navigation
    navigation.reset({
      index: 0,
      routes: [{ name: 'LoginScreen' }], // ⚠️ Vérifie que 'Login' est bien le nom de ton écran de connexion
    });
  } catch (error) {
    console.error("Erreur lors de la déconnexion :", error);
  }
};

  const renderContent = () => {
    switch (activeTab) {
      case "Accueil":
        return <Text style={styles.contentText}>Bienvenue sur l'accueil</Text>;
      case "Profil":
        return <Text style={styles.contentText}>Voici votre profil</Text>;
      case "Articles":
        return <Text style={styles.contentText}>Liste des articles</Text>;
      case "Messages":
        return <Text style={styles.contentText}>Vos messages</Text>;
      case "Paramètres":
        return <Text style={styles.contentText}>Paramètres de l'app</Text>;
      case "Infos":
        return <Text style={styles.contentText}>Informations diverses</Text>;
      case "Sections":
        return <Text style={styles.contentText}>Liste des sections</Text>;
      case "Contexts":
        return <Text style={styles.contentText}>Liste des contextes</Text>;
      default:
        return null;
    }
  };

  if (loading && !refreshing) {
    return (
      <View style={styles.center}>
        <ActivityIndicator size="large" color="#6b2133" />
        <Text style={{ marginTop: 10, color: "#555" }}>Chargement du dashboard...</Text>
      </View>
    );
  }

  if (error) {
    return (
      <View style={styles.center}>
        <Feather name="alert-circle" size={48} color="#f44336" />
        <Text style={{ color: "#f44336", fontSize: 18, marginTop: 15 }}>{error}</Text>
        <Text style={styles.refreshText} onPress={fetchDashboard}>
          Réessayer
        </Text>
      </View>
    );
  }

  return (
    <View style={styles.mainContainer}>
      {/* Sidebar */}
      <Animated.View
        style={[styles.sidebar,
          {
            transform: [{ translateX: sidebarAnimation }],
            zIndex: 100,
          }]}
      >
        {tabs.map(({ name, screen, icon }) => (
          <TouchableOpacity
            key={name}
            onPress={() => handleNavigation(screen, name)}
            style={styles.sidebarItem}
            disabled={isAnimating}
          >
            <Feather name={icon} size={20} color="#6b2133" />
            <Text style={styles.sidebarText}>{name}</Text>
          </TouchableOpacity>
        ))}
      </Animated.View>

      {/* Overlay when sidebar is open */}
      {isSidebarOpen && (
        <TouchableOpacity
          onPress={toggleSidebar}
          activeOpacity={1}
          style={StyleSheet.absoluteFill}
        >
          <Animated.View
            pointerEvents={isSidebarOpen ? 'auto' : 'none'}
            style={[
              StyleSheet.absoluteFill,
              {
                backgroundColor: 'rgba(0,0,0,0.3)',
                opacity: sidebarAnimation.interpolate({
                  inputRange: [-300, 0],
                  outputRange: [0, 0.3],
                }),
              },
            ]}
          />
        </TouchableOpacity>
      )}

      {/* Main Content */}
      <ScrollView
        style={styles.container}
        refreshControl={
          <RefreshControl
            refreshing={refreshing}
            onRefresh={onRefresh}
            colors={["#6b2133"]}
            tintColor="#6b2133"
          />
        }
      >
        {/* Barre de navigation horizontale améliorée */}
        <View style={styles.navContainer}>
          <View style={styles.navHeader}>
            <Text style={styles.welcomeText}>Bienvenu {user.familyName?.fr || ''}</Text>
            <TouchableOpacity
              style={styles.logoutButton}
              onPress={handleLogout}
            >
              <Feather name="log-out" size={18} color="#fff" />
              <Text style={styles.logoutText}>Déconnexion</Text>
            </TouchableOpacity>
          </View>
          <ScrollView
            horizontal
            showsHorizontalScrollIndicator={false}
            contentContainerStyle={styles.navScrollContent}
          >
            {tabs.map(({ name, screen, icon }) => (
              <TouchableOpacity
                key={name}
                style={[
                  styles.tabItem,
                  activeTab === name && styles.activeTabItem,
                  activeTab === name && styles.activeTabShadow,
                ]}
                onPress={() => {
                  setActiveTab(name);
                  navigation.navigate(screen);
                }}
              >
                <Feather
                  name={icon}
                  size={18}
                  color={activeTab === name ? "#fff" : "#6b2133"}
                  style={styles.tabIcon}
                />
                <Text style={[styles.tabText, activeTab === name && styles.activeTabText]}>{name}</Text>
              </TouchableOpacity>
            ))}
          </ScrollView>
        </View>

        {/* Contenu de l'onglet actif */}
        <View style={styles.contentContainer}>
          {renderContent()}
        </View>

        {/* Statistiques */}
        <Animatable.View animation="fadeIn" duration={800}>
          <View style={styles.cardRow}>
            <Animatable.View
              animation="fadeInLeft"
              duration={600}
              delay={100}
              style={[styles.card, { backgroundColor: "#6b2133" }]}
            >
              <MaterialIcons name="people" size={36} color="#fff" />
              <Text style={styles.cardTitle}>Utilisateurs</Text>
              <Text style={styles.cardNumber}>{totalUsers}</Text>
              <Text style={styles.cardSubtitle}>+12% ce mois</Text>
            </Animatable.View>

            <Animatable.View
              animation="fadeInUp"
              duration={600}
              delay={200}
              style={[styles.card, { backgroundColor: "#4caf50" }]}
            >
              <FontAwesome5 name="file-alt" size={36} color="#fff" />
              <Text style={styles.cardTitle}>Soumissions</Text>
              <Text style={styles.cardNumber}>{totalSubmissions}</Text>
              <Text style={styles.cardSubtitle}>+5 nouvelles</Text>
            </Animatable.View>

            <Animatable.View
              animation="fadeInRight"
              duration={600}
              delay={300}
              style={[styles.card, { backgroundColor: "#2196f3" }]}
            >
              <MaterialIcons name="rate-review" size={36} color="#fff" />
              <Text style={styles.cardTitle}>Revues</Text>
              <Text style={styles.cardNumber}>{reviewsCount}</Text>
              <Text style={styles.cardSubtitle}>3 en attente</Text>
            </Animatable.View>
          </View>

          <View style={styles.sectionContainer}>
            <Text style={styles.sectionTitle}>Soumissions par date</Text>
            {submissionByDate.length === 0 ? (
              <View style={styles.noDataContainer}>
                <Feather name="database" size={40} color="#ccc" />
                <Text style={styles.noData}>Aucune donnée disponible</Text>
              </View>
            ) : (
              <Animatable.View animation="fadeInUp" duration={800} delay={200}>
                <ScrollView
                  horizontal
                  showsHorizontalScrollIndicator={false}
                  contentContainerStyle={{ paddingRight: 20 }}
                >
                  <BarChart
                    data={{
                      labels: submissionByDate.map((d) => {
                        const dateObj = new Date(d.date);
                        return `${dateObj.getDate()}/${dateObj.getMonth() + 1}`;
                      }),
                      datasets: [
                        {
                          data: submissionByDate.map((d) => d.count),
                          colors: submissionByDate.map(() => (opacity = 1) => `rgba(107, 33, 51, ${opacity})`),
                        },
                      ],
                    }}
                    width={Math.max(screenWidth * 1.5, submissionByDate.length * 50)}
                    height={280}
                    yAxisLabel=""
                    yAxisSuffix=""
                    chartConfig={chartConfig}
                    verticalLabelRotation={45}
                    style={styles.chart}
                    fromZero
                    showValuesOnTopOfBars
                    withCustomBarColorFromData
                    flatColor={true}
                    withInnerLines={false}
                    xLabelsOffset={-10}
                  />
                </ScrollView>
                <Text style={styles.chartNote}>Faites glisser pour voir toutes les dates</Text>
              </Animatable.View>
            )}
          </View>

          <View style={styles.sectionContainer}>
            <Text style={styles.sectionTitle}>Répartition des statuts</Text>
            {submissionByStatus.length === 0 ? (
              <View style={styles.noDataContainer}>
                <Feather name="pie-chart" size={40} color="#ccc" />
                <Text style={styles.noData}>Aucune donnée disponible</Text>
              </View>
            ) : (
              <Animatable.View animation="fadeInUp" duration={800} delay={300}>
                <PieChart
                  data={submissionByStatus}
                  width={screenWidth - 30}
                  height={220}
                  chartConfig={chartConfig}
                  accessor={"count"}
                  backgroundColor="transparent"
                  paddingLeft="15"
                  absolute
                  style={styles.chart}
                />
              </Animatable.View>
            )}
          </View>

          <View style={styles.sectionContainer}>
            <Text style={styles.sectionTitle}>Activité récente</Text>
            <Animatable.View animation="fadeInUp" duration={800} delay={400}>
              <LineChart
                data={{
                  labels: ["Jan", "Fév", "Mar", "Avr", "Mai", "Juin"],
                  datasets: [
                    {
                      data: [20, 45, 28, 80, 99, 43],
                      color: (opacity = 1) => `rgba(107, 33, 51, ${opacity})`,
                      strokeWidth: 2,
                    },
                    {
                      data: [30, 90, 67, 15, 126, 82],
                      color: (opacity = 1) => `rgba(33, 150, 243, ${opacity})`,
                      strokeWidth: 2,
                    },
                  ],
                  legend: ["Revues", "Soumissions"],
                }}
                width={screenWidth - 30}
                height={220}
                chartConfig={chartConfig}
                fromZero
                style={styles.chart}
                bezier
              />
            </Animatable.View>
          </View>
        </Animatable.View>
      </ScrollView>
    </View>
  );
};

const chartConfig = {
  backgroundGradientFrom: "#fff",
  backgroundGradientTo: "#fff",
  color: (opacity = 1) => `rgba(107, 33, 51, ${opacity})`,
  strokeWidth: 2,
  barPercentage: 0.7,
  decimalPlaces: 0,
  useShadowColorFromDataset: false,
  propsForBackgroundLines: {
    strokeDasharray: "",
    stroke: "#eee",
    strokeWidth: 1,
  },
  propsForLabels: {
    fontFamily: "sans-serif",
    fontSize: 12,
  },
  fillShadowGradient: '#6b2133',
  fillShadowGradientOpacity: 0.3,
};

const styles = StyleSheet.create({
  mainContainer: {
    flex: 1,
    backgroundColor: "#f8f9fa",
  },
  container: {
    flex: 1,
    backgroundColor: "#f8f9fa",
    paddingTop: 20,
    paddingHorizontal: 15,
  },
  center: {
    flex: 1,
    justifyContent: "center",
    alignItems: "center",
    backgroundColor: "#f8f9fa",
  },
  sidebar: {
    position: 'absolute',
    top: 0,
    left: 0,
    width: 250,
    height: '100%',
    backgroundColor: '#fff',
    paddingVertical: 80,
    paddingHorizontal: 20,
    zIndex: 100,
    elevation: 30,
  },
  sidebarItem: {
    flexDirection: "row",
    alignItems: "center",
    paddingVertical: 15,
  },
  sidebarText: {
    marginLeft: 12,
    fontSize: 16,
    color: "#6b2133",
    fontWeight: "600",
    fontFamily: 'sans-serif-medium',
  },
  cardRow: {
    flexDirection: "row",
    justifyContent: "space-between",
    marginBottom: 25,
    flexWrap: 'wrap',
  },
  card: {
    width: '30%',
    minWidth: 100,
    borderRadius: 12,
    paddingVertical: 20,
    paddingHorizontal: 10,
    marginBottom: 15,
    justifyContent: "center",
    alignItems: "center",
    elevation: 3,
    shadowColor: "#000",
    shadowOpacity: 0.1,
    shadowRadius: 6,
    shadowOffset: { width: 0, height: 3 },
  },
  cardTitle: {
    color: "#fff",
    fontSize: 14,
    marginTop: 8,
    fontWeight: "600",
    fontFamily: 'sans-serif-medium',
  },
  cardNumber: {
    fontSize: 28,
    fontWeight: "bold",
    color: "#fff",
    marginTop: 4,
    fontFamily: 'sans-serif',
  },
  cardSubtitle: {
    fontSize: 11,
    color: "rgba(255,255,255,0.8)",
    marginTop: 4,
    fontFamily: 'sans-serif',
  },
  sectionContainer: {
    marginBottom: 30,
    backgroundColor: '#fff',
    borderRadius: 12,
    padding: 15,
    elevation: 2,
    shadowColor: "#000",
    shadowOpacity: 0.05,
    shadowRadius: 5,
    shadowOffset: { width: 0, height: 2 },
  },
  sectionTitle: {
    fontSize: 18,
    fontWeight: "700",
    marginBottom: 15,
    color: "#444",
    fontFamily: 'sans-serif-medium',
  },
  chart: {
    borderRadius: 12,
    marginBottom: 5,
  },
  noDataContainer: {
    justifyContent: "center",
    alignItems: "center",
    padding: 20,
  },
  noData: {
    textAlign: "center",
    color: "#888",
    fontSize: 16,
    marginTop: 10,
    fontFamily: 'sans-serif',
  },
  refreshText: {
    color: "#6b2133",
    marginTop: 20,
    fontSize: 16,
    textDecorationLine: 'underline',
    fontFamily: 'sans-serif-medium',
  },
  chartNote: {
    textAlign: 'center',
    color: '#888',
    fontSize: 12,
    marginTop: 5,
    fontStyle: 'italic',
  },
  navContainer: {
    backgroundColor: "#FFFFFF",
    paddingVertical: 10,
    borderBottomWidth: 1,
    borderBottomColor: "#f0f0f0",
    marginBottom: 15,
    elevation: 2,
    shadowColor: "#000",
    shadowOpacity: 0.1,
    shadowRadius: 3,
    shadowOffset: { width: 0, height: 2 },
  },
  navHeader: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
    paddingHorizontal: 15,
    paddingBottom: 10,
  },
  welcomeText: {
    fontSize: 16,
    fontWeight: '600',
    color: '#6b2133',
    fontFamily: 'sans-serif-medium',
  },
  logoutButton: {
    flexDirection: 'row',
    alignItems: 'center',
    backgroundColor: '#f44336',
    paddingVertical: 8,
    paddingHorizontal: 12,
    borderRadius: 20,
  },
  logoutText: {
    color: '#fff',
    fontSize: 14,
    fontWeight: '600',
    marginLeft: 6,
  },
  navScrollContent: {
    paddingHorizontal: 15,
  },
  tabItem: {
    paddingVertical: 10,
    paddingHorizontal: 20,
    marginRight: 12,
    borderRadius: 20,
    backgroundColor: "transparent",
    position: 'relative',
    flexDirection: 'row',
    alignItems: 'center',
  },
  activeTabItem: {
    backgroundColor: "#6b2133",
  },
  activeTabShadow: {
    shadowColor: "#6b2133",
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.2,
    shadowRadius: 4,
    elevation: 3,
  },
  tabText: {
    color: "#555",
    fontWeight: "600",
    fontSize: 14,
  },
  activeTabText: {
    color: "#FFFFFF",
  },
  tabIcon: {
    marginRight: 8,
  },
  contentContainer: {
    flex: 1,
    padding: 20,
    justifyContent: "center",
    alignItems: "center",
  },
  contentText: {
    fontSize: 20,
    color: "#1E293B",
  },
});

export default Dashboard;
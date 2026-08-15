import React, { useEffect, useState } from 'react';
import { View, Text, FlatList, ActivityIndicator, StyleSheet } from 'react-native';
import Icon from 'react-native-vector-icons/FontAwesome'; // Icônes inspirées de Bootstrap

interface User {
  id: number;
  username: string;
  email: string;
  givenName?: { [lang: string]: string };
  familyName?: { [lang: string]: string };
}

const InfosScreen = () => {
  const [users, setUsers] = useState<User[]>([]);
  const [loading, setLoading] = useState<boolean>(true);
  const [error, setError] = useState<string | null>(null);

  const API_URL = 'http://192.168.1.66/ojs/index.php/humanite/api/v1/users';
  const TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyI4N2ZjYzExOWI0NWE1ZTk5NmZkNWJlYzQzNmRjZTcxZmRiNjM5NmY1Il0.ugW4pD4h8ww92cEEkMfbPboC7cr5Fas3PD9zqYCZCYM';

  useEffect(() => {
    fetch(API_URL, {
      method: 'GET',
      headers: {
        'Authorization': `Bearer ${TOKEN}`,
        'Content-Type': 'application/json',
        'Accept': 'application/json',
      },
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error(`Erreur HTTP ${response.status}`);
        }
        return response.json();
      })
      .then((data) => {
        setUsers(data.items || []);
        setLoading(false);
      })
      .catch((err) => {
        setError(err.message);
        setLoading(false);
      });
  }, []);

  const renderItem = ({ item }: { item: User }) => (
    <View style={styles.card}>
      <View style={styles.cardHeader}>
        <Icon name="user" size={20} color="#fff" style={styles.icon} />
        <Text style={styles.cardTitle}>{item.username}</Text>
      </View>
      <View style={styles.cardBody}>
        <View style={styles.infoRow}>
          <Icon name="envelope" size={16} color="#007bff" style={styles.infoIcon} />
          <Text style={styles.infoText}>Email : {item.email}</Text>
        </View>
        <View style={styles.infoRow}>
          <Icon name="user-o" size={16} color="#007bff" style={styles.infoIcon} />
          <Text style={styles.infoText}>
            Nom : {item.givenName?.fr || 'N/A'} {item.familyName?.fr || ''}
          </Text>
        </View>
      </View>
    </View>
  );

  if (loading) {
    return (
      <View style={styles.loadingContainer}>
        <ActivityIndicator size="large" color="#007bff" />
        <Text style={styles.loadingText}>Chargement des utilisateurs...</Text>
      </View>
    );
  }

  if (error) {
    return (
      <View style={styles.loadingContainer}>
        <View style={styles.card}>
          <View style={styles.cardHeader}>
            <Icon name="exclamation-circle" size={24} color="#fff" style={styles.icon} />
            <Text style={styles.cardTitle}>Erreur</Text>
          </View>
          <View style={styles.cardBody}>
            <Text style={styles.errorText}>Erreur : {error}</Text>
          </View>
        </View>
      </View>
    );
  }

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Liste des utilisateurs</Text>
      <FlatList
        data={users}
        keyExtractor={(item) => item.id.toString()}
        renderItem={renderItem}
        contentContainerStyle={styles.listContent}
        ListEmptyComponent={
          <View style={styles.card}>
            <View style={styles.cardHeader}>
              <Icon name="info-circle" size={24} color="#fff" style={styles.icon} />
              <Text style={styles.cardTitle}>Aucun utilisateur</Text>
            </View>
            <View style={styles.cardBody}>
              <Text style={styles.infoText}>Aucun utilisateur trouvé.</Text>
            </View>
          </View>
        }
      />
    </View>
  );
};

export default InfosScreen;

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f8f9fa', // Fond gris clair Bootstrap
    padding: 15,
  },
  loadingContainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#f8f9fa',
  },
  loadingText: {
    fontSize: 16,
    color: '#495057', // Couleur texte Bootstrap
    marginTop: 10,
  },
  title: {
    fontSize: 28,
    fontWeight: 'bold',
    color: '#343a40', // Couleur sombre Bootstrap
    textAlign: 'center',
    marginBottom: 20,
  },
  card: {
    backgroundColor: '#fff',
    borderRadius: 8,
    marginBottom: 15,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.1,
    shadowRadius: 4,
    elevation: 3, // Pour Android
  },
  cardHeader: {
    backgroundColor: '#773434ff', // Bleu primaire Bootstrap
    padding: 10,
    borderTopLeftRadius: 8,
    borderTopRightRadius: 8,
    flexDirection: 'row',
    alignItems: 'center',
  },
  cardTitle: {
    fontSize: 18,
    fontWeight: '600',
    color: '#fff',
    flex: 1, // Permet au titre de prendre l'espace disponible
  },
  cardBody: {
    padding: 15,
  },
  infoRow: {
    flexDirection: 'row',
    alignItems: 'center',
    marginBottom: 8,
  },
  infoIcon: {
    marginRight: 10,
  },
  infoText: {
    fontSize: 16,
    color: '#495057', // Couleur texte Bootstrap
  },
  errorText: {
    fontSize: 16,
    color: '#dc3545', // Rouge pour erreur Bootstrap
    textAlign: 'center',
  },
  icon: {
    marginRight: 10,
  },
  listContent: {
    paddingBottom: 20, // Espace en bas pour éviter que le dernier élément soit coupé
  },
});
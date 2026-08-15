import React, { useEffect, useState } from "react";
import { ActivityIndicator, FlatList, StyleSheet, Text, View } from "react-native";
import Icon from "react-native-vector-icons/FontAwesome"; // Icônes inspirées de Bootstrap

// Remplace ceci par ton token JWT réel obtenu lors du login
const JWT_TOKEN = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyI4N2ZjYzExOWI0NWE1ZTk5NmZkNWJlYzQzNmRjZTcxZmRiNjM5NmY1Il0.ugW4pD4h8ww92cEEkMfbPboC7cr5Fas3PD9zqYCZCYM";

interface Publication {
  id: number;
  fullTitle: { [lang: string]: string };
  datePublished: string | null;
  status: number;
  urlPublished: string;
}

interface Submission {
  id: number;
  dateSubmitted: string;
  statusLabel: string;
  publications: Publication[];
}

interface ApiResponse {
  itemsMax: number;
  items: Submission[];
}

export default function SubmissionsList() {
  const [loading, setLoading] = useState(true);
  const [submissions, setSubmissions] = useState<Submission[]>([]);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    fetch("http://192.168.1.66/ojs/index.php/humanite/api/v1/submissions", {
      headers: {
        "Content-Type": "application/json",
        "Authorization": `Bearer ${JWT_TOKEN}`, // Auth obligatoire
      },
    })
      .then((res) => {
        if (!res.ok) {
          throw new Error(`Erreur HTTP ${res.status}`);
        }
        return res.json();
      })
      .then((data: ApiResponse) => {
        setSubmissions(data.items);
      })
      .catch((err) => {
        setError(err.message);
      })
      .finally(() => setLoading(false));
  }, []);

  if (loading) {
    return (
      <View style={styles.loadingContainer}>
        <ActivityIndicator size="large" color="#007bff" />
        <Text style={styles.loadingText}>Chargement des soumissions...</Text>
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
      <Text style={styles.title}>Liste des soumissions</Text>
      <FlatList
        data={submissions}
        keyExtractor={(item) => item.id.toString()}








        renderItem={({ item }) => {
  const publication = item.publications[0];
  const title = publication?.fullTitle?.fr || publication?.title?.fr || "Titre non disponible";

  return (
    <View style={styles.card}>
      <View style={styles.cardHeader}>
        <Icon name="file-text" size={20} color="#fff" style={styles.icon} />
        <Text style={styles.cardTitle}>{title}</Text>
      </View>
      <View style={styles.cardBody}>
        <View style={styles.infoRow}>
          <Icon name="calendar" size={16} color="#007bff" style={styles.infoIcon} />
          <Text style={styles.infoText}>
            Soumis le : {new Date(item.dateSubmitted).toLocaleString()}
          </Text>
        </View>
        <View style={styles.infoRow}>
          <Icon name="info-circle" size={16} color="#007bff" style={styles.infoIcon} />
          <Text style={styles.infoText}>Statut : {item.statusLabel}</Text>
        </View>
      </View>
    </View>
  );
}}







        ListEmptyComponent={
          <View style={styles.card}>
            <View style={styles.cardHeader}>
              <Icon name="info-circle" size={24} color="#fff" style={styles.icon} />
              <Text style={styles.cardTitle}>Aucune soumission</Text>
            </View>
            <View style={styles.cardBody}>
              <Text style={styles.infoText}>Aucune soumission trouvée.</Text>
            </View>
          </View>
        }
        contentContainerStyle={styles.listContent}
      />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#f8f9fa", // Fond gris clair Bootstrap
    padding: 15,
  },
  loadingContainer: {
    flex: 1,
    justifyContent: "center",
    alignItems: "center",
    backgroundColor: "#f8f9fa",
  },
  loadingText: {
    fontSize: 16,
    color: "#495057",
    marginTop: 10,
  },
  title: {
    fontSize: 28,
    fontWeight: "bold",
    color: "#343a40", // Couleur sombre Bootstrap
    textAlign: "center",
    marginBottom: 20,
  },
  card: {
    backgroundColor: "#fff",
    borderRadius: 8,
    marginBottom: 15,
    shadowColor: "#000",
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.1,
    shadowRadius: 4,
    elevation: 3, // Pour Android
  },
  cardHeader: {
    backgroundColor: "#6b2525ff", // Bleu primaire Bootstrap
    padding: 10,
    borderTopLeftRadius: 8,
    borderTopRightRadius: 8,
    flexDirection: "row",
    alignItems: "center",
  },
  cardTitle: {
    fontSize: 18,
    fontWeight: "600",
    color: "#fff",
    flex: 1, // Permet au titre de prendre l'espace disponible
  },
  cardBody: {
    padding: 15,
  },
  infoRow: {
    flexDirection: "row",
    alignItems: "center",
    marginBottom: 8,
  },
  infoIcon: {
    marginRight: 10,
  },
  infoText: {
    fontSize: 16,
    color: "#495057", // Couleur texte Bootstrap
  },
  errorText: {
    fontSize: 16,
    color: "#dc3545", // Rouge pour erreur Bootstrap
    textAlign: "center",
  },
  icon: {
    marginRight: 10,
  },
  listContent: {
    paddingBottom: 20, // Espace en bas pour éviter que le dernier élément soit coupé
  },
});
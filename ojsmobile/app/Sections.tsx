import React, { useEffect, useState } from 'react';
import {
  View,
  Text,
  FlatList,
  ActivityIndicator,
  StyleSheet,
  SafeAreaView,
} from 'react-native';
import Icon from 'react-native-vector-icons/FontAwesome'; // Icônes inspirées de Bootstrap

const API_URL = 'http://192.168.1.66/ojs/index.php/humanite/api/v1/sections/';
const TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyI4N2ZjYzExOWI0NWE1ZTk5NmZkNWJlYzQzNmRjZTcxZmRiNjM5NmY1Il0.ugW4pD4h8ww92cEEkMfbPboC7cr5Fas3PD9zqYCZCYM';

interface Section {
  id: number;
  abbrev: { fr: string };
  title: { fr: string };
  policy?: { fr: string };
  metaIndexed: boolean;
  metaReviewed: boolean;
  abstractsNotRequired: boolean;
}

export default function SectionsScreen() {
  const [sections, setSections] = useState<Section[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  const fetchSections = async () => {
    try {
      const response = await fetch(API_URL, {
        headers: {
          Authorization: `Bearer ${TOKEN}`,
          Accept: 'application/json',
        },
      });
      if (!response.ok) throw new Error(`Erreur HTTP ${response.status}`);
      const data = await response.json();
      setSections(data.items || []);
    } catch (err: any) {
      setError(err.message);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    fetchSections();
  }, []);

  const renderItem = ({ item }: { item: Section }) => (
    <View style={styles.card}>
      <View style={styles.cardHeader}>
        <Icon name="folder" size={20} color="#fff" style={styles.icon} />
        <Text style={styles.cardTitle}>{item.title.fr}</Text>
      </View>
      <View style={styles.cardBody}>
        <View style={styles.infoRow}>
          <Icon name="tag" size={16} color="#000000ff" style={styles.infoIcon} />
          <Text style={styles.infoText}>Abréviation : {item.abbrev.fr}</Text>
        </View>
        {item.policy?.fr && (
          <View style={styles.infoRow}>
            <Icon name="file-text-o" size={16} color="#000000ff" style={styles.infoIcon} />
            <Text style={styles.infoText}>Politique : {item.policy.fr}</Text>
          </View>
        )}
        <View style={styles.infoRow}>
          <Icon name="search" size={16} color="#000000ff" style={styles.infoIcon} />
          <Text style={styles.infoText}>Indexé : {item.metaIndexed ? 'Oui' : 'Non'}</Text>
        </View>
        <View style={styles.infoRow}>
          <Icon name="check-circle" size={16} color="#000000ff" style={styles.infoIcon} />
          <Text style={styles.infoText}>Revu : {item.metaReviewed ? 'Oui' : 'Non'}</Text>
        </View>
        <View style={styles.infoRow}>
          <Icon name="file" size={16} color="#000000ff" style={styles.infoIcon} />
          <Text style={styles.infoText}>Résumé requis : {item.abstractsNotRequired ? 'Non' : 'Oui'}</Text>
        </View>
      </View>
    </View>
  );

  if (loading) {
    return (
      <SafeAreaView style={styles.loadingContainer}>
        <ActivityIndicator size="large" color="#000000ff" />
        <Text style={styles.loadingText}>Chargement des sections...</Text>
      </SafeAreaView>
    );
  }

  if (error) {
    return (
      <SafeAreaView style={styles.loadingContainer}>
        <View style={styles.card}>
          <View style={styles.cardHeader}>
            <Icon name="exclamation-circle" size={24} color="#fff" style={styles.icon} />
            <Text style={styles.cardTitle}>Erreur</Text>
          </View>
          <View style={styles.cardBody}>
            <Text style={styles.errorText}>Erreur : {error}</Text>
          </View>
        </View>
      </SafeAreaView>
    );
  }

  return (
    <SafeAreaView style={styles.container}>
      <Text style={styles.title}>Liste des sections</Text>
      <FlatList
        data={sections}
        keyExtractor={(item) => item.id.toString()}
        renderItem={renderItem}
        contentContainerStyle={styles.listContent}
        ListEmptyComponent={
          <View style={styles.card}>
            <View style={styles.cardHeader}>
              <Icon name="info-circle" size={24} color="#fff" style={styles.icon} />
              <Text style={styles.cardTitle}>Aucune section</Text>
            </View>
            <View style={styles.cardBody}>
              <Text style={styles.infoText}>Aucune section trouvée.</Text>
            </View>
          </View>
        }
      />
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f8f9fa', // Fond gris clair Bootstrap
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
    marginVertical: 20,
    paddingHorizontal: 15,
  },
  card: {
    backgroundColor: '#fff',
    borderRadius: 8,
    marginBottom: 15,
    marginHorizontal: 15,
    shadowColor: '#000',
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.1,
    shadowRadius: 4,
    elevation: 3, // Pour Android
  },
  cardHeader: {
    backgroundColor: '#7b3131ff', // Bleu primaire Bootstrap
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
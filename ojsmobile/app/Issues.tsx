import React, { useEffect, useState } from 'react';
import { View, Text, FlatList, ActivityIndicator, StyleSheet, SafeAreaView } from 'react-native';

const API_URL = 'http://192.168.1.66/ojs/index.php/humanite/api/v1/issues';
const TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyI4N2ZjYzExOWI0NWE1ZTk5NmZkNWJlYzQzNmRjZTcxZmRiNjM5NmY1Il0.ugW4pD4h8ww92cEEkMfbPboC7cr5Fas3PD9zqYCZCYM';

const Issues = () => {
  const [issues, setIssues] = useState<any[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  const fetchIssues = async () => {
    try {
      const response = await fetch(API_URL, {
        method: 'GET',
        headers: {
          Authorization: `Bearer ${TOKEN}`,
          Accept: 'application/json',
        },
      });

      if (!response.ok) {
        throw new Error(`Erreur HTTP ${response.status}`);
      }

      const data = await response.json();
      setIssues(data.items || []);
    } catch (err: any) {
      setError(err.message);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    fetchIssues();
  }, []);

  const renderItem = ({ item }: any) => (
    <View style={styles.item}>
      <Text style={styles.title}>Titre: {item.title?.fr_FR || 'Titre inconnu'}</Text>
      <Text style={styles.volume}>Volume: {item.volume} | Numéro: {item.number}</Text>
      <Text style={styles.date}>Date de publication: {item.datePublished}</Text>
    </View>
  );

  if (loading) {
    return <ActivityIndicator size="large" color="#4f0019" />;
  }

  if (error) {
    return (
      <View style={styles.errorContainer}>
        <Text style={styles.error}>Erreur : {error}</Text>
      </View>
    );
  }

  return (
    <SafeAreaView style={styles.container}>
      <Text style={styles.header}>Liste des Revues Publiées</Text>
      <FlatList
        data={issues}
        keyExtractor={(item) => item.id.toString()}
        renderItem={renderItem}
        contentContainerStyle={styles.list}
      />
    </SafeAreaView>
  );
};

export default Issues;

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
  },
  header: {
    fontSize: 22,
    fontWeight: 'bold',
    padding: 20,
    color: '#4f0019',
    textAlign: 'center',
  },
  list: {
    padding: 10,
  },
  item: {
    backgroundColor: '#f5f5f5',
    marginBottom: 10,
    padding: 15,
    borderRadius: 10,
    elevation: 2,
  },
  title: {
    fontSize: 18,
    fontWeight: '600',
    marginBottom: 5,
  },
  volume: {
    fontSize: 14,
    color: '#555',
  },
  date: {
    fontSize: 12,
    color: '#888',
    marginTop: 5,
  },
  errorContainer: {
    padding: 20,
    alignItems: 'center',
  },
  error: {
    color: 'red',
    fontSize: 16,
  },
});

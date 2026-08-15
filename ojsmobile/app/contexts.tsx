import React, { useEffect, useState } from 'react';
import {
  ActivityIndicator,
  FlatList,
  Image,
  SafeAreaView,
  StyleSheet,
  Text,
  View
} from 'react-native';

const API_URL = 'http://192.168.1.66/ojs/index.php/humanite/api/v1/contexts/';
const TOKEN = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WyI4N2ZjYzExOWI0NWE1ZTk5NmZkNWJlYzQzNmRjZTcxZmRiNjM5NmY1Il0.ugW4pD4h8ww92cEEkMfbPboC7cr5Fas3PD9zqYCZCYM';

interface ContextItem {
  id: number;
  name: { fr: string };
  acronym: { fr: string };
  description?: { fr: string };
  journalThumbnail?: {
    fr: {
      uploadName: string;
    };
  };
  url: string;
}

export default function ContextsScreen() {
  const [contexts, setContexts] = useState<ContextItem[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  const fetchContexts = async () => {
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
      setContexts(data.items || []);
    } catch (err: any) {
      setError(err.message);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    fetchContexts();
  }, []);

  const renderItem = ({ item }: { item: ContextItem }) => {
    const thumbnailUrl = item.journalThumbnail?.fr?.uploadName
      ? `http://192.168.1.65/ojs/public/journals/${item.id}/${item.journalThumbnail.fr.uploadName}`
      : null;

    return (
      <View style={styles.card}>
        {thumbnailUrl && (
          <Image source={{ uri: thumbnailUrl }} style={styles.thumbnail} />
        )}
        <Text style={styles.name}>{item.name?.fr}</Text>
        <Text style={styles.acronym}>{item.acronym?.fr}</Text>
        <Text style={styles.url}>{item.url}</Text>
        {item.description?.fr && (
          <Text style={styles.description}>
            {item.description.fr.replace(/<[^>]+>/g, '').slice(0, 200)}...
          </Text>
        )}
      </View>
    );
  };

  if (loading) {
    return (
      <View style={styles.center}>
        <ActivityIndicator size="large" color="#4f0019" />
      </View>
    );
  }

  if (error) {
    return (
      <View style={styles.center}>
        <Text style={styles.error}>Erreur : {error}</Text>
      </View>
    );
  }

  return (
    <SafeAreaView style={styles.container}>
      <FlatList
        data={contexts}
        keyExtractor={(item) => item.id.toString()}
        renderItem={renderItem}
        contentContainerStyle={{ padding: 12 }}
      />
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, backgroundColor: '#fff' },
  center: { flex: 1, justifyContent: 'center', alignItems: 'center' },
  card: {
    backgroundColor: '#f5f5f5',
    marginBottom: 16,
    padding: 14,
    borderRadius: 10,
    elevation: 2,
  },
  name: { fontSize: 18, fontWeight: 'bold', color: '#4f0019' },
  acronym: { fontSize: 14, fontStyle: 'italic', color: '#444', marginTop: 4 },
  url: { fontSize: 12, color: '#0066cc', marginTop: 4 },
  description: { fontSize: 14, color: '#333', marginTop: 8 },
  thumbnail: {
    width: '100%',
    height: 180,
    resizeMode: 'contain',
    marginBottom: 10,
    borderRadius: 8,
  },
  error: { color: 'red', fontSize: 16 },
});

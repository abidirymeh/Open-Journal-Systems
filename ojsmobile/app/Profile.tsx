import React, { useEffect, useState } from 'react';
import { View, Text, StyleSheet, TouchableOpacity, ActivityIndicator } from 'react-native';
import AsyncStorage from '@react-native-async-storage/async-storage';
import { useRouter } from 'expo-router';

const ProfileScreen = () => {
  const [userData, setUserData] = useState<{
    userId: string;
    username: string;
    token: string;
    email: string;
    email_private_1: string;
    email_private_2: string;
  } | null>(null);

  const [loading, setLoading] = useState(true);
  const router = useRouter();

  useEffect(() => {
    const fetchProfile = async () => {
      try {
        const userId = await AsyncStorage.getItem('userId');
        const token = await AsyncStorage.getItem('remember_token');

        if (!userId || !token) {
          router.replace('/login');
          return;
        }

        const response = await fetch('http://192.168.1.66/ojs/api-profile.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ userId, token }),
        });

        const data = await response.json();

        if (data.success) {
          setUserData({
            userId: data.userId,
            username: data.username,
            token: token,
            email: data.email || 'Non disponible',
            email_private_1: data.email_private_1 || 'Non disponible',
            email_private_2: data.email_private_2 || 'Non disponible',
          });
        } else {
          router.replace('/login');
        }
      } catch (error) {
        console.error('Erreur chargement profil:', error);
      } finally {
        setLoading(false);
      }
    };

    fetchProfile();
  }, []);

  const handleLogout = async () => {
    await AsyncStorage.clear();
    router.replace('/login');
  };

  if (loading) {
    return <ActivityIndicator size="large" style={{ flex: 1 }} />;
  }

  if (!userData) {
    return (
      <View style={styles.container}>
        <Text>Utilisateur non connecté.</Text>
        <TouchableOpacity onPress={() => router.replace('/login')}>
          <Text style={styles.link}>Retour à la connexion</Text>
        </TouchableOpacity>
      </View>
    );
  }

  return (
    <View style={styles.container}>
      <Text style={styles.title}>Bienvenue, {userData.username}</Text>
      <Text>ID utilisateur : {userData.userId}</Text>
      <Text>Email : {userData.email}</Text>
      <Text>Email privé 1 : {userData.email_private_1}</Text>
      <Text>Email privé 2 : {userData.email_private_2}</Text>

      <TouchableOpacity onPress={handleLogout} style={styles.button}>
        <Text style={styles.buttonText}>Se déconnecter</Text>
      </TouchableOpacity>
    </View>
  );
};

export default ProfileScreen;

const styles = StyleSheet.create({
  container: { flex: 1, padding: 20, justifyContent: 'center', alignItems: 'center', backgroundColor: '#fff' },
  title: { fontSize: 24, marginBottom: 20 },
  button: { marginTop: 40, padding: 15, backgroundColor: '#b00020', borderRadius: 8 },
  buttonText: { color: '#fff', fontWeight: 'bold' },
  link: { marginTop: 20, color: 'blue' },
});

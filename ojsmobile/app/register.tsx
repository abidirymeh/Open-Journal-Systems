import React, { useState } from 'react';
import { View, TextInput, Button, StyleSheet, Alert } from 'react-native';
import { router } from 'expo-router';

export default function RegisterScreen() {
  const [username, setUsername] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleRegister = async () => {
    try {
      const response = await fetch('http://192.168.1.66/ojs/index.php/myjournal/api/v1/users', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          // Ajoute ici l’authentification si nécessaire (token admin, etc.)
        },
        body: JSON.stringify({
          username,
          email,
          password,
          // D’autres champs nécessaires pour OJS
        }),
      });

      if (response.ok) {
        Alert.alert('Succès', 'Utilisateur enregistré avec succès');
        router.push('/LoginScreen'); // Rediriger vers la page login
      } else {
        const errorData = await response.json();
        Alert.alert('Erreur', errorData.message || 'Échec de l’enregistrement');
      }
    } catch (error) {
      console.error(error);
      Alert.alert('Erreur', 'Problème de connexion');
    }
  };

  return (
    <View style={styles.container}>
      <TextInput
        placeholder="Nom d'utilisateur"
        value={username}
        onChangeText={setUsername}
        style={styles.input}
      />
      <TextInput
        placeholder="Adresse e-mail"
        value={email}
        onChangeText={setEmail}
        style={styles.input}
      />
      <TextInput
        placeholder="Mot de passe"
        value={password}
        secureTextEntry
        onChangeText={setPassword}
        style={styles.input}
      />
      <Button title="S'inscrire" onPress={handleRegister} />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    padding: 20,
    marginTop: 50,
  },
  input: {
    borderWidth: 1,
    marginBottom: 12,
    padding: 10,
    borderRadius: 5,
  },
});

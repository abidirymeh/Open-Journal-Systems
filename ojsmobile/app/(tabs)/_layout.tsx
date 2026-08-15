import { Slot } from 'expo-router';
import { useState, useEffect } from 'react';
import LoginScreen from '../LoginScreen'; // adapte le chemin si besoin
import { View, ActivityIndicator } from 'react-native';

export default function RootLayout() {
  const [isAuthenticated, setIsAuthenticated] = useState<boolean | null>(null); // null = en attente

  useEffect(() => {
    const checkAuth = async () => {
      // Simule un appel à AsyncStorage ou autre logique
      const fakeToken = null; // change par ta vraie logique
      setIsAuthenticated(!!fakeToken);
    };

    checkAuth();
  }, []);

  if (isAuthenticated === null) {
    // encore en train de vérifier -> affiche un écran de chargement
    return (
      <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
        <ActivityIndicator size="large" />
      </View>
    );
  }

  if (!isAuthenticated) {
    // Pass a dummy navigation prop or use a navigation object if available
    return <LoginScreen navigation={{}} />;
  }

  return <Slot />;
}

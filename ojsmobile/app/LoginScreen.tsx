import { useRouter } from 'expo-router';
import React, { useState, useEffect, useRef } from "react";
import { 
  ActivityIndicator, 
  StyleSheet, 
  Text, 
  TextInput, 
  View, 
  Image, 
  Animated, 
  Easing, 
  TouchableOpacity,
  Dimensions,
  ImageBackground
} from "react-native";
import AsyncStorage from '@react-native-async-storage/async-storage';

export default function LoginScreen({ navigation }: { navigation: any }) {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState<string | null>(null);
  const [showIntro, setShowIntro] = useState(true);
  const router = useRouter();

  // Références pour les animations
  const logoScale = useRef(new Animated.Value(0.3)).current;
  const logoOpacity = useRef(new Animated.Value(0)).current;
  const textOpacity = useRef(new Animated.Value(0)).current;
  const bgColor = useRef(new Animated.Value(0)).current;
  const lightRayOpacity = useRef(new Animated.Value(0)).current;
  const lightRayRotation = useRef(new Animated.Value(0)).current;
  const particlesOpacity = useRef(new Animated.Value(0)).current;

  const { width, height } = Dimensions.get('window');

  // Interpolations
  const bgInterpolation = bgColor.interpolate({
    inputRange: [0, 1],
    outputRange: ['rgba(0,0,0,1)', 'rgba(73,1,24,1)']
  });

  const lightRayInterpolation = lightRayRotation.interpolate({
    inputRange: [0, 360],
    outputRange: ['0deg', '360deg']
  });

  useEffect(() => {
    if (showIntro) {
      // Séquence d'animation complète
      Animated.sequence([
        // Phase 1: Apparition du logo avec effet de lumière
        Animated.parallel([
          // Logo qui grossit
          Animated.timing(logoScale, {
            toValue: 1.5,
            duration: 1500,
            easing: Easing.bezier(0.4, 0, 0.2, 1),
            useNativeDriver: true,
          }),
          // Logo qui apparaît
          Animated.timing(logoOpacity, {
            toValue: 1,
            duration: 1000,
            useNativeDriver: true,
          }),
          // Changement de couleur de fond
          Animated.timing(bgColor, {
            toValue: 1,
            duration: 2000,
            useNativeDriver: false,
          }),
          // Rayons de lumière
          Animated.parallel([
            Animated.timing(lightRayOpacity, {
              toValue: 1,
              duration: 800,
              delay: 500,
              useNativeDriver: true,
            }),
            Animated.timing(lightRayRotation, {
              toValue: 360,
              duration: 3000,
              useNativeDriver: true,
            })
          ]),
          // Particules lumineuses
          Animated.timing(particlesOpacity, {
            toValue: 1,
            duration: 1000,
            delay: 700,
            useNativeDriver: true,
          })
        ]),
        
        // Phase 2: Effet de stabilisation
        Animated.parallel([
          Animated.spring(logoScale, {
            toValue: 1,
            friction: 5,
            useNativeDriver: true,
          }),
          Animated.timing(lightRayOpacity, {
            toValue: 0.3,
            duration: 1000,
            useNativeDriver: true,
          })
        ]),
        
        // Phase 3: Apparition du texte
        Animated.timing(textOpacity, {
          toValue: 1,
          duration: 1000,
          useNativeDriver: true,
        }),
        
        // Pause finale
        Animated.delay(2000)
      ]).start(() => {
        setShowIntro(false);
      });
    }
  }, [showIntro]);

  const handleLogin = async () => {
    setLoading(true);
    setError(null);

    try {
      const response = await fetch("http://192.168.1.66/ojs/api-login.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ email, password }),
      });

      const data = await response.json();
      console.log("Réponse login :", data);

    if (data.success) {
  // Sauvegarder les infos utilisateur dans AsyncStorage
  await AsyncStorage.setItem('userId', data.userId.toString());
  await AsyncStorage.setItem('username', data.username || '');
  await AsyncStorage.setItem('remember_token', data.remember_token || '');
  
  router.replace('/dashboard');
} else {
  setError(data.message || "Erreur inconnue");
}


    } catch (e) {
      console.error(e);
      setError("Erreur réseau ou serveur");
    } finally {
      setLoading(false);
    }
  };

  if (showIntro) {
    return (
      <Animated.View style={[styles.introContainer, { backgroundColor: bgInterpolation }]}>
        {/* Rayons de lumière rotatifs */}
        <Animated.Image 
          source={require('./assets/back.jpeg')}
          style={[
            styles.lightRays, 
            { 
              opacity: lightRayOpacity,
              transform: [{ rotate: lightRayInterpolation }]
            }
          ]}
        />
        
        {/* Particules lumineuses */}
        <Animated.Image
          source={require('./assets/logo.png')}
          style={[
            styles.lightParticles,
            { opacity: particlesOpacity }
          ]}
        />
        
        {/* Logo avec halo lumineux */}
        <View style={styles.logoContainer}>
          <Animated.View 
            style={[
              styles.logoHalo,
              { opacity: logoOpacity.interpolate({
                  inputRange: [0, 1],
                  outputRange: [0, 0.6]
                }) 
              }
            ]}
          />
          <Animated.Image 
            source={require('./assets/logo.png')} 
            style={[
              styles.cinematicLogo, 
              { 
                transform: [{ scale: logoScale }],
                opacity: logoOpacity
              }
            ]} 
          />
        </View>
        
        {/* Texte avec effet de lumière */}
        <Animated.View style={[styles.textContainer, { opacity: textOpacity }]}>
          <Text style={styles.cinematicTitle}>BIENVENUE À L'UJPS</Text>
          <Text style={styles.cinematicSubtitle}>Plateforme de gestion universitaire</Text>
        </Animated.View>
      </Animated.View>
    );
  }

  return (
    <ImageBackground 
      source={require('./assets/back.jpeg')} 
      style={styles.container}
      blurRadius={2}
    >
      <View style={styles.overlay}>
        <Image 
          source={require('./assets/logo.png')} 
          style={styles.loginLogo} 
        />
        <Text style={styles.welcomeText}>Connectez-vous à votre compte</Text>
        
        <View style={styles.formGroup}>
          <Text style={styles.label}>Email</Text>
          <TextInput
            placeholder="votre@email.com"
            placeholderTextColor="#aaa"
            autoCapitalize="none"
            keyboardType="email-address"
            value={email}
            onChangeText={setEmail}
            style={styles.input}
          />
        </View>
        
        <View style={styles.formGroup}>
          <Text style={styles.label}>Mot de passe</Text>
          <TextInput
            placeholder="••••••••"
            placeholderTextColor="#aaa"
            secureTextEntry
            value={password}
            onChangeText={setPassword}
            style={styles.input}
          />
        </View>

        {error && <Text style={styles.error}>{error}</Text>}

        <TouchableOpacity 
          style={[styles.button, (loading || !email || !password) && styles.buttonDisabled]}
          onPress={handleLogin} 
          disabled={loading || !email || !password}
        >
          {loading ? (
            <ActivityIndicator size="small" color="#fff" />
          ) : (
            <Text style={styles.buttonText}>Se connecter</Text>
          )}
        </TouchableOpacity>

        <TouchableOpacity style={styles.forgotPassword}>
          <Text style={styles.forgotText}>Mot de passe oublié ?</Text>
        </TouchableOpacity>
      </View>
    </ImageBackground>
  );
}

const styles = StyleSheet.create({
  introContainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
  },
  logoContainer: {
    position: 'relative',
    alignItems: 'center',
    justifyContent: 'center',
  },
  cinematicLogo: {
    width: 200,
    height: 200,
    resizeMode: 'contain',
    zIndex: 2,
  },
  logoHalo: {
    position: 'absolute',
    width: 250,
    height: 250,
    borderRadius: 125,
    backgroundColor: 'rgba(255, 255, 255, 0.6)',
    zIndex: 1,
  },
  lightRays: {
    position: 'absolute',
    width: 400,
    height: 400,
    resizeMode: 'contain',
    tintColor: 'rgba(255, 255, 255, 1)',
  },
  lightParticles: {
    position: 'absolute',
    width: 300,
    height: 300,
    resizeMode: 'contain',
    tintColor: 'rgba(255, 255, 255, 0.7)',
  },
  textContainer: {
    marginTop: 40,
    alignItems: 'center',
  },
  cinematicTitle: {
    fontSize: 32,
    fontWeight: 'bold',
    color: '#fff',
    textAlign: 'center',
    letterSpacing: 5,
    textShadowColor: 'rgba(255, 255, 255, 1)',
    textShadowOffset: { width: 0, height: 0 },
    textShadowRadius: 10,
  },
  cinematicSubtitle: {
    fontSize: 18,
    color: '#fff',
    textAlign: 'center',
    marginTop: 10,
    letterSpacing: 2,
    opacity: 0.9,
    textShadowColor: 'rgba(0, 0, 0, 0.5)',
    textShadowOffset: { width: 1, height: 1 },
    textShadowRadius: 2,
  },
  container: {
    flex: 1,
    padding: 30,
    justifyContent: "center",
  },
  overlay: {
    backgroundColor: 'rgba(0, 0, 0, 0.6)',
    flex: 1,
    justifyContent: 'center',
    padding: 30,
  },
  loginLogo: {
    width: 120,
    height: 120,
    marginBottom: 20,
    alignSelf: 'center',
    resizeMode: 'contain',
    tintColor: '#fff',
  },
  welcomeText: {
    fontSize: 22,
    fontWeight: '600',
    color: '#fff',
    marginBottom: 30,
    textAlign: 'center',
    textShadowColor: 'rgba(0, 0, 0, 0.5)',
    textShadowOffset: { width: 1, height: 1 },
    textShadowRadius: 3,
  },
  formGroup: {
    marginBottom: 20,
  },
  label: {
    fontSize: 14,
    color: '#fff',
    marginBottom: 8,
    fontWeight: '500',
    textShadowColor: 'rgba(0, 0, 0, 0.5)',
    textShadowOffset: { width: 1, height: 1 },
    textShadowRadius: 2,
  },
  input: {
    height: 50,
    borderColor: "rgba(255, 255, 255, 0.3)",
    borderWidth: 1,
    borderRadius: 6,
    paddingHorizontal: 15,
    backgroundColor: 'rgba(255, 255, 255, 0.1)',
    fontSize: 16,
    color: '#fff',
  },
  button: {
    backgroundColor: 'rgba(79, 0, 25, 0.9)',
    padding: 15,
    borderRadius: 6,
    alignItems: 'center',
    justifyContent: 'center',
    marginTop: 10,
    shadowColor: 'rgba(255, 255, 255, 1)',
    shadowOffset: { width: 0, height: 0 },
    shadowOpacity: 0.8,
    shadowRadius: 10,
    elevation: 5,
  },
  buttonDisabled: {
    backgroundColor: 'rgba(204, 204, 204, 0.7)',
  },
  buttonText: {
    color: '#fff',
    fontSize: 16,
    fontWeight: '600',
    textShadowColor: 'rgba(0, 0, 0, 0.3)',
    textShadowOffset: { width: 1, height: 1 },
    textShadowRadius: 2,
  },
  error: {
    color: "#ff6b6b",
    marginBottom: 15,
    textAlign: "center",
    fontSize: 14,
    textShadowColor: 'rgba(0, 0, 0, 0.5)',
    textShadowOffset: { width: 1, height: 1 },
    textShadowRadius: 2,
  },
  forgotPassword: {
    marginTop: 20,
    alignSelf: 'center',
  },
  forgotText: {
    color: 'rgba(255, 255, 255, 0.8)',
    fontSize: 14,
    textDecorationLine: 'underline',
  },
});
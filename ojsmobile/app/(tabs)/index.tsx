import { Image } from 'expo-image';
import { useRouter } from 'expo-router';
import { Pressable, StyleSheet } from 'react-native';

import { HelloWave } from '@/components/HelloWave';
import ParallaxScrollView from '@/components/ParallaxScrollView';
import { ThemedText } from '@/components/ThemedText';
import { ThemedView } from '@/components/ThemedView';

export default function HomeScreen() {
  const router = useRouter();

  return (
    <ParallaxScrollView
      headerBackgroundColor={{ light: '#A1CEDC', dark: '#1D3D47' }}
      headerImage={
        <Image
          source={require('@/assets/images/partial-react-logo.png')}
          style={styles.reactLogo}
        />
      }
    >
      <ThemedView style={styles.titleContainer}>
        <ThemedText type="title">Welcome!</ThemedText>
        <HelloWave />
      </ThemedView>

      {/* Boutons de navigation */}
      <Pressable onPress={() => router.push('/LoginScreen')} style={styles.button}>
        <ThemedText type="defaultSemiBold" style={styles.buttonText}>
          Aller à la page de connexion
        </ThemedText>
      </Pressable>

      <Pressable onPress={() => router.push('/submissions')} style={styles.button}>
        <ThemedText type="defaultSemiBold" style={styles.buttonText}>
          Aller à la page des soumissions
        </ThemedText>
      </Pressable>

      <Pressable onPress={() => router.push('/Infos')} style={styles.button}>
        <ThemedText type="defaultSemiBold" style={styles.buttonText}>
          Aller à la page des informations
        </ThemedText>
      </Pressable>

      <Pressable onPress={() => router.push('/Issues')} style={styles.button}>
        <ThemedText type="defaultSemiBold" style={styles.buttonText}>
          Aller à la page des issues
        </ThemedText>
      </Pressable>

      <Pressable onPress={() => router.push('/ContextsScreen')} style={styles.button}>
        <ThemedText type="defaultSemiBold" style={styles.buttonText}>
          Aller à la page des contextes
        </ThemedText>
      </Pressable>

      <Pressable onPress={() => router.push('/SectionsScreen')} style={styles.button}>
        <ThemedText type="defaultSemiBold" style={styles.buttonText}>
          Aller à la page des sections
        </ThemedText>
      </Pressable>

      <Pressable onPress={() => router.push('/dashboard')} style={styles.button}>
        <ThemedText type="defaultSemiBold" style={styles.buttonText}>
          Aller à la page du tableau de bord
        </ThemedText>
      </Pressable>

      <Pressable onPress={() => router.push('/register')} style={styles.button}>
        <ThemedText type="defaultSemiBold" style={styles.buttonText}>
          Aller à la page dinscription
        </ThemedText>
      </Pressable>

      <ThemedView style={styles.stepContainer}>
        <ThemedText type="subtitle">Step 1: Try it</ThemedText>
        <ThemedText>
          Edit <ThemedText type="defaultSemiBold">app/(tabs)/index.tsx</ThemedText> to see changes.
        </ThemedText>
      </ThemedView>

      <ThemedView style={styles.stepContainer}>
        <ThemedText type="subtitle">Step 2: Explore</ThemedText>
        <ThemedText>
          Tap the Explore tab to learn more about whats included in this starter app.
        </ThemedText>
      </ThemedView>
    </ParallaxScrollView>
  );
}

const styles = StyleSheet.create({
  titleContainer: {
    flexDirection: 'row',
    alignItems: 'center',
    gap: 8,
  },
  stepContainer: {
    gap: 8,
    marginBottom: 8,
  },
  reactLogo: {
    height: 178,
    width: 290,
    bottom: 0,
    left: 0,
    position: 'absolute',
  },
  button: {
    marginVertical: 12,
    paddingVertical: 12,
    paddingHorizontal: 20,
    backgroundColor: '#4f0019',
    borderRadius: 6,
    alignSelf: 'center',
  },
  buttonText: {
    color: 'white',
    fontSize: 16,
  },
});
import AsyncStorage from '@react-native-async-storage/async-storage';

const BASE_URL = 'http://192.168.1.65/ojs/index.php/humanite';

// Login - récupère le cookie OJSSID et le stocke
export async function login(email: string, password: string) {
  const response = await fetch(`${BASE_URL}/login`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `username=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}&remember=1`,
  });

  // Toujours lire le texte de la réponse, utile pour debug
  const responseText = await response.text();

  if (response.status !== 200) {
    throw new Error(`Erreur HTTP ${response.status}`);
  }

  // Récupérer le cookie dans les headers (sensible au serveur)
  const rawCookie = response.headers.get('set-cookie');

  if (!rawCookie) {
    console.log('Pas de cookie set-cookie reçu. Réponse serveur:', responseText);
    throw new Error('Identifiants invalides (cookie de session manquant)');
  }

  const match = rawCookie.match(/OJSSID=[^;]+/);
  if (!match) {
    console.log('Cookie OJSSID non trouvé dans set-cookie:', rawCookie);
    throw new Error('Identifiants invalides (cookie OJSSID absent)');
  }

  const cookieValue = match[0];
  await AsyncStorage.setItem('OJSSID', cookieValue);

  return true;
}


// Récupérer les soumissions avec cookie dans header Cookie
export async function getSubmissions() {
  const cookie = await AsyncStorage.getItem('OJSSID');
  if (!cookie) throw new Error('Utilisateur non connecté');

  const response = await fetch(`${BASE_URL}/api/v1/submissions`, {
    method: 'GET',
    headers: {
      'Accept': 'application/json',
      'Cookie': cookie, // exemple : "OJSSID=J7RSw9v6Ni3jYJ02d73QDPo6Dx0sPeLUxZH7yBf6"
    },
  });

  if (!response.ok) throw new Error('Erreur récupération soumissions');

  return response.json();
}

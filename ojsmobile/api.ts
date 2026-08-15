import AsyncStorage from '@react-native-async-storage/async-storage';

export async function fetchSubmissions() {
  const ojssid = await AsyncStorage.getItem('OJSSID');
  if (!ojssid) throw new Error('Non connecté');

  const response = await fetch('http://localhost/ojs/index.php/humanite/api/v1/submissions', {
    method: 'GET',
    headers: {
      'Cookie': `OJSSID=${ojssid}`,
      'Accept': 'application/json',
    },
  });

  if (!response.ok) {
    throw new Error('Erreur API');
  }

  const data = await response.json();
  return data;
}

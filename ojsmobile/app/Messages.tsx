import React from 'react';
import { View, Text, StyleSheet } from 'react-native';

export default function Messages() {
  return (
    <View style={styles.container}>
      <Text style={styles.title}>Messages</Text>
      <Text>Vous n'avez pas de nouveaux messages.</Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: { flex: 1, justifyContent: 'center', alignItems: 'center', padding: 20 },
  title: { fontSize: 24, fontWeight: 'bold', marginBottom: 20 },
});

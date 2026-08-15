import React from 'react';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import Dashboard from './dashboard';
// Make sure the file exists at ./screens/Profile.tsx
// If the file is missing, create it or update the import path accordingly
import Profile from './Profile';
import Articles from './Articles';
import Messages from './Messages';
import Settings from './Settings';
import { NavigationContainer } from '@react-navigation/native';

export type RootStackParamList = {
  Dashboard: undefined;
  Profile: undefined;
  Articles: undefined;
  Messages: undefined;
  Settings: undefined;
};

const Stack = createNativeStackNavigator<RootStackParamList>();

export default function RootNavigator() {
  return (
    <NavigationContainer>
      <Stack.Navigator initialRouteName="Dashboard">
        <Stack.Screen name="Dashboard" component={Dashboard} />
        <Stack.Screen name="Profile" component={Profile} />
        <Stack.Screen name="Articles" component={Articles} />
        <Stack.Screen name="Messages" component={Messages} />
        <Stack.Screen name="Settings" component={Settings} />
      </Stack.Navigator>
    </NavigationContainer>
  );
}

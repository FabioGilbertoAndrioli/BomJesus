import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';

import * as React from 'react';

import { View, Text, FlatList, StyleSheet } from 'react-native';

import Reserva from './src/reserves/index';


export default class App extends React.Component{

  render(){
     return(
      <View style={styles.container}>
          <Reserva></Reserva>
      </View>
     )
   }
}

const styles = StyleSheet.create({
  container: {
   flex: 1,
   paddingTop: 22
  },
  item: {
    padding: 10,
    fontSize: 18,
    height: 44,
  },
})
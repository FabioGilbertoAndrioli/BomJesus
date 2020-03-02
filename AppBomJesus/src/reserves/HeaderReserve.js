import React, { Component } from 'react';
import {Header} from 'react-native-elements'
export default class HeaderReserve extends Component {
  render() {      
    return (
        <Header
            centerComponent={{ text: 'Reservas', style: { color: '#fff', fontSize:24, marginTop:-25} }}
            containerStyle={{
                backgroundColor: '#3D6DCC',
                justifyContent: 'space-around',
                marginTop:0
            }}
        />
    );
  }
}
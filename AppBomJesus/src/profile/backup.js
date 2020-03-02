import React, { Component } from 'react';
import { FlatList,StyleSheet } from 'react-native';
import {   Text, View } from 'native-base'
import axios from 'axios'
import {  format, parseISO } from "date-fns";

export default class FlatListBasics extends Component {
      constructor(props){
        super(props)
        this.state = {reserves:[]}
    }

    loaderReserve = () => {
        fetch("http://10.19.1.31:8000/api/reserves")
        .then(res => res.json())
        .then( res => {
            console.log(res.data)
            this.setState({
                reserves: res.reservas || []
            })
        })
    }

    componentDidMount (){
        this.loaderReserve()
    }
    render() {
       
        return (
            <View style={styles.container}>
            <Text>Reservas</Text>
                <FlatList
                    data={this.state.reserves}
                    renderItem={({item}) =>
                        <View>
                            <Text style={styles.item}>
                                {format(parseISO(item.date),"'Dia' dd 'de' MM'")}
                            </Text>
                        </View>
                    }
                />
            </View>
        );
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
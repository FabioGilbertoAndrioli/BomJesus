import React, { Component } from 'react';
import { List, ListItem, Container, Card, CardItem, Text, Body, Content } from "native-base";
import {  format, parseISO } from "date-fns";



//components criados neste projeto.
import HeaderReserve from './HeaderReserve'

export default class FlatListBasics extends Component {
      constructor(props){
        super(props)
        this.state = {reserves:[],user:""}
    }

    loaderReserve = () => {
        fetch("http://10.19.1.31:8000/api/reserves")
        .then(res => res.json())
        .then( res => {
           // console.log(res.reservas[0].date)
            this.setState({
                reserves: res.reservas || []
            })
        })
    }

    getUser = (id) =>{
        fetch(`http://10.19.1.31:8000/api/users/${id}`)
        .then(res => res.json())
        .then( res => {
            this.setState({user:res.name})
            console.log(res)
        })
    }

    showClass(classes){
        return classes.map( (item) => {
             //console.log(item)
             return <ListItem><Text>{item}</Text></ListItem>
        })
     }
    showReseve(){
        return this.state.reserves.map((reserve) => {
            return  <Card>
            <CardItem header bordered>
                <Text> {this.state.user}</Text>
            </CardItem>
            <CardItem bordered>
              <Body>
                <List>{this.showClass(reserve.classes)}</List>
              </Body>
            </CardItem>
            <CardItem footer bordered>
                <Text>{ format(parseISO(reserve.date),"dd '/' MM '/' yyyy ")}</Text>
                <Text>Período: {reserve.period}</Text>
            </CardItem>
          </Card>
        })
    }

    componentDidMount (){
        this.loaderReserve()
    }
    render() {
        return (
            <Container>
            <HeaderReserve></HeaderReserve>
              <Content padder>
                {this.showReseve()}
              </Content>
            </Container>
          );
     }
}


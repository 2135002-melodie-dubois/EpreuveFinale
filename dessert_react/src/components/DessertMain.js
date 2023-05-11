import React from 'react';
import Api from '../utils/Api';
import axios from "axios";
import DessertList from './DessertList';
import Fox from './Fox';
import CreateForm from './CreateForm';
import ModifyForm from './ModifyForm';
import Info from './Info';

class DessertMain extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            foxPic : '',
            desserts:[],
            selectedDessert:[],
            mode:'',
        }
    }

    componentDidMount() {
       this.recupererFoxPic();
       this.recupererDesserts();
    }

    //Récupere une photo de renard
    recupererFoxPic = () => {
        axios({
            method: 'get',
            url: 'https://randomfox.ca/floof/',
        })
        .then((resultat) => {
            const fox = resultat.data;
            const picUrl = fox.image;
            this.setState({foxPic : picUrl});
        })
    }

    //Recupere la liste des desserts
    recupererDesserts = () => {
        Api({
            method: 'get',
            url: '/dessert',
        })
        .then((resultat) => {
            const liste = resultat.data;
            const desserts = liste.desserts;
            this.setState({desserts:desserts});
        }) 
    }

    //Recupere un seul dessert
    selectDessert = (id) => {
        Api({
            method: 'get',
            url: '/dessert/{id}',
        })
        .then((resultat) => {
            const data = resultat.data;
            const dessert = data.desserts;
            this.setState({selectedDessert:dessert});
        }) 
    }

    //Cree un nouveau dessert
    CreateDessert = (nom,description) => {
        Api({
            method: 'post',
            url: '/dessert',
            data: {
                nom: nom,
                description: description,
              }
        })
        .then((resultat) => {
            const data = resultat.data;
            const dessert = [...this.state.desserts, data.desserts];
            this.setState({desserts:dessert,
                        mode: ''});
        })   
    }

    //Modifie un dessert existant
    ModifyDessert = (id,nom,description) => {
        Api({
            method: 'post',
            url: '/dessert/{id}',
            data: {
                nom: nom,
                description: description,
              }
        })
        .then((resultat) => {
            const desserts = this.state.desserts.map(dessert =>{
                if (id === dessert.id) {
                    return{
                        id: resultat.data.desserts.id,
                        nom: resultat.data.desserts.nom,
                        description: resultat.data.desserts.description,
                    }
                }
            });
            this.setState({desserts:desserts,
                        mode: ''});
        })     
    }

    //Genere un formulaire de creation de dessert
    newForm = () => {
        this.setState({mode: <CreateForm CreateDessert = {this.CreateDessert}/>})  
    }

    //Genere un formulaire de modification d'un dessert
    modifyForm = (id) => {
        this.selectDessert(id);
        this.setState({mode: <ModifyForm nom = {this.state.selectedDessert.nom} 
                        description = {this.state.selectedDessert.description} 
                        id = {this.state.selectedDessert.id}
                        ModifyDessert = {this.ModifyDessert}/>})  
    }

    //Genere une fiche d'information d'un dessert
    showInfo = (id) => {
        this.selectDessert(id)
        this.setState({mode: <Info nom = {this.state.selectedDessert.nom} 
                        description = {this.state.selectedDessert.description} 
                        id = {this.state.selectedDessert.id}/>}) 
    }

    render() {
        return (
            <div>
                <div>
                    {this.state.mode}
                </div>
                <div>
                    <DessertList desserts = {this.state.desserts}
                                newDessert = {this.newForm}
                                modifyDessert = {this.modifyForm}
                                ShowInfo = {this.showInfo}/>
                </div>
                <Fox pic={this.state.foxPic}/>
            </div>
        );
    }
}

export default DessertMain;
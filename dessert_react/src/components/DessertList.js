import React from 'react';

class DessertList extends React.Component {
    constructor(props) {
        super(props);
        this.state = {

        }
    }

    ShowInfo = (id) => {
        this.props.ShowInfo(id);
    }


    ModifyDessert = (id) => {
        this.props.ModifyDessert(id);
    }


    newDessert = (id) => {
        this.props.newDessert(id);
    }



    render() {
        const lignesTableau = this.props.desserts.map(dessert => (<tr>
                                                                    <th>{dessert.id}</th>
                                                                    <th>{dessert.nom}</th>
                                                                    <th><button onClick={this.ShowInfo(dessert.id)}>Info</button></th>
                                                                    <th><button onclick = {this.ModifyDessert(dessert.id)}>Modifier</button></th>
                                                                </tr>));
        return (
            <div>
                <h1>Liste des desserts</h1>
                <table>
                    <thead>
                        <tr>
                            <th><h3>Id</h3></th>
                            <th><h3>Nom</h3></th>
                            <th><h3>Informations</h3></th>
                            <th><h3>Modifier</h3></th>
                        </tr>
                    </thead>
                    <tbody>
                        {lignesTableau}
                        <tr>
                            <th><button onClick={this.newDessert}>Noveau Dessert</button></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        );
    }
}

export default DessertList;
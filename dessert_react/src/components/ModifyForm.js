import React from 'react';

class ModifyForm extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            description : '',

        }
    }

    ModifyDessert = (event) => {
        const id = this.props.id;
        const nom = this.props.nom;
        const description = this.state.description;

        this.props.ModifyDessert(id,nom,description);
        event.preventDefault();
    }

    updateValue(event) {
        const name = event.target.name;
        const value = event.target.value;
    
        this.setState({
            [name]: value
        });
    }


    render() {
        return (
            <div>
                <h1>Modifier un dessert</h1>
                <form onSubmit={this.ModifyDessert}>
                    <label for='nom'>Nom du dessert</label>
                    <input type='text' id='nom' name='nom' value = {this.props.nom} readOnly></input>
                    <label for='description'>Description</label>
                    <input type='text' id='description' name='description' value={this.props.description} onChange={this.updateValue}></input>
                    <input type='submit' value='Modifier'></input>
                </form>
            </div>
        );
    }
}

export default ModifyForm;
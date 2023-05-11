import React from 'react';

class CreateForm extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            nom : '',
            description : '',

        }
    }

    CreateDessert = (event) => {
        const nom = this.state.nom;
        const description = this.state.description;

        this.props.CreateDessert(nom,description);
        event.preventDefault();
    }

    updateValue(event) {
        const name = event.target.name;
        const value = event.target.value;

        this.setState({
            [name]: value,
        });
    }


    render() {
        return (
            <div>
                <h1>Créer un dessert</h1>
                <form onSubmit={this.CreateDessert}>
                    <label for='nom'>Nom du dessert</label>
                    <input type='text' id='nom' name='nom' onChange={this.updateValue}/>
                    <label for='description'>Description</label>
                    <input type='text' id='description' name='description' onChange={this.updateValue}/>

                    <input type='submit' value='Créer'/>
                </form>
            </div>
        );
    }
}

export default CreateForm;
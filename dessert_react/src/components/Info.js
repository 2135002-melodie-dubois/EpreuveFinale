import React from 'react';

class Info extends React.Component {
    constructor(props) {
        super(props);
        this.state = {

        }
    }


    render() {
        return (
            <div>
                <h1>{this.props.nom}</h1>
                <div>Id:{this.props.id}</div>
                <div>Description:
                    <div>{this.props.description}</div>
                </div>
            </div>
        );
    }
}

export default Info;
import React from 'react';

class Fox extends React.Component {
    constructor(props) {
        super(props);
        this.state = {

        }
    }


    render() {

        

        return (
            <img src={this.props.pic}/>
        );
    }
}

export default Fox;
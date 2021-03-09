import React, { Component } from 'react';

class Collapsible extends Component {
    constructor(props) {
        super(props);
        this.state = { 
            shown: false,
        }
    }
    toggle = () => {
        this.setState({
            shown: !this.state.shown
        })
    }
    render() {
        let { data } = this.props;
        console.log(data); 
        return ( 
            <div>
                <button onClick={this.toggle} className="toggle">Show/Hide</button>
                {this.state.shown && (
                    <div>
                        {data.map(row => (
                            row.id,
                            row.first_name
                        ))}
                    </div>
                )}
            </div>
        );
    }
}
 
export default Collapsible;
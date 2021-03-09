import React, { Component } from 'react';
import Collapsible from './components/Collapsible';

class App extends Component {
  constructor() {
    super();
    this.state = {
      entries: [],
      isLoaded: false,
    }
  }
  componentDidMount() {
    fetch(process.env.REACT_APP_ADDRESSES_API) //AJAX call to the backend here, environment variable was declared with path to localhost/api/parse-addresses
      .then(res => res.json())
      .then(json => {
        this.setState({
          isLoaded: true,
          entries: json,
        })
      });
  }

  render() {

    let { isLoaded, entries } = this.state;
 
    if (!isLoaded ) {
      return <div> Loading.... </div>;
    }

    return (
      <div className="App">
        
      <Collapsible data={entries["duplicates"]} />
      <Collapsible data={entries["non-duplicates"]} />
      {/* <h1>Non Duplicate Entries</h1>
          {entries["non-duplicates"].map(entry => (
              <div>
              {entry[0]} {entry[1]}, {entry[2]}, {entry[3]}, {entry[4]}, {entry[5]}, {entry[6]}, {entry[7]}, {entry[8]}, {entry[9]}, {entry[10]}
              </div>
          ))}
      <h1>Duplicate Entries</h1>
          {entries["duplicates"].map(entry => (
              <div>
              {entry[0]} {entry[1]}, {entry[2]}, {entry[3]}, {entry[4]}, {entry[5]}, {entry[6]}, {entry[7]}, {entry[8]}, {entry[9]}, {entry[10]}
              </div>
          ))}
      <Collapsible />
      <Collapsible />
      <Collapsible /> */}

      </div>
    );
  }
}


export default App;

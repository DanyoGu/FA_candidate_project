import React, { Component } from 'react';

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      entries: [],
      isLoaded: false,
    }
  }
  componentDidMount() {
    fetch('https://localhost.com/api/parseAddresses') //AJAX call to the backend here
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
        
        <ul>
          {entries.map(entry => (
              <li key={entry.id}>
                //this is where the output would be displayed but the file still isn't being read properly
              </li>
          ))};
        </ul>

      </div>
    );
  }
}


export default App;

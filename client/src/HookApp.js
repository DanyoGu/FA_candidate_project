import React, { useState, useEffect } from 'react';
import HookCollapsible from './components/HookCollapsible';

function HookApp() {

  const [error, setError] = useState(null);
  const [isLoaded, setIsLoaded] = useState(false);
  const [entries, setEntries] = useState([]);
  
  useEffect(() => {
    fetch(process.env.REACT_APP_ADDRESSES_API) //AJAX call to the backend here, environment variable was declared with path to localhost/api/parse-addresses
      .then(res => res.json())
      .then(
        (entries) => {
          setEntries(entries); 
          setIsLoaded(true);
        },
        (error) => {
          setIsLoaded(true);
          setError(error);
        }
      )
  }, [])
  if (error) {
    return <div>Error: {error.message}</div>;
  } else if (!isLoaded) {
    return <div>Loading...</div>;
  } else {
      return (
        <div className="App">


        <HookCollapsible data={entries["duplicates"]} title={"Duplicates"}/>
        <HookCollapsible data={entries["non-duplicates"]} title={"Non-Duplicates"}/>


        </div>
      );
  }
}


export default HookApp;

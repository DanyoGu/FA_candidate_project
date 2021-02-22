# FormAssembly Assignment

Notice the test-files folder. Use normal.csv to test your code and advanced.csv if you want a litte bit more of a challenge.
## Installing Docker

Docker and Docker-Compose is used to bootstrap the PHP server. Installation instructions can be found here: https://docs.docker.com/get-docker/

## Server

### Starting the server

The local PHP server can be started by running `docker-compose up --build`.

### PHP Code

A Laravel installation has already been installed in the `server` directory. 
An empty Address Controller has already been created where you may write your PHP address parsing code.

The Address Controller can be found at `server/app/Http/Controllers/AddressController`.

This controller endpoint can be accessed by making an AJAX request to http://localhost/api/parse-addresses. 

## Client

### Starting the client

- Navigate to client directory `cd client`
- Run `npm install` to install React dependencies
- Run `npm install react-table` to install the React Library for formatting the data
- Run `npm start` to start the React application. You can access the client in your browser at http://localhost:3000

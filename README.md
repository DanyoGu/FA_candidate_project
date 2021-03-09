# Overview

This assignment was a paid part of an interview process for another company where I had to parse through the files found in the test-files folder and remove similar entries and display them in a React component. Entries which could be considered duplicates include something like this:

bill,smith,bsmith@gmail.com,190 main st boston mass
bill,smith,bsmith@gmail.com,400 west street boston ma

The sorting algorithm I implemented can be found in the server/app/Http/AddressController.php. React Component can be found in client/src/HookApp.js. Technologies used include PHP, Laravel, ReactHooks and Docker.

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

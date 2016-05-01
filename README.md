# simpleChat

**simpleChat** is a tiny php/html/js project for playing around with ajax and sessions within a web app chat.  
It's ugly coding and not safe for work productive - be aware of that.  

## Requirements
* have a webserver running
* have read and write permissions in project dir

## included libraries
* jquery 1.9.1
* bootstrap 3.3.6

## How it works
1. user has to log in with a nickname
1. this name is used for posting ajax requests inside a session
1. posted messages will be stored inside the "log/log.html"
1. "log/log.html" will be read every 500ms and show content in chatbox
1. logged in user can exit chat with clicking "exit" button
1. session will be destroyed

## Deployment
Just download the zip file and extract it in your webserver root. Then call the index.php - like: `localhost/simpleChat/index.php`.
For trying functionality you could open the url in two different browsers on your machine.  
You could also put it on a remote server - e.g. a RaspPi - in your home network , making it accessible for roommates, friends and family.

Enjoy **simpleChat**

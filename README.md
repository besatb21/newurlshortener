# Web Project

<h2 align="center"> <span style="color:aqua"> urlshortener</span>   </h2> 

<!-- there are imporvements that can be made, which were left at a later time, regarding the styling and some added functionality  -->
\
Team members : `Hysen Ndregjoni` and `myself`

To get the project working , you only need to look at the database configuration file:
__Configs\DBConfig.php__
  
To install the right dependencies type the following:

    -   composer install 
  
To get the QR code working enable the __gd__ extension.
How :

- open php.ini 
- go to extension=gd 
- uncomment it (remove the semi-colon in front)


Wasy to 'use' the webpage :

- either as a passerby 
- or, as an authenticated user 

When used as an authenticated user, you can see the links you have shortened in the past aswell as their QR code representation (which is always fun). 


According to the requirements we had, the project is done in vanilla php and javascript. \
 For styling bootstrap is used mostly.


NINIQUE'S DOLLMAKER SCRIPT

Version 1.0
------------------------------------------------------------------------
This is a modified version of the script that I used for my Collaborative
 Dollmaker at http://www.ninique.net/dollmaker. I removed some of the 
features that were particular to the fact that many users were 
contributing, but kept the main jQuery drag/drop + tabs functionality. I 
also made it easy for people to add/remove pieces to the dollmaker, without 
having to edit the html page overtime. 

This script was designed to be used on a server with PHP. However, it does
 not require a database, as it works with the file structure.

This code has been tested and should be functional in all major browsers. I 
am not responsible for browser compatibility problems resulting in your 
customizing of the code. 

I am using the following libraries/plugins (The javascript libraries are 
hosted from Google):
- JQuery (http://jquery.com/)
- JQuery UI (http://jqueryui.com/)
- Eric Meyer's CSS Reset (http://meyerweb.com/eric/tools/css/reset/)

------------------------------------------------------------------------
TERMS:
------------------------------------------------------------------------
All of the code used in this dollmaker script is licensed under the MIT 
license. You can use and edit it in any way that you want. A link back 
would be appreciated, but is not necessary. 

The sample bases and clothing provided with this dollmaker are copyrighted 
© to Veronique Gagnon-Bilhete, and are for demonstration purposes 
only. You MUST use **YOUR OWN** basebody and clothes for dollmakers that 
you create! 

------------------------------------------------------------------------
HOW TO USE:
------------------------------------------------------------------------
PIECES:
In the images folder, you'll see some subfolders that are named 1Hair, 
2Tops, 3Bottoms, etc. These folders correspond to the tabs in the 
dollmaker. If you change the name, it'll change what appears on the tab. 
The number corresponds to the order you want the tabs to appear. 

To put pieces in your dollmaker, just place them within those folders. The 
filename doesn't matter, but the pieces will be ordered alphabetically, so 
you should take that into consideration. 

BASES:
You can also see that there is a folder called "bases" that is for the base 
variations that you want to put in your dollmaker. Just put your bases in 
that folder it doesn't matter what you name them, but again, they will be 
ordered alphabetically. 

Then, you'll need to open mainstylesheet.css, and edit the values on lines
84 to 88 so that it clips to the area of the base that you want for the 
thumbnail. If you've never used the CSS clip property before, here's a nice 
tutorial about it: 
http://www.seifi.org/css/creating-thumbnails-using-the-css-clip-property.html

LAYOUT:
You may change the layout to your liking by editing mainstylesheet.css. 
Some of the styles are mandatory for the functionality, and they are marked 
as so. I have tried to annotate the CSS file so that you can better 
find your way in it. 

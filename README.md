Ninique's Dollmaker Script
==========================

This is a script written with the aid of jQuery, that you can use to create
your own dollmaker (dressup game). I made it easy for people to add/remove
pieces to the dollmaker, without having to edit the html page overtime
(if they have PHP). 

This script was designed to be used on a server with PHP. However, it does 
not require a database, as it works with the file structure. It can also
be used on a server that does not have PHP, but that requires more work 
on your part. Scroll below for more details.  

The code has been tested and should be functional in all major browsers. I
am not responsible for browser compatibility problems resulting in your
customizing of the code.   

I am using the following libraries/plugins (The javascript libraries are
hosted from Google):  

*  [JQuery](http://jquery.com/)
*  [JQuery UI](http://jqueryui.com/)
*  [Eric Meyer's CSS Reset](http://meyerweb.com/eric/tools/css/reset/)

---------------------------------------
Terms:
---------------------------------------
All of the code used in this dollmaker script is licensed under the MIT
license. You can use and edit it in any way that you want. A link back
would be appreciated, but is not necessary.   

**The sample bases and clothing provided with this dollmaker are for
demonstration purposes only. You must use YOUR OWN basebody and   
clothes for dollmakers that you create!**  

---------------------------------------
How to use:
---------------------------------------
If you have PHP on your website, delete the file index\_no\_php.html. (If 
you don't have PHP, scroll below for more info)

####Categories (Tabs):####
In the images folder, you'll see some subfolders that are named 1Hair, 
2Tops, 3Bottoms, etc. These folders correspond to the tabs in the 
dollmaker. If you change the name, it'll change what appears on the tab. 
The number corresponds to the order you want the tabs to appear. 

####Props (Clothing & Hair):####
To put props in your dollmaker, just place them within those folders. The 
filename doesn't matter, but the props will be ordered alphabetically, so 
you should take that into consideration. 

####Bases:####
You can also see that there is a folder called "bases". In it are two
folders: full and thumbnails. In "full", you put the bases, in 
"thumbnails", you put some thumbnails that people can click on. Make sure
that each full base and its corresponding thumbnail have the same file 
name. Just like with clothing, the bases will be ordered alphabetically. 

####Layout:####
You may change the layout to your liking by editing mainstylesheet.css. 
Some of the styles are mandatory for the functionality, and they are marked 
as so. I have annotated the CSS file so that you can better
find your way in it. I encourage you to change the colors to your own!

---------------------------------------
"But I don't have PHP!"
---------------------------------------
You can still use the script even if you don't have PHP! It's just not as
easy to setup and maintain, since you'll have to do it manually. (all 
that php does is put the props and images onto the page for you, the 
drag/drop functionality is handled by jQuery.)

First you'll want to follow the steps above to put all the images into 
the right folders.

Then, delete the file called index.php and then rename index\_no\_php.html 
to index.html. 

Now you'll need to add all the image tags to index.html so that the props
actually appear on the page. There are further instructions in the 
comments of index_no_php.html (which you just renamed index.html) to help 
you put the right codes in the right places, but you should have a basic
understanding of HTML. 
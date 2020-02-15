# Black Paper Songlink Plugin
 
 A Wordpress plugin that uses the Songlink (odesli.co) API to create links to your music.


 ##How to install

 1) Download via GitHub Desktop or as zip

 2) Add the folders to your Wordpress Site via FTP
    - bp-songlink-storage should be located in your plugins folder.
    - The other files should be in your theme folder. I recommend creating a child theme but you cna do it in the parent theme as well.
    
3) In your wp-admin dashboard go to plugins and enable "Black Paper Songlink Plugin".

4) Create a private page and add the plugin.

5) Fill in the data. Your song data is now stored on your server.

6) On the page where you want to display the links add a shortcode: [songlink title=your_title]

7) (optional) You might want to style this a little with custom CSS.


##Notes

This is my first Wordpress plugin so it might not be the ideal way to do this, but it works.

You might want to look into the plugins/bp-songlink-storage/files folder every once in a while. When typing in the title it saves every time you type so if you create a file that is called "movement" there might be some files like "mov.txt", "movem.txt", "movemen.txt" and "movement.txt".

Also you can replace any of the images by defining a custom folder. Don't forget the "/" infront though!

# nexathon-proj : WayPool

A small prototype of a site aimed at helping users find others with same destination.

# Host it yourself locally

To host it yourself locally you must download [XAMPP](https://www.apachefriends.org/download.html) and start an Apache and MySQL. Using phpMyAdmin create a database 'waypool_db' with 2 tables 

'users_db' ( number : BIGINT : 12 , password : VARCHAR : 50 , destination : VARCHAR : 50 )

'destinations' ( number : BIGINT : 12 , destination : VARCHAR : 50 )

Create a directory 'wordpress' under XAMPP where located on your system and extract all files from this page into a folder name 'waypool' under it. Also extract all [Wordpress](wordpress.org) files in the 'wordpress' folder.

# How?

The site is built mostly from HTML and CSS and uses Apache for back end. MySQL is used for storing values and fetching them.

site should be live [here](empty-tree-38973.pktriot.net) ( site currently down - difficulties in hosting the site )

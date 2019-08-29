Usage:
------

1) Download and unzip the Read-More.zip file.

2) Files named "install.php, index.php, config.php, create.php, jquery.js, displaymore.php, ajax-loader.gif and read-more.css" will be obtained.

3) If you already have the database table, no need to run the install.php file, just edit the config.php file with your database details.

4) To get the field names from the database table, edit the mysql query with your fieldnames in the displaymore.php file.

5) Else create a database and run the install.php file in your browser to install the script.


File permissions:
-----------------------------
Set read, write permission for the file config.php for Linux users.


How to embed the script in to your webpage?
-------------------------------------------------------------

1) After you run install.php in your browser, enter the database details such as Host name, Database name(created), User name, password and table name.

2) If table name does not exist in the database then you have to give a new table name.

3) Then run index.php in your browser.


Index.php:
--------------

This file contains the entire functionality of ‘Read More Script’.

install.php:
---------------

This file is used to create the table name, username and password for the created database.

create.php:
--------------

This file contains the details to add the data into the database table.

config.php:
--------------

This file contains the username, password, database name and database connection functions.

displaymore.php:
---------------

This is an ajax file which is used to get the data from database table.


Jquery.js:
--------------

This file contains the jquery library functions that support the jquery animations. Do not change the code in this file. If changes are done in this file, then it will affect the functionality of the script.


Read-more.css:
----------

1) read-more.css file contains the 'CSS properties' of the script.

2) CSS properties like 'Background, position, height, width, border' etc., can be modified according to your needs.

3) Note: Before replacing the style sheet make sure to verify the classname and id names to avoid the duplication.


Editing the Index.php file:
---------------------------

1) The script code is available inside the <body></body> tag of the index.php file.

2) You can set the limit value inside the code.

$limit=2;

as $limit=5;

3) If you want to change the table and database name.open the config.php file and change in below variable,

$dbname = "readtest"; // your database name
$tablename = "test"; // your table name

Script provided by:
*******************

This script is developed and owned by Hscripts.com

This is given under The GNU General Public License (GPL).



Downloads:
----------

Kindly visit our site

http://www.hscripts.com/scripts/php/read-more.php to download the script

For further enquiries and support, mail us to support@hscripts.com



Thanks & regards,

Hscripts Team

Visit us at http://www.hscripts.com

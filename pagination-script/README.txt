READ ME:
*********

Usage
-----

1) Download and Unzip pagination-script.zip to extract the files and folders.

2) Files named "install.php, index.php, config.php, create.php, dbclass.php and style.css" and image folder will be 	   
   obtained.

3) If you already have the database table, no need to run the install.php file, just edit the config.php file with your    
   database details.Else, create a database and run the install.php file in your browser to install script.

How to embed the script in to your webpage?
-------------------------------------------

1) After you run install.php in your browser, enter the database details such as Host name, Database name(created), User    
   name and password then click 'Install' button.

2) Keep the images folder in the main folder.

3) Then run index.php in your browser. 

Editing the Index.php file:
---------------------------

1) The script code is available inside the <body> of the index.php file. 

2) You can set the limit value inside the code which determines the number of records to be displayed per page.
      $endl = 1; // For example, here single record is viewed per page.

      as 

      $endl = 5; // To view five records per page.

3) Write the query to determine which field(s) of a record has to be displayed.

   select * from tablename limit $startl,$endl

   as

   select col1,col2,col5 from tablename limit $startl,$endl

4) To change the image(s) according to your content, replace the images and keep it in main folder.
   
5) In the while loop, use table format as per your query.
   
6) Use the same query which you have used to implement pagination in the $rescount variable without mentioning the limit.

7) Mention your page name in $final variable to pass it as a parameter.

Style.CSS:
----------

1) Style.css contains the 'CSS properties' of the script

2) CSS properties like 'Background, padding, margin, height, width, border' etc., can be modified according to your needs.

Note: Before replacing the stylesheet make sure that the classnames and id names are given properly, to avoid duplication.
      
Script provided by:
*******************

This script is developed and owned by Hscripts.com

This is given under The GNU General Public License (GPL).

Downloads:
----------

Kindly visit our site

http://www.hscripts.com/scripts/php/pagination-script.php to download the script

For further enquiries and support, mail us to support@hscripts.com.



Thanks & regards,

Hscripts Team 

Visit us at http://www.hscripts.com

 


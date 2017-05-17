Welcome to Quizme!!!:


This is a tutorial on how to hook up this application to your web server.

You will need the following applications:
1. A FTP application - preferably WinSCP
2. A Web Browser
3. Putty
4. The Folder that contains QuizMe


*NOTE - PLEASE MAKE SURE THAT THE FOLDER CONTAINS  *

The files that require modification should be:
db.php - Which is located in the 'includes' folder located in the root directory of this folder.

Inside db.php, the following values must be adjusted to fit your database:

$db['db_user'] = "database server username";
$db['db_pass'] = "database password";
$db['db_name'] = "<Your database name>";

Next go to the 'game1' folder, and open navigation_game.php
-Find all results that match 'tamc1', & replace it with your new paltz username.

Next go to the 'quizzer' folder, direct to the 'application' folder, then the 'views' folder,
and then open up the navigation_game.php
-Find all results that match 'tamc1', & replace it with your new paltz username.


Once this is completed, please save the file and open up your FTP application (e.g. - FileZilla, WinSCP, etc)

Login into your server, and drag the 'quizme_ver_1' folder into a folder called 'WWW'.

Once the Folder is in the 'WWW' folder, please go into your application folder and move the quizme.sql file into
the root directory of your server. (e.g. - /home/tamc1/)
This is because when we decide to import the applications database, we need to reference the file thru
the PuTTY mysql command line, therefore it is easier to throw the database table in the root directory.


Now open up 'PuTTy' to connect to your server's telnet, and open up your database.

Use the following command to import the database table into your specified Database:

	mysql -u <Your db login username goes here> -p <the name of your database> < quizme.sql


If the steps have been done correctly, you should have successfully imported the data into your database.

Now open your web browser and type the following url:

	http://cs.newpaltz.edu/<Your newpaltz username>/quizme_ver_1/

Test everything to make sure it works,

If you have any questions or concerns, please feel free to email me at chris.tam1995@gmail.com

Have a nice day!!









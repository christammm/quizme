<?php

//File used to connect to database..


//Establish an associative db array to store information
$db['db_host'] = "localhost";
$db['db_user'] = "tamc1";
$db['db_pass'] = "xuhc9h";
$db['db_name'] = "tamc1_db";

foreach($db as $key => $value){

//upper case db to turn to constant defines as constant
  define(strtoupper($key), $value);

}


//Now that we have defined as constant we can connect to application
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//if($connection){
//}


/*incorrect way of connecting
$connection = mysqli_connect('localhost','root','','quizdudecms');

if($connection){
    echo "We are connected";
}
*/

?>

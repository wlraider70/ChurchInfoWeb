<?php

/*Define constant to connect to database */
DEFINE('DATABASE_USER', 'root');
DEFINE('DATABASE_PASSWORD', 'clc2net!');
DEFINE('DATABASE_HOST', 'localhost');
//DEFINE('DATABASE_NAME', 'programming');
DEFINE('DATABASE_NAME', 'cla-constituents');



// Make the connection:
$dbc = @mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD,
    DATABASE_NAME);

if (!$dbc) {
    trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());

}
//else echo 'you win';
?>
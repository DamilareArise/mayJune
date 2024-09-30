<?php
    $host = '127.0.0.1';
    $user = 'root';
    $password = '';
    $db = 'myblog_db';


    $conn = mysqli_connect($host, $user, $password, $db);
    if (!$conn){
        die('connection error: '. mysqli_connect_error());
    };

?>
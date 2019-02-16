<?php

$link = mysqli_connect('127.0.0.1','root','root','chat',3306);
mysqli_query($link,'SET NAMES UTF8');

set_time_limit(0);

while(true){
    $sql = "SELECT * FROM chat WHERE receiver = 'user' AND is_new = 1 ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($link,$sql);
    if($row = mysqli_fetch_row($result)){
        $sql = "UPDATE chat SET is_new = 0 WHERE id = ".$row[0];
        mysqli_query($link,$sql);
        echo json_encode($row);
    }
}
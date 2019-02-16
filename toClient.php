<?php

$link = mysqli_connect('127.0.0.1','root','root','chat',3306);
mysqli_query($link,'SET NAMES UTF8');

$content = $_POST['content'];
if(!empty($content)){
    $sql = "INSERT INTO chat(receiver,sender,content) VALUES ('user','admin','$content')";
    mysqli_query($link,$sql);
    echo json_encode($content);
}
<?php

$link = mysqli_connect('127.0.0.1','root','root','chat',3306);
mysqli_query($link,'SET NAMES UTF8');

while(true){
    $sql = "SELECT * FROM chat WHERE receiver = 'admin' AND is_new = 1 ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($link,$sql);
    if($row = mysqli_fetch_row($result)){
        $sql = "UPDATE chat SET is_new = 0 WHERE id = ".$row[0];
        mysqli_query($link,$sql);
        echo "<script>parent.showMessage(". json_encode($row) .")</script>";
        ob_flush();
        flush();
        sleep(1);
    }
}
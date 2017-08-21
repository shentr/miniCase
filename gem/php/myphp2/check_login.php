<?php

    $uname = $_POST['username'];
    $pwd = $_POST['password'];

    if($uname == 'lisi' && $pwd == 'admin'){
       //echo '<html><body><h1>success</h1></body></html>';
        header('location: welcome.php');
    }else{
        echo 'fail';
    }
?>
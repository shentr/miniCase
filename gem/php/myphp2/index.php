<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
    //echo 'hello';


    $arr = array(
        'name' => 'lisi',
        'age' => 23
    );

    //echo $arr['name'];
    foreach($arr as $key=>$val){
        echo $key . ":" .$val;
        echo '<br/>';
    }
?>
</body>
</html>
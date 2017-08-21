<?php
    class Person{
        var $name = "lisi";

        function say_hello(){
            echo $this -> name;
        }
    }


    $p1 = new Person();

    //$p1 -> say_hello();

    echo $p1 -> name;
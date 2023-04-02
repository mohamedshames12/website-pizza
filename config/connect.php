<?php
    $db_name = "mysql:local=localhost;dbname=pizza_db";
    $db_user_name = "root";
    $db_user_pass = "";

    $conn = new PDO($db_name, $db_user_name, $db_user_pass);

    
    function create_unique_id() {
        $characters = '12345678iuhgfdscvbgrGDEIHVDIFwuigh33t4cvdfnk';
        $characters_lenght = strlen($characters);
        $random_string = '';
        for($i = 0; $i < 20; $i++){
            $random_string .= $characters[mt_rand(0, $characters_lenght - 1)];
        }
        return $random_string;
    }

    if(isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
    }else{
        $user_id = "";
    }

  
?>
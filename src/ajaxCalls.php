<?php

include_once('../config/database.php');
include_once('leader.php');
include_once('food.php');

    if ($_POST['key'] == 'startup') {
        // connect to db and get leader starting conditions
        $leader = $_POST['leader'];

        $database = new Database();
        $db = $database->getConnection();
        $leaderObj = new Leader($db);
        $result['leader'] = $leaderObj->getLeaderInfo($leader);
        //echo json_encode($leaderItem);
        $foodObj = new Food($db);
        $result['food'] = $foodObj->getFoodInfo($result['leader']['id']);
        echo json_encode($result);

    }



?>
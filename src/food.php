<?php

class Food 
{
    private $connection;
    private $table_name = "food";

    public $id;
    public $name;
    public $food_qty;
    public $plant_qty;
    public $seed_qty;
    public $leader_id;

    public function __construct($db) {
        $this->connection = $db;
    }

    function getFoodInfo($id) {
        $food_array = [];
        $query = "SELECT * FROM {$this->table_name} WHERE `leader_id` = $id";
        $result=$this->connection->query($query);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
        
                $food_item=array(
                    "id" => $id,
                    "name" => $name,
                    "food_qty" => $food_qty,
                    "plant_qty" => $plant_qty,
                    "seed_qty" => $seed_qty,
                    "leader_id" => $leader_id
                );

                array_push($food_array, $food_item);
        }

        return $food_array;

    }

}

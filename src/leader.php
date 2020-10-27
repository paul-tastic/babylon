<?php

class Leader
{
     
        private $connection;
        private $table_name = "leaders";
     
        public $id;
        public $name;
        public $year_start;
        public $year_end;
    
        public function __construct($db) {
            $this->connection = $db;
        }
    
        function getLeaderInfo($name) {
            $query = "SELECT * FROM {$this->table_name} WHERE `name` = 'Hammurabi' LIMIT 1";
            $result=$this->connection->query($query);
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
             
                    $leader_item=array(
                        "id" => $id,
                        "name" => $name,
                        "year_start" => $year_start,
                        "year_end" => $year_end
                    );
            }

             return $leader_item;

        }
}
?>
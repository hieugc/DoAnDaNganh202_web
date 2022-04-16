<?php
    class room extends DB{
        public function get_number_room($house_id){
            $query =    "SELECT COUNT(`room`.`ID`) 
                        FROM `room`
                        WHERE `room`.`HOUSE_ID` = $house_id;";
            return mysqli_query($this->connect, $query);
        }
        public function get_room($house_id){
            $query =    "SELECT `room`.`ID` AS `id`, `room`.`NAME` AS `name`, `room`.`URL_IMG` AS `img`
                        FROM `room`
                        WHERE `room`.`HOUSE_ID` = $house_id;";
            return mysqli_query($this->connect, $query);
        }
        public function create_room($name, $img_url, $house_id){
            $query =    "INSERT INTO `room` (`room`.`NAME`, `room`.`URL_IMG`, `room`.`HOUSE_ID`) VALUE($name, $img_url, $house_id);";
            return mysqli_query($this->connect, $query);
        }
        public function update_room($name, $img_url, $id){
            $query =    "UPDATE `room`
                        SET `room`.`NAME` = " . $name . "
                        AND	`room`.`URL_IMG` = " . $img_url . "
                        WHERE `room`.`ID` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
        public function delete_room($id){
            $query =    "DELETE FROM `room`
                        WHERE `room`.`ID` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
    }
?>
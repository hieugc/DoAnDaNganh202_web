<?php
class gas extends DB{
    public function get_gas($room_id){
        $query =    "SELECT `gas`.`id` AS `id`, `gas`.`NAME` AS `name`, `gas`.`VALUE` AS `value`
                    FROM `gas`
                    WHERE `gas`.`ROOM_ID` = $room_id;";
        return mysqli_query($this->connect, $query);
    }
    public function create_gas($name, $room_id){
        $query =    "INSERT INTO `gas` (`gas`.`NAME`, `gas`.`VALUE`, `gas`.`ROOM_ID`) VALUE($name, 0, $room_id);";
        return mysqli_query($this->connect, $query);
    }
    public function update_gas($name, $value, $id){
        $query =    "UPDATE `gas`
                    SET `gas`.`NAME` = " . $name . "
                    AND	`gas`.`VALUE` = " . $value . "
                    WHERE `gas`.`ID` = " . $id . ";" ;
        return mysqli_query($this->connect, $query);
    }
    public function delete_gas($id){
        $query =    "DELETE FROM `gas`
                    WHERE `gas`.`ID` = " . $id . ";" ;
        return mysqli_query($this->connect, $query);
    }
}
?>
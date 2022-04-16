<?php
class led extends DB{
    public function get_led($room_id){
        $query =    "SELECT `led`.`id` AS `id`, `led`.`NAME` AS `name`, `led`.`VALUE` AS `value`
                    FROM `led`
                    WHERE `led`.`ROOM_ID` = $room_id;";
        return mysqli_query($this->connect, $query);
    }
    public function create_led($name, $room_id){
        $query =    "INSERT INTO `led` (`led`.`NAME`, `led`.`VALUE`, `led`.`ROOM_ID`) VALUE($name, 1, $room_id);";
        return mysqli_query($this->connect, $query);
    }
    public function update_led($name, $value, $id){
        $query =    "UPDATE `led`
                    SET `led`.`NAME` = " . $name . "
                    AND	`led`.`VALUE` = " . $value . "
                    WHERE `led`.`ID` = " . $id . ";" ;
        return mysqli_query($this->connect, $query);
    }
    public function delete_led($id){
        $query =    "DELETE FROM `led`
                    WHERE `led`.`ID` = " . $id . ";" ;
        return mysqli_query($this->connect, $query);
    }
}
?>
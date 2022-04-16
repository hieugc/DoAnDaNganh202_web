<?php
class fan extends DB{
    public function get_fan($room_id){
        $query =    "SELECT `fan`.`id` AS `id`, `fan`.`NAME` AS `name`, `fan`.`VALUE` AS `value`
                    FROM `fan`
                    WHERE `fan`.`ROOM_ID` = $room_id;";
        return mysqli_query($this->connect, $query);
    }
    public function create_fan($name, $room_id){
        $query =    "INSERT INTO `fan` (`fan`.`NAME`, `fan`.`VALUE`, `fan`.`ROOM_ID`) VALUE($name, 1, $room_id);";
        return mysqli_query($this->connect, $query);
    }
    public function update_fan($name, $value, $id){
        $query =    "UPDATE `fan`
                    SET `fan`.`NAME` = " . $name . "
                    AND	`fan`.`VALUE` = " . $value . "
                    WHERE `fan`.`ID` = " . $id . ";" ;
        return mysqli_query($this->connect, $query);
    }
    public function delete_fan($id){
        $query =    "DELETE FROM `fan`
                    WHERE `fan`.`ID` = " . $id . ";" ;
        return mysqli_query($this->connect, $query);
    }
}
?>
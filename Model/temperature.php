<?php
class temperature extends DB{
    public function get_temperature($room_id){
        $query =    "SELECT `temperature`.`id` AS `id`, `temperature`.`VALUE` AS `value`
                    FROM `temperature`
                    WHERE `temperature`.`ROOM_ID` = $room_id;";
        return mysqli_query($this->connect, $query);
    }
    public function create_temperature($room_id){
        $query =    "INSERT INTO `temperature` (`temperature`.`VALUE`, `temperature`.`ROOM_ID`) VALUE(0, $room_id);";
        return mysqli_query($this->connect, $query);
    }
    public function update_temperature($value, $id){
        $query =    "UPDATE `temperature`
                    SET `temperature`.`VALUE` = " . $value . "
                    WHERE `temperature`.`ID` = " . $id . ";" ;
        return mysqli_query($this->connect, $query);
    }
    public function delete_temperature($id){
        $query =    "DELETE FROM `temperature`
                    WHERE `temperature`.`ID` = " . $id . ";" ;
        return mysqli_query($this->connect, $query);
    }
}
?>
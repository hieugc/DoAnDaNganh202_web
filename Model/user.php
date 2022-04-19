<?php
    class user extends DB{
        public function create_account($USERNAME, $PWD){
            $query =    "INSERT INTO `user` VALUES(\"$USERNAME\", \"$PWD\");" ;
            return mysqli_query($this->connect, $query);
        }
        public function check_exist_account($uname){
            $query =    "SELECT `user`.`USERNAME` AS `username`
                        FROM `user`
                        WHERE `user`.`USERNAME` = \"" . $uname . "\";" ;
            return mysqli_query($this->connect, $query);
        }
        
        public function check_account($USERNAME, $PWD){
            $query =    "SELECT `user`.`USERNAME` AS `username`
                        FROM `user`
                        WHERE `user`.`USERNAME` = \"$USERNAME\"
                        AND `user`.`PWD` = \"$PWD\";" ;
            return mysqli_query($this->connect, $query);
        }
        public function set_account($USERNAME, $PWD, $uname){
            $query =    "UPDATE `user`
                        SET `user`.`USERNAME` = \"" . $USERNAME . "\",
                        	`user`.`PWD` = \"" . $USERNAME . "\"
                        WHERE `user`.`USERNAME` = \"" . $uname . "\";" ;
            return mysqli_query($this->connect, $query);
        }
        //house
        public function get_number_house($uname){
            $query =    "SELECT COUNT(`house`.`ID`) AS `number`
                        FROM `house`
                        WHERE `house`.`USERNAME` = \"$uname\";";
            return mysqli_query($this->connect, $query);
        }
        public function get_house($uname){
            $query =    "SELECT `house`.`id` AS `id`, `house`.`NAME` AS `name`, `house`.`URL_IMG` AS `img`
                        FROM `house`
                        WHERE `house`.`USERNAME` = \"$uname\";";
            return mysqli_query($this->connect, $query);
        }
        public function create_house($name, $img_url, $uname){
            $query =    "INSERT INTO `house` (`house`.`NAME`, `house`.`URL_IMG`, `house`.`USERNAME`) 
                        VALUE(\"$name\", \"$img_url\", \"$uname\");";
            return mysqli_query($this->connect, $query);
        }
        public function update_house($name, $img_url, $id){
            $query =    "UPDATE `house`
                        SET `house`.`NAME` = \"" . $name . "\",
                        	`house`.`URL_IMG` = \"" . $img_url . "\"
                        WHERE `house`.`id` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
        public function delete_house($id){
            $query =    "DELETE FROM `house`
                        WHERE `house`.`ID` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
        //room
        public function get_number_room($house_id){
            $query =    "SELECT COUNT(`room`.`ID`) 
                        FROM `room`
                        WHERE `room`.`HOUSE_ID` = $house_id;";
            return mysqli_query($this->connect, $query);
        }
        public function get_room($house_id){
            $query =    "SELECT `room`.`ID` AS `id`, `room`.`NAME` AS `name`, `room`.`URL_IMG` AS `img`, `room`.`TEMPERATURE` AS `temp`, `room`.`GAS` AS `gas`
                        FROM `room`
                        WHERE `room`.`HOUSE_ID` = $house_id;";
            return mysqli_query($this->connect, $query);
        }
        public function create_room($name, $img_url, $house_id){
            $query =    "INSERT INTO `room` (`room`.`NAME`, `room`.`URL_IMG`, `room`.`HOUSE_ID`) VALUE(\"$name\", \"$img_url\", $house_id);";
            return mysqli_query($this->connect, $query);
        }
        public function update_room($name, $img_url, $id){
            $query =    "UPDATE `room`
                        SET `room`.`NAME` = \"" . $name . "\",
                        	`room`.`URL_IMG` = \"" . $img_url . "\"
                        WHERE `room`.`ID` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
        public function delete_room($id){
            $query =    "DELETE FROM `room`
                        WHERE `room`.`ID` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
        public function set_gas($id){
            $query =    "UPDATE `room`
                        SET `room`.`GAS` = 1
                        WHERE `room`.`ID` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
        public function set_temp($id){
            $query =    "UPDATE `room`
                        SET `room`.`TEMPERATURE` = 1
                        WHERE `room`.`ID` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
        public function unset_gas($id){
            $query =    "UPDATE `room`
                        SET `room`.`GAS` = 0
                        WHERE `room`.`ID` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
        public function unset_temp($id){
            $query =    "UPDATE `room`
                        SET `room`.`TEMPERATURE` = 0
                        WHERE `room`.`ID` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
        //led
        public function get_led($room_id){
            $query =    "SELECT `led`.`id` AS `id`, `led`.`NAME` AS `name`, `led`.`VALUE` AS `value`
                        FROM `led`
                        WHERE `led`.`ROOM_ID` = $room_id;";
            return mysqli_query($this->connect, $query);
        }
        public function create_led($name, $room_id){
            $query =    "INSERT INTO `led` (`led`.`NAME`, `led`.`VALUE`, `led`.`ROOM_ID`) VALUE(\"$name\", 1, $room_id);";
            return mysqli_query($this->connect, $query);
        }
        public function update_led($name, $value, $id){
            $query =    "UPDATE `led`
                        SET `led`.`NAME` = \"" . $name . "\",
                        	`led`.`VALUE` = " . $value . "
                        WHERE `led`.`ID` = " . $id . ";" ;
            echo $query;
            return mysqli_query($this->connect, $query);
        }
        public function delete_led($id){
            $query =    "DELETE FROM `led`
                        WHERE `led`.`ID` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
        //fan
        public function get_fan($room_id){
            $query =    "SELECT `fan`.`id` AS `id`, `fan`.`NAME` AS `name`, `fan`.`VALUE` AS `value`
                        FROM `fan`
                        WHERE `fan`.`ROOM_ID` = $room_id;";
            return mysqli_query($this->connect, $query);
        }
        public function create_fan($name, $room_id){
            $query =    "INSERT INTO `fan` (`fan`.`NAME`, `fan`.`VALUE`, `fan`.`ROOM_ID`) VALUE(\"$name\", 1, $room_id);";
            return mysqli_query($this->connect, $query);
        }
        public function update_fan($name, $value, $id){
            $query =    "UPDATE `fan`
                        SET `fan`.`NAME` = \"" . $name . "\",
                        	`fan`.`VALUE` = " . $value . "
                        WHERE `fan`.`ID` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
        public function delete_fan($id){
            $query =    "DELETE FROM `fan`
                        WHERE `fan`.`ID` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
        public function add_notify($content, $value, $time){
            $query =    "INSERT INTO `notify` (`notify`.`CONTENT`, `notify`.`VALUE`) VALUE(\"$content\", $value);";
            return mysqli_query($this->connect, $query);
        }
        public function get_notify(){
            $query =    "SELECT `notify`.`CONTENT` AS `content`, `notify`.`VALUE` AS `value`, `notify`.`TIME` AS `time`
                        FROM `notify`";
            return mysqli_query($this->connect, $query);
        }
    }
?>
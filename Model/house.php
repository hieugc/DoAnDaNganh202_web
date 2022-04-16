<?php
    class house extends DB{
        public function get_number_house($uname){
            $query =    "SELECT COUNT(`house`.`ID`) 
                        FROM `house`
                        WHERE `house`.`USERNAME` = $uname;";
            return mysqli_query($this->connect, $query);
        }
        public function get_house($uname){
            $query =    "SELECT `house`.`id` AS `id`, `house`.`NAME` AS `name`, `house`.`URL_IMG` AS `img`
                        FROM `house`
                        WHERE `house`.`USERNAME` = $uname;";
            return mysqli_query($this->connect, $query);
        }
        public function create_house($name, $img_url){
            $query =    "INSERT INTO `house` (`house`.`NAME`, `house`.`URL_IMG`, `house`.`USERNAME`) VALUE($name, $img_url, $uname);";
            return mysqli_query($this->connect, $query);
        }
        public function update_house($name, $img_url, $id){
            $query =    "UPDATE `house`
                        SET `house`.`NAME` = " . $name . "
                        AND	`house`.`URL_IMG` = " . $img_url . "
                        WHERE `house`.`id` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
        public function delete_house($id){
            $query =    "DELETE FROM `house`
                        WHERE `house`.`ID` = " . $id . ";" ;
            return mysqli_query($this->connect, $query);
        }
    }
?>
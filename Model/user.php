<?php
    class user extends DB{
        public function create_account($USERNAME, $PWD){
            $query =    "INSERT INTO `user` VALUES($USERNAME, $PWD);" ;
            return mysqli_query($this->connect, $query);
        }
        public function check_exist_account($uname){
            $query =    "SELECT `user`.`USERNAME`
                        FROM `user`
                        WHERE `user`.`USERNAME` = " . $uname . ";" ;
            return mysqli_query($this->connect, $query);
        }
        
        public function check_account($USERNAME, $PWD){
            $query =    "SELECT `user`.`USERNAME`
                        FROM `user`
                        WHERE `user`.`USERNAME` = $USERNAME
                        AND `user`.`PWD` = $PWD;" ;
            return mysqli_query($this->connect, $query);
        }
        public function set_account($USERNAME, $PWD, $uname){
            $query =    "UPDATE `user`
                        SET `user`.`USERNAME` = " . $USERNAME . "
                        AND	`user`.`PWD` = " . $USERNAME . "
                        WHERE `user`.`USERNAME` = " . $uname . ";" ;
            return mysqli_query($this->connect, $query);
        }
    }
?>
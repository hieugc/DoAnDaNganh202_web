<?php
// http://localhost/live/Home/Show/1/2

class login extends Controller{
    public function login_view(){
        if(isset($_SESSION["user_name"])){
            session_unset(); 
        }
        $this->view("login");
    }
    public function sign_in($uname, $pwd){
        $model_name = mysqli_fetch_array($this->model('user')->check_account($uname, $pwd)) ;
        if($model_name){
            $_SESSION["user_name"] = $model_name;
            $_SESSION["house"] = mysqli_fetch_array($this->model('house')->get_house($_SESSION["user_name"]));
            if($_SESSION["house"] != NULL){
                $_SESSION["house_active"] = $_SESSION["house"][0];
                $_SESSION["room"] = mysqli_fetch_array($this->model('room')->get_room($_SESSION["house_active"]["id"]));
                if($_SESSION["room"] != NULL){
                    $_SESSION["room_active"] = $_SESSION["room"][0];
                    $_SESSION["room_led"] = array();
                    $_SESSION["room_fan"] = array();
                    $_SESSION["room_gas"] = array();
                    $_SESSION["room_temperature"] = array();
                    for($i = 0; $i < count($_SESSION["room"]); $i++)
                    {
                        array_push($_SESSION["room_led"], mysqli_fetch_array($this->model('led')->get_led($_SESSION["room"][$i]["id"])));
                        array_push($_SESSION["room_fan"], mysqli_fetch_array($this->model('fan')->get_fan($_SESSION["room"][$i]["id"])));
                        array_push($_SESSION["room_gas"], mysqli_fetch_array($this->model('gas')->get_gas($_SESSION["room"][$i]["id"])));
                        array_push($_SESSION["room_temperature"], mysqli_fetch_array($this->model('temperature')->get_temperature($_SESSION["room"][$i]["id"])));
                    }
                    $_SESSION["room_active_led"] = $_SESSION["room_led"][0];
                    $_SESSION["room_active_fan"] = $_SESSION["room_fan"][0];
                    $_SESSION["room_active_gas"] = $_SESSION["room_gas"][0];
                    $_SESSION["room_active_temperature"] = $_SESSION["room_temperature"][0];
                }
            }
            $this->view("house");
        }
        else{
            echo $model_name;
        }
    }
    public function sign_up(){
        $this->view("sign_up");
    }
}
?>
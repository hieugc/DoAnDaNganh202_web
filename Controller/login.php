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
        //check đăng nhập
        //lấy danh sách nhà
        //nhà mặc định
        $model_name = $this->cus_array($this->model('user')->check_account($uname, $pwd));
        if($model_name){
            $_SESSION["user_name"] = $model_name[0]["username"];//người dùng
            $_SESSION["house"] = $this->cus_array($this->model('user')->get_house($_SESSION["user_name"]));//full nhà
            if(count($_SESSION["house"]) != 0){//có it nhat 1 nha
                $_SESSION["house_active"] = $_SESSION["house"][0];//nhà đang xài
            }
            $this->view("house");
        }
        else{
            echo $model_name;
        }
    }
    public function demo(){
        $_SESSION["Allroom"] = array();//full phong các nhà
                for($i = 0; $i < count($_SESSION["house"]); $i++){
                    array_push($_SESSION["Allroom"], $this->cus_array($this->model('user')->get_room($_SESSION["house"][$i]["id"])));
                }

                $_SESSION["Allroom_led"] = array();//full led các phong trong cac nha
                $_SESSION["Allroom_fan"] = array();
                $_SESSION["Allroom_gas"] = array();
                $_SESSION["Allroom_temperature"] = array();

                for($i = 0; $i < count($_SESSION["Allroom"]); $i++)
                {
                    if($_SESSION["Allroom"][$i]){
                        $_SESSION["room_led"] = array();
                        $_SESSION["room_fan"] = array();
                        $_SESSION["room_gas"] = array();
                        $_SESSION["room_temperature"] = array();
                        for($j = 0; $j < count($_SESSION["Allroom"][$i]); $j++)
                        {
                            if($_SESSION["Allroom"][$i][$j])
                            {
                                array_push($_SESSION["room_led"], $this->cus_array($this->model('user')->get_led($_SESSION["Allroom"][$i][$j]["id"])));
                                array_push($_SESSION["room_fan"], $this->cus_array($this->model('user')->get_fan($_SESSION["Allroom"][$i][$j]["id"])));
                                array_push($_SESSION["room_gas"], $this->cus_array($this->model('user')->get_gas($_SESSION["Allroom"][$i][$j]["id"])));
                                array_push($_SESSION["room_temperature"],$this->cus_array($this->model('user')->get_temperature($_SESSION["Allroom"][$i][$j]["id"])));
                            }
                            else{
                                array_push($_SESSION["room_led"], array());
                                array_push($_SESSION["room_fan"], array());
                                array_push($_SESSION["room_gas"], array());
                                array_push($_SESSION["room_temperature"], array());
                            }
                        }
                        array_push($_SESSION["Allroom_led"], $_SESSION["room_led"]);
                        array_push($_SESSION["Allroom_fan"], $_SESSION["room_fan"]);
                        array_push($_SESSION["Allroom_gas"], $_SESSION["room_gas"]);
                        array_push($_SESSION["Allroom_temperature"], $_SESSION["room_temperature"]);
                    }
                    else{
                        array_push($_SESSION["Allroom_led"], array(array()));
                        array_push($_SESSION["Allroom_fan"], array(array()));
                        array_push($_SESSION["Allroom_gas"], array(array())));
                        array_push($_SESSION["Allroom_temperature"], array(array()));
                    }
                }
                
                $_SESSION["Allroom_active"] = $_SESSION["Allroom"][0];//các phòng trong nhà đang truy cập
                $_SESSION["room_led"] = $_SESSION["Allroom_led"][0];
                $_SESSION["room_fan"] = $_SESSION["Allroom_fan"][0];
                $_SESSION["room_gas"] = $_SESSION["Allroom_gas"][0];
                $_SESSION["room_temperature"] = $_SESSION["Allroom_temperature"][0];

                if($_SESSION["Allroom_active"]){
                    $_SESSION["room_active"] = $_SESSION["Allroom_active"][0];//phòng mặc định
                    $_SESSION["room_active_led"] = $_SESSION["room_led"][0];
                    $_SESSION["room_active_fan"] = $_SESSION["room_fan"][0];
                    $_SESSION["room_active_gas"] = $_SESSION["room_gas"][0];
                    $_SESSION["room_active_temperature"] = $_SESSION["room_temperature"][0];
                }
    }
    public function sign_up(){
        $this->view("sign_up");
    }
}
?>
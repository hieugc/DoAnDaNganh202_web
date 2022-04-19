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
                $_SESSION["room"] = $this->cus_array($this->model("user")->get_room($_SESSION["house_active"]["id"]));//lay full phong
                if(count($_SESSION["room"]) != 0){
                    $_SESSION["room_active"] = $_SESSION["room"][0];
                    $_SESSION["notify"] = $this->cus_array($this->model('user')->get_notify());
                }
            }
            echo "?url=house/house_view/";
        }
        else{
            echo "null-" . $model_name;
        }
    }
}
?>
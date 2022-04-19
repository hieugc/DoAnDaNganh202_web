<?php
// http://localhost/live/Home/Show/1/2

class dangerous_notify extends Controller{
    public function dangerous_notify_view($value=0){
        if(!isset($_SESSION["user_name"])){
            $this->view("login");
        }
        else{
            $time = date("d-m-Y");
            $content = $_SESSION["house_active"]["name"] . " " . $_SESSION["room_active"]["name"];
            $model_name = $this->model('user')->add_notify($content, $value, $time);
            $this->view("dangerous_notify");
        }
    }
    public function safe(){
        $this->model("adafruit")->create_data($_SESSION["user_name"] . "." . $_SESSION["user_name"], "house-" . $_SESSION["house_active"]["id"], "room-" . $_SESSION["room_active"]["id"], "gas", 0);
        echo "ok";
    }
}
?>
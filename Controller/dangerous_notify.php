<?php
// http://localhost/live/Home/Show/1/2

class dangerous_notify extends Controller{
    public function dangerous_notify_view(){
        if(!isset($_SESSION["user_name"])){
            $this->view("login");
        }
        else{
            $this->view("dangerous_notify");
        }
    }
}
?>
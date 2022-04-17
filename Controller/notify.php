<?php
// http://localhost/live/house/Show/1/2

class notify extends Controller{
    public function notify_view(){
        if(!isset($_SESSION["user_name"])){
            $this->view("login");
        }
        else{
            $this->view("notify");
        }
    }
}
?>
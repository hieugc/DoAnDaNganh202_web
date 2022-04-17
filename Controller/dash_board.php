<?php
// http://localhost/live/Home/Show/1/2

class dash_board extends Controller{
    public function dash_board_view(){
        if(!isset($_SESSION["user_name"])){
            $this->view("login");
        }
        else{
            $this->view("dashboard_room");
        }
    }
    
    public function get_range_gas(){
        //$user, $house, $room, $device, $start, $end
        if($_SESSION["room_active"]["gas"] == 1){
            $date = date('Y-m-d');
            $ago = strtotime("-1 week", strtotime($date));
            $next = strtotime("+1 day", strtotime($date));
            $data = $this->model('adafruit')->get_range_data($_SESSION["user_name"] . '.' . $_SESSION["user_name"], 'nha-' . $_SESSION["house_active"]["id"], 'phong-' . $_SESSION["room_active"]["id"], 'gas', date('Y-m-d', $ago), date('Y-m-d', $next));
            echo json_encode($data);
        }
        else{
            echo "null";
        }
    }
    public function get_range_temperature(){
        if($_SESSION["room_active"]["gas"] == 1){
            $date = date('Y-m-d');
            $ago = strtotime("-1 week", strtotime($date));
            $next = strtotime("+1 day", strtotime($date));
            $data = $this->model('adafruit')->get_range_data($_SESSION["user_name"] . '.' . $_SESSION["user_name"], 'nha-' . $_SESSION["house_active"]["id"], 'phong-' . $_SESSION["room_active"]["id"], 'temp', date('Y-m-d', $ago), date('Y-m-d', $next));
            echo json_encode($data);
        }
        else{
            echo "null";
        }
    }
    public function get_gas(){
        //$user, $house, $room, $device, $start, $end
        if($_SESSION["room_active"]["gas"] == 1){
            $data = $this->model('adafruit')->get_data($_SESSION["user_name"] . '.' . $_SESSION["user_name"], 'nha-' . $_SESSION["house_active"]["id"], 'phong-' . $_SESSION["room_active"]["id"], 'gas');
            echo json_encode($data);
        }
        else{
            echo "null";
        }
    }
    public function get_temperature(){
        if($_SESSION["room_active"]["gas"] == 1){
            $data = $this->model('adafruit')->get_data($_SESSION["user_name"] . '.' . $_SESSION["user_name"], 'nha-' . $_SESSION["house_active"]["id"], 'phong-' . $_SESSION["room_active"]["id"], 'temp');
            echo json_encode($data);
        }
        else{
            echo "null";
        }
    }
}
?>
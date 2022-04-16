<?php
// http://localhost/live/Home/Show/1/2

class room extends Controller{
    public function room_view(){
        if(!isset($_SESSION["user_name"])){
            $this->view("login");
        }
        $this->view("room");
    }
    /*public function create_dashboard($name){
        $ADAFRUIT_IO_USERNAME = "Hieupham2502";
        $ADAFRUIT_IO_KEY = "aio_vmAg27wiuVuco7Rj2qaRqxw9vX2Q";
        $data = array(
            "dashboard" => array(
                "name" => "User-" . $_SESSION["user_name"] . '-' . $_SESSION["room_active"]["name"] . '-' . $name
            )
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 0,
            CURLOPT_URL => 'https://io.adafruit.com/api/v2/Hieupham2502/dashboards/',
            CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Content-Length'.strlen(json_encode($data)),
                'X-AIO-Key: aio_vmAg27wiuVuco7Rj2qaRqxw9vX2Q'
            ),  
            CURLOPT_POST => 1, 
            CURLOPT_POSTFIELDS => json_encode($data)
        ));
        $resp = curl_exec($curl);
        curl_close($curl);
    }*/
    public function create_room($name, $img_url){
        $model_name = mysqli_fetch_array($this->model('room')->create_room($name, $img_url, $_SESSION["house_active"]["id"]));
        if($model_name){
            $_SESSION["room"] = mysqli_fetch_array($this->model('room')->get_room($_SESSION["house_active"]["id"]));
            $this->model('adafruit')->create_dashboard($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $name);//
            echo "ok";
        }
        else{
            echo $model_name;
        }
        //gọi ajax
    }
    public function update_room($name, $img_url){
        $id = $_SESSION["room_active"]["id"];
        $model_name = $this->model('room')->update_room($name, $img_url, $id);
        if($model_name){
            $_SESSION["room"][$id - 1]["name"] = $name;
            $_SESSION["room"][$id - 1]["img"] = $img_url;
            $_SESSION["room_active"]["name"] = $name;
            $_SESSION["room_active"]["img"] = $img_url;
            echo "ok";
        }
        else{
            echo $model_name;
        }
        //user duy nhất
        //=> feed_name: user-house-i-room-i-device-i
        //=> dash_board: user-house-i-room-i
        //=>không cần đổi tên feed + dashboard
    }
    public function delete_room($room_id){
        // lấy full id room
        // xóa thiết bị led
        // xóa thiết bị gas
        // xóa thiết bị nhiệt
        // xóa thiết bị quạt
        // xóa feed
        // xóa dashboard 
    }
    
    public function change_room($room_id){
        if(isset($_SESSION["room_active"]) && isset($_SESSION["room"]))
        {
            //$_SESSION["room_active"] = $_SESSION["room"][array_search($room_id, $_SESSION["room"])];
            $_SESSION["room_active"] = $_SESSION["room"][$room_id];
            $this->home_view();
        }
        else{
            var_dump($_SESSION["room_active"]);
            var_dump($_SESSION["room"]);
        }
    }
    public function create_method(){
    }
    //tạo thao tác
    public function create_led($name){
        $model_name = mysqli_fetch_array($this->model('led')->create_led($name, $_SESSION["room_active"]["id"]));
        if($model_name){
            $index = array_search($_SESSION["room_active_led"], $_SESSION["room_led"]);
            $_SESSION["room_active_led"] = mysqli_fetch_array($this->model('led')->get_led($_SESSION["room_active"]["id"]));
            $_SESSION["room_led"][$index] = $_SESSION["room_active_led"];
            $this->model('adafruit')->create_feed($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $_SESSION["room_active"]["id"], 'led-' . $name);//
            echo "ok";
        }
        else{
            echo $model_name;
        }
    }
    
    public function create_fan($name){
        $model_name = mysqli_fetch_array($this->model('fan')->create_fan($name, $_SESSION["room_active"]["id"]));
        if($model_name){
            $index = array_search($_SESSION["room_active_fan"], $_SESSION["room_fan"]);
            $_SESSION["room_active_fan"] = mysqli_fetch_array($this->model('fan')->get_fan($_SESSION["room_active"]["id"]));
            $_SESSION["room_fan"][$index] = $_SESSION["room_active_fan"];
            $this->model('adafruit')->create_feed($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $_SESSION["room_active"]["id"], 'fan-' . $name);//
            echo "ok";
        }
        else{
            echo $model_name;
        }
    }
    
    public function create_gas($name){
        $model_name = mysqli_fetch_array($this->model('gas')->create_gas($name, $_SESSION["room_active"]["id"]));
        if($model_name){
            $index = array_search($_SESSION["room_active_gas"], $_SESSION["room_gas"]);
            $_SESSION["room_active_gas"] = mysqli_fetch_array($this->model('gas')->get_gas($_SESSION["room_active"]["id"]));
            $_SESSION["room_gas"][$index] = $_SESSION["room_active_gas"];
            $this->model('adafruit')->create_feed($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $_SESSION["room_active"]["id"], 'gas-' . $name);//
            echo "ok";
        }
        else{
            echo $model_name;
        }
    }
    
    public function create_temperature(){
        $model_name = mysqli_fetch_array($this->model('temperature')->create_temperature($_SESSION["room_active"]["id"]));
        if($model_name){
            $index = array_search($_SESSION["room_active_temperature"], $_SESSION["room_temperature"]);
            $_SESSION["room_active_temperature"] = mysqli_fetch_array($this->model('temperature')->get_temperature($_SESSION["room_active"]["id"]));
            $_SESSION["room_temperature"][$index] = $_SESSION["room_active_temperature"];
            $this->model('adafruit')->create_feed($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $_SESSION["room_active"]["id"], 'temperature-' . $name);//
            echo "ok";
        }
        else{
            echo $model_name;
        }
    }
}
?>
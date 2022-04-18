<?php
// http://localhost/live/Home/Show/1/2

class room extends Controller{
    public function room_view(){
        if(!isset($_SESSION["user_name"])){
            $this->view("login");
        }
        else{
            //lấy led
            //lấy fan
            $_SESSION["room_led"] = $this->cus_array($this->model('user')->get_led($_SESSION["room_active"]["id"]));
            $_SESSION["room_fan"] = $this->cus_array($this->model('user')->get_fan($_SESSION["room_active"]["id"]));
            $this->view("room");
        }
    }
    public function create_room($name, $img_url){
        //tạo mới phòng
        //lấy lại danh sách phòng
        //nếu số phòng = 1 set mặc định
        //tạo dashboard mới
        //trả tín hiệu => AJAX
        $model_name = $this->model('user')->create_room($name, $img_url, $_SESSION["house_active"]["id"]);//1
        if($model_name){
            $_SESSION["room"] = $this->cus_array($this->model('user')->get_room($_SESSION["house_active"]["id"]));//2
            if(count($_SESSION["room"]) == 1){//3
                $_SESSION["room_active"] = $_SESSION["room"][0];
            }
            $this->model('adafruit')->create_dashboard( $_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . end($_SESSION["room"])["id"]);//4
            echo "ok";//5
        }
        else{
            echo $model_name;
        }
    }
    public function update_room($name, $img_url){
        //lấy id
        //update phòng
        //lấy danh sách phòng
        //cập nhật phòng đang hđ
        $id = $_SESSION["room_active"]["id"];
        $model_name = $this->model('user')->update_room($name, $img_url, $id);
        if($model_name){
            $_SESSION["room"] = $this->cus_array($this->model('user')->get_room($_SESSION["house_active"]["id"]));//2
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
            $this->room_view();
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
        //tạo led
        //tạo feed
        //tạo block
        $model_name = $this->model('user')->create_led($name, $_SESSION["room_active"]["id"]);
        if($model_name){
            $_SESSION["room_led"] = $this->cus_array($this->model('user')->get_led($_SESSION["room_active"]["id"]));
            echo end($_SESSION["room_led"])["id"];
            $this->model('adafruit')->create_feed($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $_SESSION["room_active"]["id"], 'led-' . end($_SESSION["room_led"])["id"]);
            $this->model('adafruit')->create_block($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $_SESSION["room_active"]["id"], 'led-' . end($_SESSION["room_led"])["id"]);
            echo "ok";
        }
        else{
            echo $model_name;
        }
    }
    
    public function create_fan($name){
        //tạo led
        //tạo feed + block
        $model_name = $this->model('user')->create_fan($name, $_SESSION["room_active"]["id"]);
        if($model_name){
            $_SESSION["room_fan"] = $this->cus_array($this->model('user')->get_fan($_SESSION["room_active"]["id"]));
            $this->model('adafruit')->create_feed($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $_SESSION["room_active"]["id"], 'fan-' . end($_SESSION["room_fan"]["id"]));
            $this->model('adafruit')->create_block($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $_SESSION["room_active"]["id"], 'fan-' . end($_SESSION["room_fan"]["id"]));
            echo "ok";
        }
        else{
            echo $model_name;
        }
    }
    
    public function set_gas($name){
        $this->model('user')->set_gas($name, $_SESSION["room_active"]["id"]);
        $this->model('adafruit')->create_feed($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $_SESSION["room_active"]["id"], 'gas');
        $this->model('adafruit')->create_block($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $_SESSION["room_active"]["id"], 'gas');
    }
    
    public function set_temperature(){
        $this->model('user')->set_temp($name, $_SESSION["room_active"]["id"]);
        $this->model('adafruit')->create_feed($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $_SESSION["room_active"]["id"], 'temp');
        $this->model('adafruit')->create_block($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $_SESSION["room_active"]["id"], 'temp');
    }


    public function delete_led($name){
        //tạo led
        //tạo feed
        $model_name = $this->model('user')->create_led($name, $_SESSION["room_active"]["id"]);
        if($model_name){
            $_SESSION["room_led"] = $this->cus_array($this->model('user')->get_led($_SESSION["room_active"]["id"]));
            $this->model('adafruit')->create_feed($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $_SESSION["room_active"]["id"], 'led-' . end($_SESSION["room_led"]["id"]));//
            echo "ok";
        }
        else{
            echo $model_name;
        }
    }
    
    public function delete_fan($name){
        //xóa feed + block
        //xóa led
        $model_name = $this->model('user')->create_fan($name, $_SESSION["room_active"]["id"]);
        if($model_name){
            $_SESSION["room_fan"] = $this->cus_array($this->model('user')->get_fan($_SESSION["room_active"]["id"]));
            $this->model('adafruit')->create_feed($_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $_SESSION["room_active"]["id"], 'fan-' . end($_SESSION["room_fan"]["id"]));//
            echo "ok";
        }
        else{
            echo $model_name;
        }
    }
    public function update_device($name, $value, $device){
        var_dump($name);
        if(explode("-", $device)[0] == "led"){
            $this->updateLed($name, $value, explode("-", $device)[1]);
        }
        else{
            $this->updateFan($name, $value, explode("-", $device)[1]);
        }
        if($value == 0){
            $value = explode("-", $device)[1]*2-2;
        }
        else{
            $value = explode("-", $device)[1]*2-1;
        }
        $this->model("adafruit")->create_data($_SESSION["user_name"] . "." . $_SESSION["user_name"], "house-" . $_SESSION["house_active"]["id"], "room-" . $_SESSION["room_active"]["id"], $device, $value);
    }
    public function updateLed($name, $value, $id){
        //update DB
        echo $this->model("user")->update_led($name, $value, $id);
    }
    public function updateFan($name, $value, $id){
        //update DB
        echo $this->model("user")->update_fan($name, $value, $id);
    }
}
?>
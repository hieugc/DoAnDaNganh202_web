<?php
// http://localhost/live/house/Show/1/2

class house extends Controller{
    public function house_view(){
        if(!isset($_SESSION["user_name"])){
            $this->view("login");
        }
        else{
            //lấy danh sách phòng
            //phòng mặc định
            /*
            $_SESSION["room"] = $this->cus_array($this->model("user")->get_room($_SESSION["house_active"]["id"]));//lay full phong
            if(count($_SESSION["room"]) != 0){
                $_SESSION["room_active"] = $_SESSION["room"][0];
            }*/
            //lấy danh sách method ở nhà chưa làm
            $this->view("house");
        }
    }
    public function create_house($name, $img_url){
        //tạo mới nhà
        //lấy lại danh sách nhà
        //nhà = 1 set 1 mặc định
        $model_name = $this->model('user')->create_house($name, $img_url, $_SESSION["user_name"]);
        if($model_name){
            $_SESSION["house"] = $this->cus_array($this->model('user')->get_house($_SESSION["user_name"]));
            if(count($_SESSION["house"]) == 1)
            {
                $_SESSION["house_active"] = $_SESSION["house"][0];
            }
            echo "ok";
        }
        else{
            var_dump($model_name);
        }
    }
    public function update_house($name, $img_url){
        //lấy id nhà đang hoạt động
        //cập nhật lại thông tin trong danh sách nhà
        //cập nhật nhà hoạt động
        $id = $_SESSION["house_active"]["id"];
        $model_name = $this->model('user')->update_house($name, $img_url, $id);
        if($model_name){
            $_SESSION["house"] = $this->cus_array($this->model('user')->get_house($_SESSION["user_name"]));
            $_SESSION["house_active"]["name"] = $name;
            $_SESSION["house_active"]["img"] = $img_url;
            echo "ok";//tín hiệu
        }
        else{
            echo $model_name;
        }
        //user duy nhất
        //=> feed_name: user-house-id-room-id-device-id
        //=> dash_board: user-house-id-room-id
        //=>không cần đổi tên feed + dashboard
    }
    public function delete_house(){
        // lấy full id room
        // xóa thiết bị led
        // xóa thiết bị gas
        // xóa thiết bị nhiệt
        // xóa thiết bị quạt
        // xóa feed
        // xóa dashboard 
    }
    
    public function change_house($house_id){
        if(isset($_SESSION["house_active"]) && isset($_SESSION["house"]))
        {
            //$_SESSION["house_active"] = $_SESSION["house"][array_search($house_id, $_SESSION["house"])];
            $_SESSION["house_active"] = $_SESSION["house"][$house_id];//đổi nhà
            //đổi danh sách phòng => hàm dưới đã làm
            //đổi phòng mặc định => hàm dưới đã làm
            //lấy danh sách nhà method => hàm dưới đã làm
            $this->house_view();
        }
        else{
            var_dump($_SESSION["house_active"]);
            var_dump($_SESSION["house"]);
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
            //$this->model('adafruit')->create_dashboard( $_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . end($_SESSION["room"])["id"]);//4
            echo "ok";//5
        }
        else{
            echo $model_name;
        }
    }
    public function get_all_led_in_room($id){
        return $this->cus_array($this->model('user')->get_led($id));
    }
    public function get_all_fan_in_room($id){
        return $this->cus_array($this->model('user')->get_fan($id));
    }
    public function get_all_room_with_device(){
        //nếu cả 2 null => ẩn phòng
        //echo ra html của phòng
        //echo ra html của led
        //echo ra html của fan
        $_SESSION["all_led"] = array();
        $_SESSION["all_fan"] = array();
        for($i = 0; $i < count($_SESSION["room"]); $i++)
        {
            $led = $this->get_all_led_in_room($_SESSION["room"][$i]["id"]);
            $fan = $this->get_all_fan_in_room($_SESSION["room"][$i]["id"]);
            var_dump($fan);
            var_dump($led);
            if($fan == NULL && $led == NULL) continue;
        }
    }
}
?>
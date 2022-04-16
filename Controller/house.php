<?php
// http://localhost/live/house/Show/1/2

class house extends Controller{
    public function house_view(){
        if(!isset($_SESSION["user_name"])){
            $this->view("login");
        }
        $this->view("house");
    }
    public function create_house($name, $img_url){
        $model_name = mysqli_fetch_array($this->model('house')->create_house($name, $img_url, $_SESSION["user_name"])) ;
        if($model_name){
            $_SESSION["house"] = mysqli_fetch_array($this->model('house')->get_house($_SESSION["user_name"]));
        }
        else{
            echo $model_name;
        }
    }
    public function update_house($name, $img_url){
        $id = $_SESSION["house_active"]["id"];
        $model_name = $this->model('house')->update_house($name, $img_url, $id);
        if($model_name){
            $_SESSION["house"][$id - 1]["name"] = $name;
            $_SESSION["house"][$id - 1]["img"] = $img_url;
            $_SESSION["house_active"]["name"] = $name;
            $_SESSION["house_active"]["img"] = $img_url;
            echo "ok";
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
            $_SESSION["house_active"] = $_SESSION["house"][$house_id];
            $this->house_view();
        }
        else{
            var_dump($_SESSION["house_active"]);
            var_dump($_SESSION["house"]);
        }
    }
    /*
    public function create_dashboard($name){
        $data = array(
            "dashboard" => array(
                "name" => "User-" . $_SESSION["user_name"] . '-' . $_SESSION["house_active"]["name"] . '-' . $name
            )
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 0,
            CURLOPT_URL => 'https://io.adafruit.com/api/v2/Hieupham2502/dashboards/',
            CURLOPT_SSL_VERIFYPEER => false,
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
            $this->model('adafruit')->create_dashboard( $_SESSION["user_name"], 'house-' . $_SESSION["house_active"]["id"], 'room-' . $name);//
            echo "ok";
        }
        else{
            echo $model_name;
        }
        //gọi ajax
    }
    public function create_method(){
    }
}
?>
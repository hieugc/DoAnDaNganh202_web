<?php
// http://localhost/live/Home/Show/1/2

class sign_up extends Controller{
    public function login_view(){
        $this->view("login");
    }
    /*public function create_group($uname){
        $ADAFRUIT_IO_USERNAME = "Hieupham2502";
        $ADAFRUIT_IO_KEY = "aio_vmAg27wiuVuco7Rj2qaRqxw9vX2Q";
        $data = array(
            "group" => array(
                "name" => "User-" . $uname
            )
        );

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 0,
            CURLOPT_URL => 'https://io.adafruit.com/api/v2/Hieupham2502/groups/',
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
    public function sign_up($uname, $pwd){
        $model_name = mysqli_fetch_array($this->model('user')->check_exist_account($uname)) ;
        if($model_name){
            echo $model_name;
        }
        else{
            $this->model('user')->create_account($uname, $pwd);
            $this->model('adafruit')->create_group($uname);
            $this->login_view();
        }
    }
}
?>
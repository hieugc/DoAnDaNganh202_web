<?php
// http://localhost/live/Home/Show/1/2

class sign_up extends Controller{
    public function sign_up_view(){
        $this->view("sign_up");
    }
    
    public function Esign_up($name, $pwd){
        $model_name = $this->cus_array($this->model('user')->check_exist_account($name));//bool
        if($model_name){
            echo "null-"; 
            var_dump($model_name);
        }
        else{
            $this->model('user')->create_account($name, $pwd);
            $this->model('adafruit')->create_group($name);
            echo "?url=login/login_view/";
        }
    }
}
?>
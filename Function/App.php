<?php
class App{
//Home/Function/para/para
    protected $controller="login";
    protected $action="login_view";
    protected $params=[];

    function __construct(){
 
        $arr = $this->UrlProcess();
        // Controller
        if(!empty($arr) && file_exists("./Controller/" . $arr[0].".php")){
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once ("./Controller/"). $this->controller .".php";
        $this->controller = new $this->controller;

        // Action
        if(isset($arr[1])){
            if( method_exists( $this->controller , $arr[1]) ){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        $this->params = [];
        // Params
        if(!empty($arr)) {
            for($x = 2; $x < count($arr) + 2; $x++){
                array_push($this->params, $arr[$x]);
            }
        }
        call_user_func_array([$this->controller, $this->action], $this->params);
    }
    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
?>
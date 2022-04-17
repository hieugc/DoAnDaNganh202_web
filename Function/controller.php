<?php
class Controller{

    public function model($model){
        require_once "./Model/". $model .".php";
        return new $model;
    }

    public function view($view){
        require_once "./Views/". $view . "/index.php";
    }

    public function cus_array($query){
        $array = array();
        foreach($query as $ele){
            array_push($array, $ele);
        }
        return $array;
    }
}
?>
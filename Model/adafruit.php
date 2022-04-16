<?php
    class adafruit{
        protected $ADAFRUIT_IO_USERNAME = "Hieupham2502";
        protected $ADAFRUIT_IO_KEY = "aio_vmAg27wiuVuco7Rj2qaRqxw9vX2Q";
        private function cus_curl($data, $type, $method){
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 0,
                CURLOPT_URL => 'https://io.adafruit.com/api/v2/' . $this->ADAFRUIT_IO_USERNAME . $type,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Content-Length'.strlen(json_encode($data)),
                    'X-AIO-Key: ' . $this->ADAFRUIT_IO_KEY
                ),  
                CURLOPT_CUSTOMREQUEST => $method
            ));
            if ($data != ''){
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            }
            $resp = curl_exec($curl);
            curl_close($curl);
        }
        private function makeString($array){
            $string = $array[0];
            for($i = 1; $i < count($array); $i++)
                $string .= $array[$i] . '-';
            return $string;
        }
        private function makeData($value, $string, $type){
            return array(
                $type => array(
                    $value => $string
                )
            );
        }
        public function create_group($user){
            $this->cus_curl($this->makeData("name", $this->makeString(array($user)), 'group'), '\/groups', 'POST');
        }
        public function create_dashboard($user, $house, $room){
            $this->cus_curl($this->makeData("name", $this->makeString(array($user, $house, $room)), 'dashboard'), '\/dashboards', 'POST');
        }
        public function create_feed($user, $house, $room, $device){
            $this->cus_curl($this->makeData("name", $this->makeString(array($user, $house, $room, $device)), 'feed'), '\/feeds?group_key=' . $user, 'POST');
        }
        public function create_data($user, $house, $room, $device, $value){
            $this->cus_curl($this->makeData("value", $value, 'datum'), '\/feeds/' . $this->makeString(array($user, $house, $room, $device)) .'\/data', 'POST');
        }
        
        public function get_last_data($user, $house, $room, $device){
            $this->cus_curl('', '\/feeds/' . $this->makeString(array($user, $house, $room, $device)) . '\/data?limit=1', 'GET');
        }
        public function get_range_data($user, $house, $room, $device, $start, $end){
            $this->cus_curl('', '\/feeds/' . $this->makeString(array($user, $house, $room, $device)) . '\/data?start_time=' . $start . '&end_time=' . $end, 'GET');
        }

        
        public function delete_group($user){
            $this->cus_curl('', '\/groups/' . $this->makeString(array($user)), 'DELETE');
        }
        public function delete_dashboard($user, $house, $room){
            $this->cus_curl('', '\/dashboards/' . $this->makeString(array($user, $house, $room)), 'DELETE');
        }
        public function delete_feed($user, $house, $room, $device){
            $this->cus_curl('', '\/feeds/' . $this->makeString(array($user, $house, $room, $device), 'DELETE');
        }
        
        //có thể bỏ
        public function update_dashboard($user, $house, $room){
            $this->cus_curl($this->makeData("name", $this->makeString(array($house, $room)), 'dashboard'), '\/dashboards/', 'PUT');
        }
        public function update_feed($user, $house, $room, $device){
            $this->cus_curl($this->makeData("name", $this->makeString(array($user, $house, $room, $device)), 'feed'), '\/feeds/' . $user, 'PUT');
        }
    }
?>
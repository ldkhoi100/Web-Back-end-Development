<?php
class App
{
    // http://localhost/Web%20Back-end%20Development/SQL/live/home/SayHi/1/2/3
    protected $controller = "home";
    protected $action = "sayhi";
    protected $param = [];

    function __construct()
    {
        // Array ( [0] => home [1] => 1 [2] => 2 [3] => 3 )
        $arr = $this->urlProcess();
        //print_r($arr);

        //Xử lý controller
        if (file_exists("./mvc/controllers/" . $arr[0] . ".php")) {
            $this->controller = $arr[0];
            unset($arr[0]);
        }

        require_once "./mvc/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        //Xử lý action
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        //Xử lý Params
        $this->param = $arr ? array_values($arr) : [];
        // echo $this->controller;
        // echo $this->action;
        // print_r($this->param);
        // Tạo 1 cái biển kiểu là controller, chạy hàm sayhi, tham số truyền vào là như vậy
        call_user_func_array([$this->controller, $this->action], $this->param);
    }


    function urlProcess()
    {
        // home/SayHi/1/2/3
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
<?php

    class DBMySQl
    {
        public $host = "localhost"; 
        public $user = "root"; // Логин БД
        public $password = ""; // Пароль БД
        public $base = 'task'; // Имя БД
        public $connect;

        function __construct(){
            $this->connect = mysqli_connect($this->host, $this->user, $this->password);
        }

        function connect(){
            return mysqli_connect($this->host, $this->user, $this->password, $this->base);
        }

        function query($request){
            mysqli_query($this->connect, $request);
        }

        function select($request, $bool = true){
            return mysqli_query($this->connect, $request);
            // var_dump($this->assoc($result));
        }

        function assoc($res){
	        while ($row = $res->fetch_assoc())
	        {
	            $result[] = $row;
	        }
    		return $result;
    	}
    }
<?php

    require_once "Db.php";

    function update($text)
    {
        $Db = new DBMySQl();
        $Db->connect = $Db->connect();

        $request = 'https://jsonplaceholder.typicode.com/'.$text;
        $request_json = file_get_contents("$request");
        $json = json_decode($request_json,true);

        foreach ($json as $key => $array) {
            $insert =("INSERT INTO `".$text."` (`id`) VALUES ( ".$array["id"]." ) ;");
            $Db->query($insert);
            foreach ($array as $array_key => $value) {
                if($array_key !== "id")
                    $update =("UPDATE `".$text."` SET `".$array_key."` = '".$value."' WHERE `id` = ".$array["id"].";");
                else continue;
                $Db->query($update);
            };
        };
        return $key;
    };

    $post = update("posts");
    $coments = update("comments");

    echo "<meta http-equiv='Content-type' content='text/html;charset=UTF-8'>";
    echo "Загружено $post записей и $coments комментариев";
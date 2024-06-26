<?php
die();
function send($str, $ip = '127.0.0.1', $port = 9555) {
    if (gettype($str) !== 'string') {
        $str = json_encode($str);
    }

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Could not create socket\n"); //TCP for connecting the NODE JS server
    socket_connect($socket, $ip, $port) or die("Could not connect socket\n");

    socket_send($socket, $str, strlen($str),0);
    socket_shutdown($socket, 2);

    return $str;
}

var_dump(send(array('user_id'=>'0', 'message'=> 'Hey USER 0')));
var_dump(send(array('user_id'=>'1', 'message'=> 'Hey USER 1')));
var_dump(send(array('user_id'=>'*', 'message'=> 'Hey ALL')));

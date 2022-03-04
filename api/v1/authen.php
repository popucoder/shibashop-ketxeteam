<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once('../../db/dbhelper.php');
require_once('../../utils/utility.php');

$action = getPOST('action');

switch($action) {
    case 'login':
        handleLogin();
        die();

    case 'register':
        handleRegister();
        die();
}

function handleLogin() {
    $username = getPOST('username');
    $password = md5Security(getPOST('password'));
    
    $sql = "select * from users where username = '$username' and password = '$password'";
    
    $result = executeResult($sql, true);
    
    if(isset($result)) {

        $accessToken = md5Security($username.time());
        setcookie('token', $accessToken, time()+7*24*60*60, '/');

        $res = [
            "status" => 1,
            "msg" => "",
            "user" => [
                "username" => $result['username'],
                "fullname" => $result['fullname']
            ]
        ];
    } else {
        $res = [
            'status' => 0,
            'msg' => 'Not found user',
            'user' => $result
        ];
    }

    echo json_encode($res);
}

function handleRegister() {
    $username = getPOST('username');
    $password = md5Security(getPOST('password'));
    $fullname = getPOST('fullname');

    $sql = "select * from users where username = '$username'";
    
    $result = executeResult($sql, true);

    if(isset($result)) {
        $res = [
            'status' => 0,
            'msg' => "Username already exists"
        ];
    } else {

        $sql = "insert into users(fullname, username, password)
        value ('$fullname','$username','$password')";
        
        execute($sql);

        $res = [
            'status' => 1,
            'msg' => "",
        ];
    }

    echo json_encode($res);
    

}
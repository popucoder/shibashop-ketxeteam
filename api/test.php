<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once('../db/dbhelper.php');
require_once('../utils/utilityt.php');


if (isset($_GET)) {
    doUserList();
    die();
}

$action = getPOST('action');

switch ($action) {
    case 'list':
        doUserList();
        break; 
    default:
        //doUserList();
        
}

function doUserList() {
    $sql = 'select * from users';
    $result = executeResult($sql);
    $res = [
        'status' => 1,
        'msg' => '',
        'userList' => $result
    ];
    
    echo json_encode($res);
}
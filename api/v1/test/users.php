<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once $_SERVER['DOCUMENT_ROOT']..'/db/config.php';
include_once $_SERVER['DOCUMENT_ROOT']..'/utils/utilyty.php';


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
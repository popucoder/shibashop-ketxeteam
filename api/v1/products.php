<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once('../../db/dbhelper.php');
require_once('../../utils/utility.php');

$action = getPOST('action');

switch($action) {
    case 'add':
        handleAdd();
        die();

    case 'delete':
        handleDelete();
        die();
}

function handleAdd() {
    $name = getPOST('name');
    $price = getPOST('price');
    
}
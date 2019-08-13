<?php
$name = 'default';
if (isset($_POST['name'])) $name = $_POST['name'];
if (isset($_GET['name'])) $name = $_GET['name'];
$data = array(
    array('name'=>'one', 'age'=>10),
    array('name'=>'two', 'age'=>20),
);
$response = array();
$response['status'] = 'OK';
$response['message'] = 'Hello '.$name.'.';
$response['data'] = $data;
header('Contetnt-type: application/json');
echo json_encode($response);
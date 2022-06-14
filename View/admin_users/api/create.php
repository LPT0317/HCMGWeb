<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../core/initialize.php');

    $post = new User($db);

    $data = json_decode(file_get_contents("php://input"));

    $post->id = $data->id;
    $post->name = $data->name;
    $post->year = $data->year;

    if($post->create()){
        echo json_encode(
            array('message' => 'Post created.')
        );
    }else{
        echo json_encode(
            array('message' => 'Post not created.')
        );
    }
?>
<?php
    require_once '../core/user.php';
    require_once '../includes/config.php';
	$user = new User($db);
    $user->id = $_GET['id'];
    if($user->delete())
    {
        header('Location: ../index.php?action=deleted');
    }else
    {
        die('Unable to delete record.');
    }
?>
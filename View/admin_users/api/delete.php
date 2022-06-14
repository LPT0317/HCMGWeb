<?php
    require_once 'core/initialize.php';
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
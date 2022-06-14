<?php
    require_once 'core/initialize.php';
	$user = new User($db);
	$result = $user->read();

    $num = $result->rowCount();
?>
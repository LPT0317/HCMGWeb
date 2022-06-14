<?php
    require_once 'core/user.php';
    require_once 'includes/config.php';
	$user = new User($db);
	$result = $user->read();

    $num = $result->rowCount();
?>
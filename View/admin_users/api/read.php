<?php
    require_once '../initialize.php';
	$user = new User($db);
	$result = $user->read();

    $num = $result->rowCount();
?>
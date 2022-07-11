<?php
    session_start();//Intialize the session
	session_unset();
	session_destroy();
	header("location:login.php");
?>
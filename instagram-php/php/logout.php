<?php 

session_start();

unset($_SESSION['userdata']);

header('location: ../');
<?php
session_start();
include('./config/config.php');
header("location:" . base_url . "views/index.php");

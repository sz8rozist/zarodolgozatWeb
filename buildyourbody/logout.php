<?php
require_once 'php/init.php';
session_destroy();
header("location: index.php");
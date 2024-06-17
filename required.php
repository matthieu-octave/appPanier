<?php
session_start();
require('functions.php');
require 'db-functions.php';

$carts=cartDisplay();
$qtty=cartQty();
$totalQty= $qtty['totalQty'];
 ?>
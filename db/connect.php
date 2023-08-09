<?php
$connect = new mysqli("localhost","root","","library");

// Check connection
if ($connect -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>
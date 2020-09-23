<?php
  if (getenv('JAWSDB_URL')){
    $url = getenv('JAWSDB_URL');
    $dbparts = parse_url($url);
  
    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');
  }
  else { // For Development
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "loginsystem";
  }
  $conn = mysqli_connect($hostname, $username, $password, $database);

  if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
  }
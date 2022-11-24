<?php

// session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname = "bd_restaurante2";

// Crear conexión ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
try{
   $conn = new PDO("mysql:host=$server;dbname=$dbname","$username","$password");
   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
   die('Imposible conectar a la BD');
}

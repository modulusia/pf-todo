<?php
$mysqli = new mysqli('localhost', 'root', '', 'pf_todo');
if($mysqli->connect_error) {
    echo 'Tidak dapat terkoneksi ke database: '.$mysqli->connect_error;
    die();
}
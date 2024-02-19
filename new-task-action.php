<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mysqli = new mysqli('localhost', 'root', '', 'pf_todo');
    if($mysqli->connect_error) {
        echo 'Tidak dapat terkoneksi ke database: '.$mysqli->connect_error;
        die();
    }
    
    $stmt = $mysqli->prepare('INSERT INTO tasks (task) VALUES (?)');
    $stmt->bind_param('s', $_POST['task']);
    $redirectStatus = ($stmt->execute()) ? "new-task-added" : "new-task-error";
    $stmt->close();
    header("Location: index.php?status=$redirectStatus");
    exit;
}

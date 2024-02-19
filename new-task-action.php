<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $mysqli->prepare('INSERT INTO tasks (task) VALUES (?)');
    $stmt->bind_param('s', $_POST['task']);
    $redirectStatus = ($stmt->execute()) ? "new-task-added" : "new-task-error";
    $stmt->close();
    header("Location: index.php?status=$redirectStatus");
    exit;
}

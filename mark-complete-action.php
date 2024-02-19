<?php
require_once 'db.php';

if (isset($_GET['id'])) {
    $stmt = $mysqli->prepare('UPDATE tasks SET isComplete = 1 WHERE id = ?');
    $stmt->bind_param('i', $_GET['id']);
    $redirectStatus = ($stmt->execute()) ? "task-complete-success" : "task-complete-error";
    $stmt->close();
    header("Location: index.php?status=$redirectStatus");
    exit;
}
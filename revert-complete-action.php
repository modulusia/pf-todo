<?php
require_once 'db.php';

if (isset($_GET['id'])) {
    $stmt = $mysqli->prepare('UPDATE tasks SET isComplete = 0 WHERE id = ?');
    $stmt->bind_param('i', $_GET['id']);
    $redirectStatus = ($stmt->execute()) ? "task-revert-success" : "task-revert-error";
    $stmt->close();
    header("Location: index.php?status=$redirectStatus");
    exit;
}
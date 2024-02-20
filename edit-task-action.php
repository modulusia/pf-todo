<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $mysqli->prepare('UPDATE tasks SET task = ? WHERE id = ?');
    $stmt->bind_param('si', $_POST['task'], $_POST['id']);
    $redirectStatus = ($stmt->execute()) ? "edit-task-success" : "edit-task-error";
    $stmt->close();
    header("Location: index.php?status=$redirectStatus");
    exit;
}

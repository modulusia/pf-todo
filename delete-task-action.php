<?php
require_once 'db.php';

if (isset($_GET['id'])) {
    $stmt = $mysqli->prepare('DELETE FROM tasks WHERE id = ?');
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $stmt->close();
}
header("Location: index.php");
exit;
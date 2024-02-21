<?php
require_once 'db.php';

$mysqli->query('DELETE FROM tasks WHERE isComplete = 1');

header("Location: index.php");
exit;
<?php
require_once 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$stmt = $mysqli->prepare('SELECT task FROM tasks WHERE id = ?');
$stmt->bind_param('i', $_GET['id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body class="inria-sans-regular">
    <main>
        <h1>Daftar Tugas</h1>
        <section>
            <form action="edit-task-action.php" method="post">
                <fieldset>
                    <legend>Ubah Tugas</legend>
                    <label for="original-task">Tugas saat ini:</label>
                    <br />
                    <textarea id="original-task" name="original-task" rows="4" disabled><?php echo $row['task'] ?></textarea>
                    <label for="task">Ubah menjadi:</label>
                    <br />
                    <textarea id="task" name="task" rows="4" required><?php echo $row['task'] ?></textarea>
                    <input type="Submit" value="Simpan">
                </fieldset>
            </form>
        </section>
    </main>
</body>
</html>
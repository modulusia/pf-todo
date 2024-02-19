<?php
$mysqli = new mysqli('localhost', 'root', '', 'pf_todo');
if($mysqli->connect_error) {
    echo 'Tidak dapat terkoneksi ke database: '.$mysqli->connect_error;
    die();
}

function createIncompleteTaskTable() {
    global $mysqli;
    $result = $mysqli->query('SELECT * FROM tasks WHERE isComplete = 0');
    generateTable($result, true);
}

function createCompleteTaskTable() {
    global $mysqli;
    $result = $mysqli->query('SELECT * FROM tasks WHERE isComplete = 1');
    generateTable($result, false);
}

function generateTable($data, $showCompleteButton) {
?>
            <table>
                <thead>
                    <tr>
                        <th class="task-column">Tugas</th>
                        <th class="action-column">Aksi</th>
                    </tr>
                </thead>
                <tbody>
<?php
    if ($data->num_rows > 0) {
        while($row = $data->fetch_assoc()) {
?>
                    <tr>
                        <td class="task-column"><?php echo $row['task'] ?></td>
                        <td class="action-column"><a class="button">✔️</a><a class="button">✏️</a><a class="button">🗑️</a></td>
                    </tr>
<?php
        }
    } else {
?>
                    <tr>
                        <td colspan="2" class="no-data">- Tidak ada data -</td>
                    </tr>
<?php
    }
?>
                </tbody>
            </table>
<?php
}
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
        <h1>To-do List</h1>
        <section>
            <h2>Ongoing Tasks</h2>
            <a class="button">New task</a>
<?php createIncompleteTaskTable() ?>
        </section>
        <section>
            <h2>Completed Tasks</h2>
<?php createCompleteTaskTable() ?>
            <a class="button">Clear completed tasks</a>
        </section>
    </main>
</body>
</html>
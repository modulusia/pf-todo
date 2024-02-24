<?php
require_once 'db.php';

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

function completeButton($id) {
    echo '<a class="button" href="mark-complete-action.php?id='.$id.'">✔️</a>';
}

function incompleteButton($id) {
    echo '<a class="button" href="revert-complete-action.php?id='.$id.'">🔄️</a>';
}

function deleteTaskButton($id) {
    echo '<a class="button" onclick="confirmDeleteTask('.$id.')">🗑️</a>';
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
                        <td class="action-column"><?php $showCompleteButton ? completeButton($row['id']) : incompleteButton($row['id']) ?><a class="button" href="edit-task.php?id=<?php echo $row['id'] ?>">✏️</a><?php deleteTaskButton($row['id']) ?></td>
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
        <h1>Daftar Tugas</h1>
        <section>
            <h2>Tugas</h2>
            <a class="button" href="new-task.php">Tugas baru</a>
<?php createIncompleteTaskTable() ?>
        </section>
        <section>
            <h2>Tugas Selesai</h2>
<?php createCompleteTaskTable() ?>
            <a class="button" onclick="confirmDeleteCompleteTasks()">Hapus semua tugas selesai</a>
        </section>
    </main>
    <script>
        function confirmDeleteTask(taskId) {
            if (confirm("Hapus tugas ini?")) {
                window.location.href = `delete-task-action.php?id=${taskId}`;
            }
        };
        function confirmDeleteCompleteTasks() {
            if (confirm("Hapus SEMUA tugas selesai?")) {
                window.location.href = `delete-all-completed-action.php`;
            }
        };
    </script>
</body>
</html>
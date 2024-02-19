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
            <form action="new-task-action.php" method="post">
                <fieldset>
                    <legend>Tugas Baru</legend>
                    <label for="task">Tugas:</label>
                    <br />
                    <textarea id="task" name="task" rows="4" required></textarea>
                    <input type="Submit" value="Simpan">
                </fieldset>
            </form>
        </section>
    </main>
</body>
</html>
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
            <button>➕ New task</button>
            <table>
                <thead>
                    <tr>
                        <th class="task-column">Task</th>
                        <th class="action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="task-column">Example task</td>
                        <td class="action-column"><button>✔️</button><button>✏️</button><button>🗑️</button></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section>
        <h2>Completed Tasks</h2>
        <button>✖️ Clear completed tasks</button>
            <table>
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Example task</td>
                        <td><button>🔁</button><button>✏️</button><button>🗑️</button></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
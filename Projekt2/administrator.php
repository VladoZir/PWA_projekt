<!DOCTYPE html>
<html lang="hr">
<head>
    <meta name="author" content="Vladimir Žirović">
    <meta name="description" content="Projektni zadatak">
    <meta name="keywords" content="Vijesti, Projekt">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracija</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #8d0606;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #8d0606;
            color: white;
        }
        .action-buttons a {
            padding: 5px 10px;
            margin: 0 5px;
            border-radius: 3px;
            text-decoration: none;
            color: white;
        }
        .edit {
            background-color: #4CAF50;
        }
        .delete {
            background-color: #f44336;
        }
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 3px solid #8d0606;
            border-radius: 5px;
        }
        label, input, textarea, select {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        input[type="text"], textarea, select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="checkbox"] {
            width: auto;
        }
        button {
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>

<script>
        function confirmDelete(event) {
            if (!confirm('Jeste li sigurni da želite obrisati ovu vijest?')) {
                event.preventDefault();
            }
        }
    </script>

</head>

<body>

<header>

        <div class="head_div"> 

            <div class="logo">
                <img src="img/logo.png">
                <p>Vijesti Velike Gorice</p>
            </div>

            <nav>
                <a href="index.php">Početna</a>
                <a href="kategorija.php?id=Kultura">Kultura</a>
                <a href="kategorija.php?id=Sport">Sport</a>
                <a href="login.php?id=unos">Nova vijest</a>
                <a href="login.php?id=administracija">Administracija</a>
            </nav>

        </div>
</header>

<main>

<?php
    include 'connect.php';

    $query = "SELECT * FROM vijesti";
    $result = mysqli_query($dbc, $query);

    echo '<table>';
    echo '<tr><th>ID</th><th>Naslov</th><th>Akcije</th></tr>';

    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['naslov'] . '</td>';
        echo '<td class="action-buttons">';
        echo '<a href="edit.php?id=' . $row['id'] . '" class="edit">Uredi</a>';
        echo '<a href="delete.php?id=' . $row['id'] . '" class="delete" onclick="confirmDelete(event)">Obriši</a>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';

    mysqli_close($dbc);
    ?>

</main>

<footer></footer>

</body>
</html>

<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = mysqli_prepare($dbc, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row['lozinka'];

            if (password_verify($password, $stored_password)) {
                if ($row['razina'] == 1) {
                    $_SESSION['username'] = $username;
                    if (isset($_GET['id']) && $_GET['id'] === 'administracija') {
                        header("Location: administrator.php");
                        exit();
                    }
                    if (isset($_GET['id']) && $_GET['id'] === 'unos') {
                        header("Location: unos.php");
                        exit();
                    }
                } else {
                    $error_message = "$username, nemate dovoljne privilegije za tu akciju.";
                }
            } else {
                $error_message = "Pogrešno korisničko ime ili lozinka.";
            }
        } else {
            $error_message = "Pogrešno korisničko ime ili lozinka.";
        }

        mysqli_stmt_close($stmt);
    } else {
        $error_message = "Greška prilikom pripreme upita: " . mysqli_error($dbc);
    }

    mysqli_close($dbc);
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta name="author" content="Vladimir Žirović">
    <meta name="description" content="Projektni zadatak">
    <meta name="keywords" content="Vijesti, Projekt">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            padding-right: 30px;
            border: 3px solid;
            border-color: #8d0606;
            border-radius: 5px;
            margin-bottom: 10%;
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
        input[type="file"] {
            padding: 3px;
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
        .submit-buttons {
            display: flex;
            justify-content: space-between;
        }
        .error {
            border: 1px solid red;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 5%;
        }
    </style>
</head>
<body>
<header>

<div class="head_div"> 

    <div class="logo">
        <img src="img/logo.png">
        <p>Vijesti Velike Gorice</p>
    </div>

    <div class="navigacija">
    <nav>
        <a href="index.php">Početna</a>
        <a href="kategorija.php?id=Kultura">Kultura</a>
        <a href="kategorija.php?id=Sport">Sport</a>
        <a href="login.php?id=unos">Nova vijest</a>
        <a href="login.php?id=administracija">Administracija</a>
    </nav>
    </div>

</div>
</header>

    <main>
    <h1 style="text-align: center;">Prijava</h1>
    <form method="post">
        <label for="username">Korisničko ime:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Lozinka:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Prijavi se</button>
        <?php if(isset($error_message)) echo "<p style='color:red'>$error_message</p>"; ?>
        <?php if(isset($error_message) && strpos($error_message, 'Pogrešno korisničko ime ili lozinka') !== false) : ?>
        <p>Novi korisnik?<a href="registracija.php">Registrirajte se ovdje</a>.</p>
        <?php endif; ?>
    </form>
    </main>
    <footer>
    </footer>
</body>
</html>

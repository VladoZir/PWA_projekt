<?php
include 'connect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checkQuery = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
    $checkStmt = mysqli_prepare($dbc, $checkQuery);
    mysqli_stmt_bind_param($checkStmt, 's', $_POST['korisnicko_ime']);
    mysqli_stmt_execute($checkStmt);
    mysqli_stmt_store_result($checkStmt);

    if (mysqli_stmt_num_rows($checkStmt) > 0) {
        $message = "Korisničko ime već postoji. Molimo odaberite drugo korisničko ime.";
    } else {
        $query = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($dbc, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ssssi', $ime, $prezime, $korisnicko_ime, $hashed_lozinka, $razina);

            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $korisnicko_ime = $_POST['korisnicko_ime'];
            $lozinka = $_POST['lozinka'];
            $hashed_lozinka = password_hash($lozinka, PASSWORD_DEFAULT);
            $razina = 0;

            if (mysqli_stmt_execute($stmt)) {
                $message = "Korisnik uspješno registriran.";
            } else {
                $message = "Greška prilikom registracije korisnika: " . mysqli_error($dbc);
            }

            mysqli_stmt_close($stmt);
        } else {
            $message = "Greška prilikom pripreme upita: " . mysqli_error($dbc);
        }
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
    <title>Registracija</title>
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
    <script>
    function validateForm() {
        var ime = document.getElementById("ime").value;
        var prezime = document.getElementById("prezime").value;
        var korisnicko_ime = document.getElementById("korisnicko_ime").value;
        var lozinka = document.getElementById("lozinka").value;

        var valid = true;

        document.getElementById("ime-error").innerText = "";
        document.getElementById("prezime-error").innerText = "";
        document.getElementById("korisnicko_ime-error").innerText = "";
        document.getElementById("lozinka-error").innerText = "";

        if (ime.length < 3) {
            document.getElementById("ime-error").innerText = "Ime ne smije biti kraće od 3 znaka.";
            document.getElementById("ime").classList.add("error");
            valid = false;
        } else {
            document.getElementById("ime").classList.remove("error");
        }

        if (prezime.length < 3) {
            document.getElementById("prezime-error").innerText = "Prezime ne smije biti kraće od 3 znaka.";
            document.getElementById("prezime").classList.add("error");
            valid = false;
        } else {
            document.getElementById("prezime").classList.remove("error");
        }

        if (korisnicko_ime.length < 3) {
            document.getElementById("korisnicko_ime-error").innerText = "Korisničko ime ne smije biti kraće od 3 znaka.";
            document.getElementById("korisnicko_ime").classList.add("error");
            valid = false;
        } else {
            document.getElementById("korisnicko_ime").classList.remove("error");
        }

        if (lozinka.length < 3) {
            document.getElementById("lozinka-error").innerText = "Lozinka ne smije biti kraća od 3 znaka.";
            document.getElementById("lozinka").classList.add("error");
            valid = false;
        } else {
            document.getElementById("lozinka").classList.remove("error");
        }

        if (!valid) {
            alert("Molimo ispravite označene greške.");
        }

        return valid;
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
    <h1 style="text-align: center;">Registracija</h1>
        <form method="post" action="" onsubmit="return validateForm()">
            <label for="ime">Ime:</label>
            <input type="text" id="ime" name="ime" required>
            <div class="error-message" id="ime-error"></div>

            <label for="prezime">Prezime:</label>
            <input type="text" id="prezime" name="prezime" required>
            <div class="error-message" id="prezime-error"></div>

            <label for="korisnicko_ime">Korisničko ime:</label>
            <input type="text" id="korisnicko_ime" name="korisnicko_ime" required>
            <div style="color: red;"><?php echo $message; ?></div>
            <div class="error-message" id="korisnicko_ime-error"></div>

            <label for="lozinka">Lozinka:</label>
            <input type="password" id="lozinka" name="lozinka" required>
            <div class="error-message" id="lozinka-error"></div>

            <button type="submit">Registriraj se</button>
        </form>
    </main>
    <footer>
    </footer>
</body>
</html>

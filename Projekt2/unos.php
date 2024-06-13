<?php
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $picture = $_FILES['pphoto']['name'];
        $title = $_POST['naslov'];
        $about = $_POST['kratki-sadrzaj'];
        $content = $_POST['sadrzaj'];
        $category = $_POST['kategorija'];
        $date = date('d.m.Y.');
        if (isset($_POST['arhiva'])) {
            $archive = 1;
        } else {
            $archive = 0;
        }
        $target_dir = 'img/' . $picture;
        move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

        $stmt = mysqli_prepare($dbc, "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES (?, ?, ?, ?, ?, ?, ?)");

        mysqli_stmt_bind_param($stmt, 'ssssssi', $date, $title, $about, $content, $picture, $category, $archive);

        if (mysqli_stmt_execute($stmt)) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
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
    <title>Unos vijesti</title>
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
            var naslov = document.getElementById("naslov");
            var kratkiSadrzaj = document.getElementById("kratki-sadrzaj");
            var sadrzaj = document.getElementById("sadrzaj");
            var slika = document.getElementById("slika");
            var kategorija = document.getElementById("kategorija");

            var valid = true;

            naslov.classList.remove("error");
            kratkiSadrzaj.classList.remove("error");
            sadrzaj.classList.remove("error");
            slika.classList.remove("error");
            kategorija.classList.remove("error");

            document.getElementById("naslov-error").innerText = "";
            document.getElementById("kratki-sadrzaj-error").innerText = "";
            document.getElementById("sadrzaj-error").innerText = "";
            document.getElementById("slika-error").innerText = "";
            document.getElementById("kategorija-error").innerText = "";

            if (naslov.value.trim().length < 5 || naslov.value.trim().length > 50) {
                naslov.classList.add("error");
                document.getElementById("naslov-error").innerText = "Naslov vijesti mora imati između 5 i 50 znakova.";
                valid = false;
            }

            if (kratkiSadrzaj.value.trim().length < 10 || kratkiSadrzaj.value.trim().length > 100) {
                kratkiSadrzaj.classList.add("error");
                document.getElementById("kratki-sadrzaj-error").innerText = "Kratki sadržaj vijesti mora imati između 10 i 100 znakova.";
                valid = false;
            }

            if (sadrzaj.value.trim().length === 0) {
                sadrzaj.classList.add("error");
                document.getElementById("sadrzaj-error").innerText = "Sadržaj vijesti ne smije biti prazan.";
                valid = false;
            }

            if (slika.value === "") {
                slika.classList.add("error");
                document.getElementById("slika-error").innerText = "Molimo odaberite sliku.";
                valid = false;
            }

            if (kategorija.value === "") {
                kategorija.classList.add("error");
                document.getElementById("kategorija-error").innerText = "Molimo odaberite kategoriju.";
                valid = false;
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
<form method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <label for="naslov">Naslov vijesti</label>
    <input type="text" id="naslov" name="naslov">
    <div class="error-message" id="naslov-error"></div>

    <label for="kratki-sadrzaj">Kratki sadržaj vijesti (do 100 znakova)</label>
    <textarea id="kratki-sadrzaj" name="kratki-sadrzaj" maxlength="100"></textarea>
    <div class="error-message" id="kratki-sadrzaj-error"></div>

    <label for="sadrzaj">Sadržaj vijesti</label>
    <textarea id="sadrzaj" name="sadrzaj"></textarea>
    <div class="error-message" id="sadrzaj-error"></div>

    <label for="slika">Slika</label>
    <input type="file" id="slika" name="pphoto">
    <div class="error-message" id="slika-error"></div>

    <label for="kategorija">Kategorija vijesti</label>
    <select id="kategorija" name="kategorija">
        <option value="Kultura">Kultura</option>
        <option value="Sport">Sport</option>
    </select>
    <div class="error-message" id="kategorija-error"></div>

    <label for="arhiva">Spremiti u arhivu:</label>
    <input type="checkbox" id="arhiva" name="arhiva">

    <div class="submit-buttons">
        <button type="reset">Poništi</button>
        <button type="submit">Prihvati</button>
    </div>
</form>

</main>

<footer></footer>

</body>
</html>

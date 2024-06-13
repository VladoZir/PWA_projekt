<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM vijesti WHERE id=?";
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['naslov'];
        $about = $_POST['kratki_sadrzaj'];
        $content = $_POST['sadrzaj'];
        $category = $_POST['kategorija'];
        $archive = isset($_POST['arhiva']) ? 1 : 0;
        
        if ($_FILES['pphoto']['name']) {
            $picture = $_FILES['pphoto']['name'];
            $target_dir = 'img/' . $picture;
            move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
        } else {
            $picture = $row['slika'];
        }

        $updateQuery = "UPDATE vijesti SET naslov=?, sazetak=?, tekst=?, slika=?, kategorija=?, arhiva=? WHERE id=?";
        $updateStmt = mysqli_prepare($dbc, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, 'sssssii', $title, $about, $content, $picture, $category, $archive, $id);
        mysqli_stmt_execute($updateStmt);

        header("Location: administrator.php");
        exit();
    }

    mysqli_stmt_close($stmt);
} else {
    header("Location: administrator.php");
    exit();
}

mysqli_close($dbc);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta name="author" content="Vladimir Žirović">
    <meta name="description" content="Projektni zadatak">
    <meta name="keywords" content="Vijesti, Projekt">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uredi vijest</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function validateForm() {
            var naslov = document.getElementById("naslov");
            var kratkiSadrzaj = document.getElementById("kratki_sadrzaj");
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

            if (kategorija.value === "") {
                kategorija.classList.add("error");
                document.getElementById("kategorija-error").innerText = "Molimo odaberite kategoriju.";
                valid = false;
            }

            if (valid) {
                return confirm("Jeste li sigurni da želite spremiti promjene?");
            } else {
                alert("Molimo ispravite označene greške.");
                return false;
            }

            return valid;
        }
    </script>
    <style>
        .error {
            border: 1px solid red;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 5%;
        }
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
    </style>
</head>
<body>
<header>
    <div class="head_div"> 
        <div class="logo">
            <img src="img/logo.png" alt="Logo">
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
    <h1>Uredi vijest</h1>
    <form method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="naslov">Naslov vijesti</label>
        <input type="text" id="naslov" name="naslov" value="<?php echo htmlspecialchars($row['naslov']); ?>">
        <div id="naslov-error" class="error-message"></div>

        <label for="kratki_sadrzaj">Kratki sadržaj vijesti (do 100 znakova)</label>
        <textarea id="kratki_sadrzaj" name="kratki_sadrzaj" maxlength="100"><?php echo htmlspecialchars($row['sazetak']); ?></textarea>
        <div id="kratki-sadrzaj-error" class="error-message"></div>

        <label for="sadrzaj">Sadržaj vijesti</label>
        <textarea id="sadrzaj" name="sadrzaj"><?php echo htmlspecialchars($row['tekst']); ?></textarea>
        <div id="sadrzaj-error" class="error-message"></div>

        <label for="kategorija">Kategorija vijesti</label>
        <select id="kategorija" name="kategorija">
            <option value="Kultura" <?php if ($row['kategorija'] == 'Kultura') echo 'selected'; ?>>Kultura</option>
            <option value="Sport" <?php if ($row['kategorija'] == 'Sport') echo 'selected'; ?>>Sport</option>
        </select>
        <div id="kategorija-error" class="error-message"></div>

        <label for="slika">Slika</label>
        <input type="file" id="slika" name="pphoto">
        <?php if ($row['slika']): ?>
            <img src="img/<?php echo htmlspecialchars($row['slika']); ?>" alt="Current Image" style="max-width: 100px;">
        <?php endif; ?>
        <div id="slika-error" class="error-message"></div>

        <label for="arhiva">Spremiti u arhivu:</label>
        <input type="checkbox" id="arhiva" name="arhiva" <?php if ($row['arhiva'] == 1) echo 'checked'; ?>>

        <div class="submit-buttons">
            <button type="reset">Poništi</button>
            <button type="submit">Spremi</button>
        </div>
    </form>
</main>
<footer></footer>
</body>
</html>

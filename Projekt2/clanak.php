<!DOCTYPE html>
<html lang="hr">
<head>
    <meta name="author" content="Vladimir Žirović">
    <meta name="description" content="Projektni zadatak">
    <meta name="keywords" content="Vijesti, Projekt">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vijesti Velike Gorice</title>
    <link rel="stylesheet" href="styles.css">
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


    <?php
        include 'connect.php';
        define('UPLPATH', 'img/');

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            $query = "SELECT * FROM vijesti WHERE id = '$id'";
            $result = mysqli_query($dbc, $query);
            
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
            } else {
                echo "<p>Article not found.</p>";
                exit;
            }
        } else {
            echo "<p>No article ID provided.</p>";
            exit;
        }
    ?>

    <main>
        <section role="main">
            <div class="row">
                <h2 class="category"><?php
                echo "<span>".$row['kategorija']."</span>";
                ?></h2>
                <h1 class="title"><?php
                echo $row['naslov'];
                ?></h1>
                <p>OBJAVLJENO: <?php
                echo "<span>".$row['datum']."</span>";
                ?></p>
            </div>
            <section class="slika">
                <?php
                    echo '<img src="' . UPLPATH . $row['slika'] . '">';
                ?>
            </section>
            <section class="about">
                <p>
                <?php
                    echo "<i>".$row['sazetak']."</i>";
                ?>
                </p>
            </section>
            <section class="sadrzaj">
                <p>
                <?php
                echo $row['tekst'];
                ?>
                </p>
            </section>
        </section>
    </main>
    <footer></footer>
</body>
</html>

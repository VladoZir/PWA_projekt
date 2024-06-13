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

            <div class="navigacija">
            <nav>
                <a href="index.php">Početna</a>
                <a href="kategorija.php?id=Kultura">Kultura</a>
                <a href="kategorija.php?id=Sport">Sport</a>
                <a href="login.php?id=unos">Nova vijest</a>
                <a href="login.php?id=administracija">Administracija</a>
                <a href="registracija.php">Registracija</a>
            </nav>
            </div>

        </div>
    </header>


    <?php
        include 'connect.php';
        define('UPLPATH', 'img/');
    ?>

    <main>
        <section>
            <div class="naslov"><a href="kategorija.php?id=Kultura"><h2>Kultura</h2></a></div>
            <div class="articles">
            <?php
                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='kultura' LIMIT 3";
                $result = mysqli_query($dbc, $query);
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                echo '<article>';
                echo'<div class="article">';
                echo '<div class="sport_img">';
                echo '<img src="' . UPLPATH . $row['slika'] . '"';
                echo '</div>';
                echo '<div class="media_body">';
                echo '<h4 class="title">';
                echo '<a href="clanak.php?id='.$row['id'].'">';
                echo $row['naslov'];
                echo '</a></h4>';
                echo '<p class="date">' . $row['datum'] . '</p>';
                echo '</div></div>';
                echo '</article>';


                }
            ?> 
            </div>
        </section>
        <section>
            <div class="naslov"><a href="kategorija.php?id=Sport"><h2>Sport</h2></a></div>
            <div class="articles">
            <?php
                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport' LIMIT 3";
                $result = mysqli_query($dbc, $query);
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                echo '<article>';
                echo'<div class="article">';
                echo '<div class="sport_img">';
                echo '<img src="' . UPLPATH . $row['slika'] . '"';
                echo '</div>';
                echo '<div class="media_body">';
                echo '<h4 class="title">';
                echo '<a href="clanak.php?id='.$row['id'].'">';
                echo $row['naslov'];
                echo '</a></h4>';
                echo '<p class="date">' . $row['datum'] . '</p>';
                echo '</div></div>';
                echo '</article>';
                }
            ?> 
            </div>
        </section>
    </main>
    <footer></footer>
</body>
</html>

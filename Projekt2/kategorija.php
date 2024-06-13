<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            if (isset($_GET['id'])) {
                $category = $_GET['id'];
                echo htmlspecialchars($category);
            }
        ?>
    </title>
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
    ?>

    <main>
        <section>
            <?php
            if (isset($_GET['id'])) {
                $category = $_GET['id'];
                echo '<div class="naslov"><h2>'.htmlspecialchars($category).'</h2></div>';
                echo '<div class="articles">';

                $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='$category'";
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
            }
            ?> 
            </div>
        </section>
    </main>
    <footer></footer>
</body>
</html>

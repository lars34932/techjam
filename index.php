<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>tweakers</title>
</head>
<body>
    <header class="header">
        <section class="header__section1">
            <img class="header__logo" src="img/logo.webp" alt="logo">
            <button class="header__button">Nieuws</button>
            <button class="header__button">Reviews</button>
            <button class="header__button">Prijsen</button>
            <button class="header__button">Vraag en aanbod</button>
            <button class="header__button">Forum</button>
        </section>
        <section class="header__section2">
            <input class="header__search" type="search" placeholder="Zoek in de site">
        </section>
        <a href=""></a>
    </header>
    <main>
    <?php
    include_once "connect.php";

    $conn = db_connect();

    $sql = "SELECT * FROM nieuws";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            echo '<article class="news__article">';
            echo '<img src="' . $row['img'] . '" alt="" class="article__img">';
            echo '<a class="article__title" href="' . $row['link'] . '">' . $row['title'] . '</a>';
            echo '<p class="article__description">' . $row['description'] . '</p>';
            echo '<button class="article__button" onclick="window.location.href = \'http://localhost/techjam/techjam/' . $row['link'] . '\';">Ga naar artikel</button>';
            echo '</article>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
    </main>
    <footer>
        <p>Contact</p>
        <p>Adverteren</p>
        <p>Over tweakers</p>
        <p>Privacy</p>
        <p>Cookies</p>
        <p>Algeneme voorwaarden</p>
    </footer>
</body>
</html>


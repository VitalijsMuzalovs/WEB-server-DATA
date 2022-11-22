<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Ievāds PHP</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="flex-item">
            <ul>
                <a onclick="showArticle(event)"><img id="uzdevums1" src="images/one.png"></a>
                <a onclick="showArticle(event)"><img id="uzdevums2" src="images/two.png"></a>
                <a onclick="showArticle(event)"><img id="uzdevums3" src="images/three.png"></a>
                <a onclick="showArticle(event)"><img id="uzdevums4" src="images/four.png"></a>
                <a onclick="showArticle(event)"><img id="uzdevums5" src="images/five.png"></a>
            </ul>

            <article id="article1">
                <?php
                    echo "<h1>Title 1 PHP</h1><hr>";
                    echo "Teksta izvade ar ECHO.<br>";
                    print "Teksta izvade ar PRINT.<br>";
                    $zinojums = "Teksts, kurš ievietots mainīgahā ZIŅOJUMS";
                ?>

                <p><?php echo $zinojums; ?></p>
                
                <?php 
                    $userName = "Vital";
                    $birthYear = 1984;
                    $thisYear = 2022;
                    $age = $thisYear - $birthYear;

                    echo "{$userName}, you are {$age} years old!";
                ?>
            </article>
            <article id="article2"><h1>Title 2</h1></article>
            <article id="article3"><h1>Title 3</h1></article>
            <article id="article4"><h1>Title 4</h1></article>
            <article id="article5"><h1>Title 5</h1></article>
        </div>
    </div>

    <footer>Izstrādāja Vitālijs Muzaļovs &copy; 2022</footer>
</body>
</html>
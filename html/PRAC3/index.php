<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php
    include("../../fragmentos/header.html");

    ?>

    <h1>EJERCICIO TEMA 2 FECHAS</h1>
    <div class="grid-container">

        <div class="item1">
            <a href="php/1.php " style="color: yellow">EJERCICIO 1 </a>
        </div>
        <div class="item2">
            <a href="php/2.php?variable=6" style="color: yellow">EJERCICIO 2</a>
        </div>
        <div class="item3">
            <a href="php/3.php?ano=1999&mes=6&dia=10" style="color: yellow">EJERCICIO 3</a>
        </div>
        <div class="item4">
            <a href="php/4.php?ano1=1999&mes1=6&dia1=10&ano2=1989&mes2=6&dia2=10" style="color: yellow">EJERCICIO 4</a>
        </div>

    </div>






    <?php
    include("../../fragmentos/footer.html");
    ?>
</body>

</html>
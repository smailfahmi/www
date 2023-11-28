<?php

$liga =
    array(
        "Zamora" =>  array(
            "Salamanca" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 1
            )
        ),
        "Salamanca" =>  array(
            "Zamora" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 2, "Penalti" => 1
            )
        ),
        "Avila" =>  array(
            "Zamora" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 2
            ),
            "Salamanca" => array(
                "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 3, "Penalti" => 0
            ),
            "Valladolid" => array(
                "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 0, "Penalti" => 1
            )
        ),
        "Valladolid" =>  array(
            "Zamora" => array(
                "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
            ),
            "Salamanca" => array(
                "Resultado" => "3-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
            ),
            "Avila" => array(
                "Resultado" => "1-1", "Roja" => 1, "Amarilla" => 1, "Penalti" => 2
            )
        ),
    );

?>

<!-- <table border="1">
    <tr>
        <th></th>
        <?php foreach (array_keys($liga) as $equipo) : ?>
            <th><?= $equipo ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($liga as $equipo1 => $partidos) : ?>
        <tr>
            <th><?= $equipo1 ?></th>
            <?php foreach ($liga as $equipo2 => $partido) : ?>
                <td>
                    Resultado: <?= $partidos[$equipo2]["Resultado"] ?><br>
                    Roja: <?= $partidos[$equipo2]["Roja"] ?><br>
                    Amarilla: <?= $partidos[$equipo2]["Amarilla"] ?><br>
                    Penalti: <?= $partidos[$equipo2]["Penalti"] ?><br>
                </td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table> -->


<table border="1">
    <tr>
        <th></th>
        <?php foreach (array_keys($liga) as $equipo) : ?>
            <th><?= $equipo ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($liga as $equipo1 => $partidos) : ?>
        <tr>
            <th><?= $equipo1 ?></th>
            <?php foreach ($liga as $equipo2 => $partido) : ?>
                <td>
                    <?php if ($equipo1 != $equipo2) : ?>
                        Resultado: <?= $partidos[$equipo2]["Resultado"] ?><br>
                        Roja: <?= $partidos[$equipo2]["Roja"] ?><br>
                        Amarilla: <?= $partidos[$equipo2]["Amarilla"] ?><br>
                        Penalti: <?= $partidos[$equipo2]["Penalti"] ?><br>
                    <?php endif; ?>
                </td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>

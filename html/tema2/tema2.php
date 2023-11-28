<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <style>
        a {
            text-decoration: none;
            color: rgb(0, 179, 255);
        }

        .tema1 {
            text-align: center;
        }

        main {
            padding: 20px;
            text-align: center;
        }

        .tabla {
            display: flex;
            width: 700x;
            min-width: 660px;
            background-color: rgb(76, 77, 87);
            border-radius: 5%;
            align-items: center;
            justify-content: center;
        }

        .subtabla {
            padding: 0px;
            margin: 20px;
            display: flex;
            border: solid rgb(0, 179, 255) 3px;
            /* Añade este estilo para mejorar la apariencia */
        }

        .cabecera,
        .fila {
            display: flex;
            margin: 0px;
            padding: 0px;
            width: 660px;
            flex-grow: 1;
            background-color: rgb(145, 149, 172);
            justify-content: space-around;
        }

        th,
        td {
            display: flex;
            width: 20%;
            border: solid rgb(76, 77, 87) 2px;
            text-align: center;
            align-items: center;
            justify-content: center;

        }

        td {
            padding: 10px;
        }

        .filaUltima {
            display: flex;
            width: 100%;
            box-sizing: border-box;
            border: solid rgb(76, 77, 87) 2px;
            text-align: center;
            align-items: center;
            justify-content: center;
            background-color: rgb(145, 149, 172);
        }

        .botonvolver {
            display: flex;
            justify-content: space-around;
            width: 100%;
            margin: 0px;
            padding: 0px;

        }

        .botonvolver a {
            display: flex;
            width: 100%;
            height: 40px;
            margin: 0px;
            padding: auto;
            text-align: center;
            flex-grow: 1;
            justify-content: center;
            align-items: center;
        }
    </style>

</head>

<body>
    <?php
    include '../fragmentos/header.html';
    ?>
    <main>

        <h1>TEMA 2 </h1>
        <div class="tabla">
            <table class="subtabla">
                <tr class="cabecera">
                    <th valign="top">
                        <a href="?C=N;O=D">TIPO</a>
                    </th>
                    <th>
                        <a href="?C=N;O=D">NOMBRE</a>
                    </th>
                    <th>
                        <a href="?C=M;O=A">ULTIMA CAMBIO</a>
                    </th>
                    <th>
                        <a href="?C=S;O=A">TAMAÑO</a>
                    </th>
                    <th>
                        <a href="?C=D;O=A">DESCRIPCION</a>
                    </th>
                </tr>

                <tr class="fila">
                    <td valign="top">
                        <img src="/icons/unknown.gif" alt="[   ]">
                    </td>
                    <td>
                        <a href="0310_1640.php">0310_1640.php</a>
                    </td>
                    <td align="right">2023-10-08 18:42 </td>
                    <td align="right">1.0K</td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="fila">
                    <td valign="top">
                        <img src="/icons/folder.gif" alt="[DIR]">
                    </td>
                    <td>
                        <a href="ejerciciotm2_1/">ejerciciotm2_1/</a>
                    </td>
                    <td align="right">2023-10-08 18:42 </td>
                    <td align="right">- </td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="fila">
                    <td valign="top">
                        <img src="/icons/folder.gif" alt="[DIR]">
                    </td>
                    <td>
                        <a href="ejerciciotm2_2/">ejerciciotm2_2/</a>
                    </td>
                    <td align="right">2023-10-15 14:47 </td>
                    <td align="right">- </td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="fila">
                    <td valign="top">
                        <img src="/icons/unknown.gif" alt="[   ]">
                    </td>
                    <td>
                        <a href="fecha.php">fecha.php</a>
                    </td>
                    <td align="right">2023-10-08 18:42 </td>
                    <td align="right">1.0K</td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="fila">
                    <td valign="top">
                        <img src="/icons/unknown.gif" alt="[   ]">
                    </td>
                    <td>
                        <a href="mipagina.php">mipagina.php</a>
                    </td>
                    <td align="right">2023-10-08 18:42 </td>
                    <td align="right">77 </td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="fila">
                    <td valign="top">
                        <img src="/icons/unknown.gif" alt="[   ]">
                    </td>
                    <td>
                        <a href="tema2basico.php">tema2basico.php</a>
                    </td>
                    <td align="right">2023-11-18 20:41 </td>
                    <td align="right">2.8K</td>
                    <td>&nbsp;</td>
                </tr>
                <tr class="filaUltima">
                    <td class="botonvolver" href="/">
                        <a href="/"><img src="/icons/back.gif" alt="[PARENTDIR]"></a>
                        <a href="/">VOLVER</a>
                        <a href="/"><img src="/icons/back.gif" alt="[PARENTDIR]"></a>
                    </td>

                </tr>

            </table>
        </div>
        <address>Apache/2.4.52 (Ubuntu) Server at 192.168.0.205 Port 80</address>
    </main>

    <?php
    include '../fragmentos/footer.html';
    ?>

</body>
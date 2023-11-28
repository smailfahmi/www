<? include('./verifica.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?
    $errores = array();
    if (enviado() && validacion($errores)) { //aqui añado los actores
        rellenapelis();
    } else {
    ?>
        <form action="" method="get">
            <p><label for="">ID <input type="text" name="id" id="" value="<?php
                                                                            escribirNombre('id');
                                                                            ?>"></label><? escribirErrores($errores, 'id'); ?></p>
            <p><label for="">TITULO <input type="text" name="titulo" id="" value="<?php
                                                                                    escribirNombre('titulo');
                                                                                    ?>"></label><? escribirErrores($errores, 'titulo'); ?></p>
            <p><label for="">DIRECTOR <input type="text" name="director" id="" value="<?php
                                                                                        escribirNombre('director');
                                                                                        ?>"></label><? escribirErrores($errores, 'director'); ?></p>
            <p><label for="">AÑO LANZAMIENTO <input type="text" name="ano" id="" value="<?php
                                                                                        escribirNombre('ano');
                                                                                        ?>"></label><? escribirErrores($errores, 'ano'); ?></p>
            <p>
                <?php
                $generos = ['accion', 'comedia', 'drama', 'terror', 'ciencia_ficcion', 'romance', 'animacion', 'documental', 'aventura'];
                for ($i = 0; $i < count($generos); $i++) {
                    $nombre = "opcion" . $i;
                    $guardar = recuerdaChek('opcionCh', $nombre);
                    echo '<label for=""><input ' . $guardar . '  type="radio" name="opcionCh[]" id="' . $nombre . '"  value="' . $nombre . '" >' . $generos[$i] . '</label>';
                    echo ' <br>';
                }
                ?>
            </p>
            <p><label for="">ACTORES <input type="text" name="actores" id="" value="<?php
                                                                                    escribirNombre('actores');
                                                                                    ?>"></label><? escribirErrores($errores, 'actores'); ?></p>
            <p><label for="">DURACION <input type="text" name="duracion" id="" value="<?php
                                                                                        escribirNombre('duracion');
                                                                                        ?>"></label><? escribirErrores($errores, 'duracion'); ?></p>
            <p>SINOPSIS
            <p><label for="">SINOPSIS <input style="height:100px;width: 150px;" type="text" name="comentario" id="" value="<?php
                                                                                                                            escribirNombre('comentario');
                                                                                                                            ?>"></textarea><? escribirErrores($errores, 'comentario'); ?></p>
            </p>
            <!-- //he usado un input en vez  de text area porque no se muy ien como funciona el otro  -->
            <p> <input type="submit" value="Enviar" name="Enviar"></p>
        </form>
    <?
    } ?>
</body>

</html>
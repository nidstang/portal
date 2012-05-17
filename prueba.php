<?php
    //VARIABLES 
    $rutaImagick = "/ruta/a/mi/imagick6.7/bin"; 
    $imagen = $_GET["i"]; 
    $ancho = 0; 
    $alto = 0; 
    $_GET["an"] = 100;
    //$_GET["al"] = 200;
    $color = white; 
    if (isset($_GET["an"])) {$ancho = $_GET["an"];} 
    if (isset($_GET["al"])) {$alto = $_GET["al"];} 
    //preparamos nombre de la imagen 
    $extension = pathinfo($imagen, PATHINFO_EXTENSION); //separamos extension (útil si más adelante queremos conservar extensión original del archivo 
    $nombreBase = basename($imagen, '.'.$extension); //separamos nombre base 
    $nombreImagen = "RE." . "$nombreBase$ancho" . "ANx" . "$alto" . "AL" . ".jpg"; //todas las imágenes se convierten a jpg 
    if (file_exists($nombreImagen)) //Si existe no convertimos, mostramos directamente 
    { 
        Header("Content-Type: image/jpeg"); 
        readfile($nombreImagen); 
    } 
    else 
    { 
        if ($ancho!=0 && $alto==0) //Si no tiene alto o es 0 es que la imagen se reduce a proporción 
        { 
            $conversion = "$rutaImagick/convert -quality 90% $imagen"; 
            exec("$rutaImagick/convert $conversion -scale $ancho $nombreImagen"); 
            Header("Content-Type: image/jpeg"); // se envia la cabecera... 
            readfile($nombreImagen); 
        } 
        else if($ancho==0 && $alto!=0) //Si sólo tiene definido el alto 
        { 
            $medida = "x" . $alto; 
            $conversion = "$rutaImagick/convert -quality 90% $imagen"; 
            exec("$rutaImagick/convert $conversion -scale $medida $nombreImagen"); 
            Header("Content-Type: image/jpeg"); // se envia la cabecera... 
            readfile($nombreImagen); 
        } 
        else //ninguno de los 2 es 0. Se pone la imagen al tamaño exacto deseado rellenando espacios vacíos con el color seleccionado 
        { 
            $medida = $ancho . "x" . $alto; 
            //exec("convert $imagen -resize $medida -background $color -compose Copy -gravity center -extent $medida $nombreImagen"); 
            //CODIGO FUNCIONANDO BIEN POR CONSOLA:  convert tal.jpg -resize 300x50 -background white -gravity center -extent 300x50 output.jpg         
            $conversion = "$rutaImagick/convert -quality 90% $imagen"; 
            $conversion = "$rutaImagick/convert $conversion -scale $ancho $nombreImagen"; //reducimos antes a escala 
            exec("$rutaImagick/convert $conversion -scale $medida -background $color -gravity center -extent $medida $nombreImagen"); 
            Header("Content-Type: image/jpeg"); // se envia la cabecera... 
            readfile("$nombreImagen"); 
        } 
    } 
?>
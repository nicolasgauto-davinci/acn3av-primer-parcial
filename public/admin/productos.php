<?php

include_once 'categorias.php';
include_once 'marcas.php';
include_once 'comentarios.php';

$productos = array(
    array(
        "id" => 1,
        "nombre" => "Perfume Idôle Edp 100 Ml Lancôme",
        "marca" => $listaMarcas[0], // "Lancôme"
        "precio" => 19999,
        "imagen" => "./assets/img/producto1.jpg",
        "ranking" => 1,
        "destacado" => true,
        "descripcion" => "Perfume Idôle Edp 100 Ml Lancôme",
        "modelo" => "Idôle",
        "comentarios" => $listaComentarios[1], // Comentarios del producto 1
        "activo" => true,
        "categorias" => array(
            "madre" => "Perfumería",
            "hija" => $categorias["Perfumería"][1] // "Fragancias Importadas"
        )
    ),
    array(
        "id" => 2,
        "nombre" => "Perfume Natura Aura Alba",
        "marca" => $listaMarcas[1], // "Natura"
        "precio" => 19999,
        "imagen" => "./assets/img/producto2.jpg",
        "ranking" => 2,
        "destacado" => true,
        "descripcion" => "Perfume Natura Aura Alba",
        "modelo" => "Aura Alba",
        "comentarios" => $listaComentarios[2], // Comentarios del producto 2
        "activo" => true,
        "categorias" => array(
            "madre" => "Perfumería",
            "hija" => $categorias["Perfumería"][1] // "Fragancias Importadas"
        )
    ),
    array(
        "id" => 3,
        "nombre" => "Depiladora Ipl Philips Lumea Prestige Bri947",
        "marca" => $listaMarcas[2], // "Philips"
        "precio" => 19999,
        "imagen" => "./assets/img/producto3.jpg",
        "ranking" => 3,
        "destacado" => true,
        "descripcion" => "Depiladora Ipl Philips Lumea Prestige Bri947",
        "modelo" => "Lumea Prestige",
        "comentarios" => $listaComentarios[3], // Comentarios del producto 3
        "activo" => true,
        "categorias" => array(
            "madre" => "Cuidado Personal",
            "hija" => $categorias["Cuidado Personal"][0] // "Capilar"
        )
    ),
    array(
        "id" => 4,
        "nombre" => "Perfume Her Secret Pink Absolu Eau De Parfum Antonio Banderas 80ml",
        "marca" => $listaMarcas[3], // "Antonio Banderas"
        "precio" => 19999,
        "imagen" => "./assets/img/producto4.jpg",
        "ranking" => 4,
        "destacado" => true,
        "descripcion" => "Perfume Her Secret Pink Absolu Eau De Parfum Antonio Banderas 80ml",
        "modelo" => "Her Secret",
        "comentarios" => $listaComentarios[4], // Comentarios del producto 4
        "activo" => true,
        "categorias" => array(
            "madre" => "Perfumería",
            "hija" => $categorias["Perfumería"][0] // "Fragancias Nacionales"
        )
    ),
    array(
        "id" => 5,
        "nombre" => "Modelador Multifunción Mantra Air Nova Nude",
        "marca" => $listaMarcas[4], // "Mantra Beauty"
        "precio" => 19999,
        "imagen" => "./assets/img/producto5.jpg",
        "ranking" => 5,
        "destacado" => true,
        "descripcion" => "Modelador Multifunción Mantra Air Nova Nude",
        "modelo" => "Air Nova",
        "comentarios" => $listaComentarios[5], // Comentarios del producto 5
        "activo" => true,
        "categorias" => array(
            "madre" => "Cuidado Personal",
            "hija" => $categorias["Cuidado Personal"][0] // "Capilar"
        )
    ),
    array(
        "id" => 6,
        "nombre" => "Set Renergie Triple Serum Lancôme 50 Ml",
        "marca" => $listaMarcas[0], // "Lancôme"
        "precio" => 19999,
        "imagen" => "./assets/img/producto6.jpg",
        "ranking" => null, // El producto 6 no tenía ranking en tu código original
        "destacado" => true,
        "descripcion" => "Set Renergie Triple Serum Lancôme 50 Ml",
        "modelo" => "Renergie",
        "comentarios" => $listaComentarios[6], // Comentarios del producto 6
        "activo" => true,
        "categorias" => array(
            "madre" => "Cuidado Personal",
            "hija" => $categorias["Cuidado Personal"][1] // "Skin Care"
        )
    )
);

?>
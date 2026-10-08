<?php
declare(strict_types=1);

//Marcas
$listaMarcas = array(
    array(
        "id" => 1,
        "nombre" => "Lancôme",
        "activo" => true
    ),
    array(
        "id" => 2,
        "nombre" => "Natura",
        "activo" => true
    ),
    array(
        "id" => 3,
        "nombre" => "Philips",
        "activo" => true
    ),
    array(
        "id" => 4,
        "nombre" => "Antonio Banderas",
        "activo" => true
    ),
    array(
        "id" => 5,
        "nombre" => "Mantra Beauty",
        "activo" => true
    )
);

//Categorias
$listaCategorias = array(
    "Farmacia" => array("Venta Libre", "Recetados"),
    "Perfumería" => array("Fragancias Nacionales", "Fragancias Importadas"),
    "Cuidado Personal" => array("Capilar", "Skin Care")
);

//Comentarios
$listaComentarios = array(
    1 => array(
        array(
            "email" => "email1@example.com",
            "comentario" => "Me encanta este perfume, tiene un aroma muy agradable.",
            "valoracion" => 5,
            "fecha" => "2/10/2026",
            "activo" => true,
            "aprobado" => true
        ),
        array(
            "email" => "email2@example.com",
            "comentario" => "Es un perfume muy refrescante y duradero.",
            "valoracion" => 4,
            "fecha" => "2/10/2026",
            "activo" => false,
            "aprobado" => true
        )
    ),
    2 => array(
        array(
            "email" => "email3@example.com",
            "comentario" => "Excelente calidad y aroma.",
            "valoracion" => 5,
            "fecha" => "2/10/2026",
            "activo" => true,
            "aprobado" => true
        )
    ),
    3 => array(
        array(
            "email" => "email4@example.com",
            "comentario" => "Muy satisfactorio, recomiendo.",
            "valoracion" => 4,
            "fecha" => "2/10/2026",
            "activo" => true,
            "aprobado" => true
        )
    ),
    4 => array(
        array(
            "email" => "email5@example.com",
            "comentario" => "Un perfume increíble con un aroma duradero.",
            "valoracion" => 5,
            "fecha" => "2/10/2026",
            "activo" => true,
            "aprobado" => true
        )
    ),
    5 => array(
        array(
            "email" => "email6@example.com",
            "comentario" => "Perfecto para ocasiones especiales.",
            "valoracion" => 5,
            "fecha" => "2/10/2026",
            "activo" => true,
            "aprobado" => true
        )
    ),
    6 => array(
        array(
            "email" => "email7@example.com",
            "comentario" => "Un perfume maravilloso con un aroma intenso.",
            "valoracion" => 5,
            "fecha" => "2/10/2026",
            "activo" => true,
            "aprobado" => true
        ),
        array(
            "email" => "email8@example.com",
            "comentario" => "Un perfume horrible con un aroma a bazofia.",
            "valoracion" => 1,
            "fecha" => "2/10/2026",
            "activo" => false,
            "aprobado" => false
        )
    )
);

//Funcion para calcular el ranking basado en los comentarios de cada producto
function calcularRanking($comentariosProducto){
    $cantidad = count($comentariosProducto);
    
    if ($cantidad === 0) {
        return null; // No hay comentarios, no se puede calcular ranking
    }

    $sumaValoraciones = 0;
    foreach ($comentariosProducto as $comentario) {
        $sumaValoraciones += $comentario['valoracion'];
    }
    return round($sumaValoraciones / $cantidad, 1);
}

//Productos
$listaProductos = array(
    array(
        "id" => 1,
        "nombre" => "Perfume Idôle Edp 100 Ml Lancôme",
        "marca" => $listaMarcas[0]['nombre'], // "Lancôme"
        "precio" => 19999,
        "imagen" => "./assets/img/producto1.jpg",
        "imagenAdmin" => "../assets/img/producto1.jpg",
        "ranking" => calcularRanking($listaComentarios[1]), // Calcula el ranking basado en los comentarios del producto 1
        "destacado" => true,
        "descripcion" => "Perfume Idôle Edp 100 Ml Lancôme",
        "modelo" => "Idôle",
        "comentarios" => $listaComentarios[1], // Comentarios del producto 1
        "activo" => true,
        "categorias" => array(
            "madre" => "Perfumería",
            "hija" => $listaCategorias["Perfumería"][1] // "Fragancias Importadas"
        )
    ),
    array(
        "id" => 2,
        "nombre" => "Perfume Natura Aura Alba",
        "marca" => $listaMarcas[1]['nombre'], // "Natura"
        "precio" => 19999,
        "imagen" => "./assets/img/producto2.jpg",
        "imagenAdmin" => "../assets/img/producto2.jpg",
        "ranking" => calcularRanking($listaComentarios[2]), // Calcula el ranking basado en los comentarios del producto 2
        "destacado" => true,
        "descripcion" => "Perfume Natura Aura Alba",
        "modelo" => "Aura Alba",
        "comentarios" => $listaComentarios[2], // Comentarios del producto 2
        "activo" => true,
        "categorias" => array(
            "madre" => "Perfumería",
            "hija" => $listaCategorias["Perfumería"][1] // "Fragancias Importadas"
        )
    ),
    array(
        "id" => 3,
        "nombre" => "Depiladora Ipl Philips Lumea Prestige Bri947",
        "marca" => $listaMarcas[2]['nombre'], // "Philips"
        "precio" => 19999,
        "imagen" => "./assets/img/producto3.jpg",
        "imagenAdmin" => "../assets/img/producto3.jpg",
        "ranking" => calcularRanking($listaComentarios[3]), // Calcula el ranking basado en los comentarios del producto 3
        "destacado" => true,
        "descripcion" => "Depiladora Ipl Philips Lumea Prestige Bri947",
        "modelo" => "Lumea Prestige",
        "comentarios" => $listaComentarios[3], // Comentarios del producto 3
        "activo" => true,
        "categorias" => array(
            "madre" => "Cuidado Personal",
            "hija" => $listaCategorias["Cuidado Personal"][0] // "Capilar"
        )
    ),
    array(
        "id" => 4,
        "nombre" => "Perfume Her Secret Pink Absolu Eau De Parfum Antonio Banderas 80ml",
        "marca" => $listaMarcas[3]['nombre'], // "Antonio Banderas"
        "precio" => 19999,
        "imagen" => "./assets/img/producto4.jpg",
        "imagenAdmin" => "../assets/img/producto4.jpg",
        "ranking" => calcularRanking($listaComentarios[4]), // Calcula el ranking basado en los comentarios del producto 4
        "destacado" => true,
        "descripcion" => "Perfume Her Secret Pink Absolu Eau De Parfum Antonio Banderas 80ml",
        "modelo" => "Her Secret",
        "comentarios" => $listaComentarios[4], // Comentarios del producto 4
        "activo" => true,
        "categorias" => array(
            "madre" => "Perfumería",
            "hija" => $listaCategorias["Perfumería"][0] // "Fragancias Nacionales"
        )
    ),
    array(
        "id" => 5,
        "nombre" => "Modelador Multifunción Mantra Air Nova Nude",
        "marca" => $listaMarcas[4]['nombre'], // "Mantra Beauty"
        "precio" => 19999,
        "imagen" => "./assets/img/producto5.jpg",
        "imagenAdmin" => "../assets/img/producto5.jpg",
        "ranking" => calcularRanking($listaComentarios[5]), // Calcula el ranking basado en los comentarios del producto 5
        "destacado" => true,
        "descripcion" => "Modelador Multifunción Mantra Air Nova Nude",
        "modelo" => "Air Nova",
        "comentarios" => $listaComentarios[5], // Comentarios del producto 5
        "activo" => true,
        "categorias" => array(
            "madre" => "Cuidado Personal",
            "hija" => $listaCategorias["Cuidado Personal"][0] // "Capilar"
        )
    ),
    array(
        "id" => 6,
        "nombre" => "Set Renergie Triple Serum Lancôme 50 Ml",
        "marca" => $listaMarcas[0]['nombre'], // "Lancôme"
        "precio" => 19999,
        "imagen" => "./assets/img/producto6.jpg",
        "imagenAdmin" => "../assets/img/producto6.jpg",
        "ranking" => calcularRanking($listaComentarios[6]), // Calcula el ranking basado en los comentarios del producto 6
        "destacado" => true,
        "descripcion" => "Set Renergie Triple Serum Lancôme 50 Ml",
        "modelo" => "Renergie",
        "comentarios" => $listaComentarios[6], // Comentarios del producto 6
        "activo" => true,
        "categorias" => array(
            "madre" => "Cuidado Personal",
            "hija" => $listaCategorias["Cuidado Personal"][1] // "Skin Care"
        )
    )
);

//Usuarios
$listaUsuarios = array(
    array(
        "id" => 1,
        "nombre" => "Nicolas Gauto",
        "email" => "admin@gmail.com",
        "clave" => "admin123",
        "permisos" => array(
            "superadmin"),
        "activo" => true
    ),
    array(
        "id" => 2,
        "nombre" => "María López",
        "email" => "maria.lopez@example.com",
        "clave" => "usuario123",
        "permisos" => array(
            "admin", "marcas", "categorias", "cliente"),
        "activo" => true
    ),
    array(
        "id" => 3,
        "nombre" => "Carlos García",
        "email" => "carlos.g@example.com",
        "clave" => "usuario123",
        "permisos" => array(
            "admin", "perfiles", "usuarios", "cliente"),
        "activo" => true
    ),
    array(
        "id" => 4,
        "nombre" => "Laura Fernández",
        "email" => "laura.fernandez@example.com",
        "clave" => "usuario123",
        "permisos" => array(
            "cliente"),
        "activo" => true
    )
);
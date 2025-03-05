<?php
return [
    "/" => [
        "controller" => "App\Controllers\HomeController",
        "action" => "index"
    ],
    "/home" => [
        "controller" => "App\Controllers\HomeController",
        "action" => "index"
    ],
    "/hello" => [
        "controller" => "App\Controllers\HomeController",
        "action" => "saludar"
    ],
    "/rol/index" => [
        "controller" => "App\Controllers\RolController",
        "action" => "index"
    ],
    "/rol/view" => [
        "controller" => "App\Controllers\RolController",
        "action" => "view"
    ],
    "/rol/new" => [
        "controller" => "App\Controllers\RolController",
        "action" => "newRol"
    ],
    "/rol/create" => [
        "controller" => "App\Controllers\RolController",
        "action" => "createRol"
    ],
    "/rol/view/(\d+)" => [
        "controller" => "App\Controllers\RolController",
        "action" => "viewRol"
    ],
    "/rol/edit/(\d+)" => [
        "controller" => "App\Controllers\RolController",
        "action" => "editRol"
    ],
    "/rol/delete/(\d+)" => [
        "controller" => "App\Controllers\RolController",
        "action" => "deleteRol"
    ],
    "/rol/update" => [
        "controller" => "App\Controllers\RolController",
        "action" => "updateRol"
    ],
    "/centroFormacion/view" => [
        "controller" => "App\Controllers\CentroController",
        "action" => "view"
    ],
    "/centroFormacion/new" => [
        "controller" => "App\Controllers\CentroController",
        "action" => "newCentro"
    ],
    "/centroFormacion/create" => [
        "controller" => "App\Controllers\CentroController",
        "action" => "createCentro"
    ],
    "/centroFormacion/view/(\d+)" => [
        "controller" => "App\Controllers\CentroController",
        "action" => "viewCentro"
    ],
    "/centroFormacion/edit/(\d+)" => [
        "controller" => "App\Controllers\CentroController",
        "action" => "editCentro"
    ],
    "/centroFormacion/delete/(\d+)" => [
        "controller" => "App\Controllers\CentroController",
        "action" => "deleteCentro"
    ],
    "/centroFormacion/update" => [
        "controller" => "App\Controllers\CentroController",
        "action" => "updateCentro"
    ],
    "/actividad/view" => [
        "controller" => "App\Controllers\ActividadController",
        "action" => "view"
    ],
    "/actividad/new" => [
        "controller" => "App\Controllers\ActividadController",
        "action" => "newActividad"
    ],
    "/actividad/create" => [
        "controller" => "App\Controllers\ActividadController",
        "action" => "createActividad"
    ],
    "/actividad/view/(\d+)" => [
        "controller" => "App\Controllers\ActividadController",
        "action" => "viewActividad"
    ],
    "/actividad/edit/(\d+)" => [
        "controller" => "App\Controllers\ActividadController",
        "action" => "editActividad"
    ],
    "/actividad/delete/(\d+)" => [
        "controller" => "App\Controllers\ActividadController",
        "action" => "deleteActividad"
    ],
    "/actividad/update" => [
        "controller" => "App\Controllers\ActividadController",
        "action" => "updateActividad"
    ],
    "/programaFormacion/view" => [
        "controller" => "App\Controllers\ProgramaController",
        "action" => "view"
    ],
    "/programaFormacion/new" => [
        "controller" => "App\Controllers\ProgramaController",
        "action" => "newPrograma"
    ],
    "/programaFormacion/create" => [
        "controller" => "App\Controllers\ProgramaController",
        "action" => "createPrograma"
    ],
    "/programaFormacion/view/(\d+)" => [
        "controller" => "App\Controllers\ProgramaController",
        "action" => "viewPrograma"
    ],
    "/programaFormacion/edit/(\d+)" => [
        "controller" => "App\Controllers\ProgramaController",
        "action" => "editPrograma"
    ],
    "/programaFormacion/delete/(\d+)" => [
        "controller" => "App\Controllers\ProgramaController",
        "action" => "deletePrograma"
    ],
    "/programaFormacion/update" => [
        "controller" => "App\Controllers\ProgramaController",
        "action" => "updatePrograma"
    ]
];
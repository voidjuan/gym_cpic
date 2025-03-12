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
    // Rol
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
    // CentroFormacion
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
    // Actividad
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
    // Programa Formación
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
    ],
    // Tipo de Usuario
    "/tipoUsuario/view" => [
        "controller" => "App\Controllers\TipoUsuarioController",
        "action" => "view"
    ],
    "/tipoUsuario/new" => [
        "controller" => "App\Controllers\TipoUsuarioController",
        "action" => "newTipoUsuario"
    ],
    "/tipoUsuario/create" => [
        "controller" => "App\Controllers\TipoUsuarioController",
        "action" => "createTipoUsuario"
    ],
    "/tipoUsuario/view/(\d+)" => [
        "controller" => "App\Controllers\TipoUsuarioController",
        "action" => "viewTipoUsuario"
    ],
    "/tipoUsuario/edit/(\d+)" => [
        "controller" => "App\Controllers\TipoUsuarioController",
        "action" => "editTipoUsuario"
    ],
    "/tipoUsuario/delete/(\d+)" => [
        "controller" => "App\Controllers\TipoUsuarioController",
        "action" => "deleteTipoUsuario"
    ],
    "/tipoUsuario/update" => [
        "controller" => "App\Controllers\TipoUsuarioController",
        "action" => "updateTipoUsuario"
    ],
    // Grupos
    "/grupo/view" => [
        "controller" => "App\Controllers\GrupoController",
        "action" => "view"
    ],
    "/grupo/new" => [
        "controller" => "App\Controllers\GrupoController",
        "action" => "newGrupo"
    ],
    "/grupo/create" => [
        "controller" => "App\Controllers\GrupoController",
        "action" => "createGrupo"
    ],
    "/grupo/view/(\d+)" => [
        "controller" => "App\Controllers\GrupoController",
        "action" => "viewGrupo"
    ],
    "/grupo/edit/(\d+)" => [
        "controller" => "App\Controllers\GrupoController",
        "action" => "editGrupo"
    ],
    "/grupo/delete/(\d+)" => [
        "controller" => "App\Controllers\GrupoController",
        "action" => "deleteGrupo"
    ],
    "/grupo/update" => [
        "controller" => "App\Controllers\GrupoController",
        "action" => "updateGrupo"
    ],
    //Usuario
    "/usuario/view" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "view"
    ],
    "/usuario/new" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "newUsuario"
    ],
    "/usuario/create" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "createUsuario"
    ],
    "/usuario/view/(\d+)" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "viewUsuario"
    ],
    "/usuario/edit/(\d+)" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "editUsuario"
    ],
    "/usuario/delete/(\d+)" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "deleteUsuario"
    ],
    "/usuario/update" => [
        "controller" => "App\Controllers\UsuarioController",
        "action" => "updateUsuario"
    ],
    // Login
    "/login/init" => [
        "controller" => "App\Controllers\loginController",
        "action" => "initLogin"
    ],

];
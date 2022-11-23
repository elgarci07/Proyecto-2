<?php

const BD = 
[
    'SERVER' => 'localhost',
    'USER' => 'root',
    'PASSWORD' => '',
    'BD' => 'bd_restaurante2',

    'EMPLEADO' => 
    [
        'TABLA' => 'tbl_empleado',
        'ID' => 'id_empleado',
        'NOMBRE' => 'nom_empleado',
        'PASSWORD' => 'password_empleado',
        'DNI' => 'dni_empleado',
        'EMAIL' => 'email_empleado',
        'CARGO' => 'fk_cargo_empleado',
        'PASSWORD' => 'password_empleado'
    ],

    'SALA' =>
    [
        'TABLA' => 'tbl_sala',
        'ID' => 'id_sala',
        'NOMBRE' => 'nom_sala'
    ],
    
    'MESA' =>
    [
        'TABLA' => 'tbl_mesa',
        'ID' => 'id_mesa',
        'NUMERO' => 'num_mesa',
        'ESTADO' => 'estado_mesa',
        'SALA' => 'fk_num_sala',
        'CAPACIDAD' => 'capacidad_mesa',

        'ESTADOS' => 
        [
            0 => 'libre',
            1 => 'ocupado',
            2 => 'mantenimiento'
        ]
    ],

    'REGISTRO' =>
    [
        'TABLA' => 'tbl_registro',
        'ID' => 'id_registro',
        'FECHAENTRADA' => 'fecha_entrada',
        'FECHASALIDA' => 'fecha_salida',
        'MESA' => 'id_mesa',
        'CAMARERO' => 'id_camarero',
        'COMENSALES' => 'num_comensales'
    ],


    'CARGO' =>
    [
        'TABLA' => 'tbl_cargo',
        'ID' => 'id_cargo',
        'NOMBRE' => 'nom_cargo'
    ],


    'INCIDENCIA' =>
    [
        'TABLA' => 'tbl_incidencia',
        'ID' => 'id_inc',
        'NOMBRE' => 'nom_inc',
        'ESTADO' => 'estado_inc',
        'MESA' => 'fk_mesa_inc'
    ],


];

const LOGIN_FORM = 
[
    'USER' => 'email_empleado',
    'PASSWORD' => 'password_empleado',
    'SEND' => 'button'
];

const FILTROS = 
[
    // Index
    'SALA' => 'filtro_sala',
    'CAPACIDAD' => 'filtro_capacidad',
    'DISPONIBILIDAD' => 'filtro_disponibilidad',

    // Registros
    'MESA' => 'filtro_mesa',
    'COMENSALES' => 'filtro_comensales',

    'BD' => // nombres de los filtros en la base de datos
    [
        'filtro_sala' => 'fk_num_sala',
        'filtro_capacidad' => 'capacidad_mesa',
        'filtro_disponibilidad' => 'estado_mesa',
        'filtro_mesa' => 'id_mesa',
        'filtro_comensales' => 'num_comensales'
    ]
];

const COLORES_MESAS = 
[
    0 => 'verde',
    1 => 'rojo',
    2 => 'blanco'
];
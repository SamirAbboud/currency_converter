<?php


return [
    'database' => [
        'servername' => 'localhost',
        'name' => 'currency_convert_db',
        'username' => 'root',
        'password' => '',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ],
    'services' => [
        'fixer_key' => '', // access key from fixer.io
    ]
];
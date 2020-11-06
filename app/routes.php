<?php

$router->get('', 'ConversionsController@index');
$router->get('convert', 'ConversionsController@create');
$router->post('convert', 'ConversionsController@store');
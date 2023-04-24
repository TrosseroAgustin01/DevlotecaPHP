<?php

app()->get('/', function () {
    response()->page(viewsPath('index.html', false));
});

app()->get('/contacto','ContactosController@index');

app()->get('/audio','ContactosController@prueba');

app()->get('/home', 'TestsController@index');

app()->get('/test', 'TestsController@test');

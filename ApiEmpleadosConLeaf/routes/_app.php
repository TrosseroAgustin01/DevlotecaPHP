<?php

app()->get('/', function () {
    response()->page(viewsPath('index.html', false));
});

app()->get('/contactos', 'ContactosController@index');

app()->get('/contactos/{id}', 'ContactosController@showContact');

app()->post('/contactos','ContactosController@createContact');

app()->delete('/contactos/{id}', 'ContactosController@deleteContact');

app()->put("/contactos/{id}", 'ContactosController@updateContact');

app()->get('/users',"UsersController@index");

/*app()->get('/home', 'TestsController@index');

app()->get('/test', 'TestsController@test');*/

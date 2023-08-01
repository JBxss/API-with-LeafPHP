<?php

app()->get("/", function () {
    response()->json(["message" => "Bienvenido a mi API"]);
});

// Consulta todos los registros (Verbo GET)
app()->get("/contactos", 'ContactosController@index');

// Consulta un registro con un ID (Verbo GET)
app()->get("/contactos/{id}", 'ContactosController@consultar');

// Inserta un registro (Verbo POST)
app()->post("/contactos", 'ContactosController@agregar');

// Elimina un registro (Verbo DELETE)
app()->delete("/contactos/{id}", 'ContactosController@borrar');

// Actualiza un registro (Verbo PUT)
app()->put("/contactos/{id}", 'ContactosController@actualizar');

<?php
//La solicitud ha tenido éxito.
function sendSuccess200($data, $message = 'Operación exitosa')
{
    $response = [
        'status' => 'success',
        'code' => 200,
        'message' => $message,
        'data' => $data,
    ];
    echo json_encode($response);
}

// La solicitud ha tenido éxito y se ha creado un nuevo recurso como resultado de ello. Ésta es típicamente la respuesta enviada después de una petición PUT.
function sendSuccess201($data, $message = 'Recurso creado con éxito')
{
    $response = [
        'status' => 'success',
        'code' => 201,
        'message' => $message,
        'data' => $data,
    ];
    echo json_encode($response);
}


// Define una función para enviar una respuesta de éxito con código de estado 202 (Accepted)
function sendSuccess202($data, $message = 'Aceptado')
{
    $response = [
        'status' => 'success',
        'code' => 202,
        'message' => $message,
        'data' => $data,
    ];
    echo json_encode($response);
}

// Define una función para enviar una respuesta de éxito con código de estado 204 (No Content)
function sendSuccess204($message = 'No Content')
{
    $response = [
        'status' => 'success',
        'code' => 204,
        'message' => $message,
    ];
    echo json_encode($response);
}

// Define una función para enviar una respuesta de éxito con código de estado 301 (Moved Permanently)
function sendSuccess301($message = 'Movido permanentemente')
{
    $response = [
        'status' => 'success',
        'code' => 301,
        'message' => $message,
    ];
    echo json_encode($response);
}

// Define una función para enviar una respuesta de éxito con código de estado 304 (Not Modified)
function sendSuccess304($message = 'No modificado')
{
    $response = [
        'status' => 'success',
        'code' => 304,
        'message' => $message,
    ];
    echo json_encode($response);
}


// Define una función para enviar una respuesta de error con código de estado 400
function sendError400($message, $errorDetails = [])
{
    $response = [
        'status' => 'error',
        'code' => 400,
        'message' => $message,
        'errorDetails' => $errorDetails,
    ];
    echo json_encode($response);
}

// Define una función para enviar una respuesta de éxito con código de estado 404 (Not Found)
function sendError404($message = 'No encontrado', $errorDetails = [])
{
    $response = [
        'status' => 'error',
        'code' => 404,
        'message' => $message,
        'errorDetails' => $errorDetails,
    ];
    echo json_encode($response);
}

// Define una función para enviar una respuesta de éxito con código de estado 500 (Internal Server Error)
function sendError500($message = 'Error interno del servidor', $errorDetails = [])
{
    $response = [
        'status' => 'error',
        'code' => 500,
        'message' => $message,
        'errorDetails' => $errorDetails,
    ];
    echo json_encode($response);
}

// Define funciones para otros códigos de estado según tus necesidades
// ...

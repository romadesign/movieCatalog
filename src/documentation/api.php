<?php
require("../../vendor/autoload.php");

// $openapi = \OpenApi\Generator::scan([$_SERVER['DOCUMENT_ROOT'].'/movieCatalog/src/Web']);
$openapi = \OpenApi\Generator::scan([$_SERVER['DOCUMENT_ROOT'].'/movieCatalog/api']);

header('Content-Type: application/json');
echo $openapi->toJSON();
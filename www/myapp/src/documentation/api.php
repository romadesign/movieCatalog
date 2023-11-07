<?php
require("../../vendor/autoload.php");

$openapi = \OpenApi\Generator::scan([$_SERVER['DOCUMENT_ROOT'].'/myapp/api']);

header('Content-Type: application/json');
echo $openapi->toJSON();
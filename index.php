<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 19/04/2019
 * Time: 10:10 AM
 */


use App\Validator\Validator;

require_once __DIR__.'/App/Validator/Validator.php';
$uri = $_SERVER[REQUEST_URI];
echo "uri  to validate : ". $uri . "<br>";
$validator = new Validator($uri);
$exits = $validator->validateUrl();
if($exits){
    echo $exits;
}else{

    echo "no matchig";
}

<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 19/04/2019
 * Time: 3:38 PM
 */
namespace App\Validator;


use Doctrine\Instantiator\Exception\UnexpectedValueException;

class Validator
{
    private $url;
    private $array_uris =  array(
        0 => "/get/{id}"
        ,1 => "/post/{id}/{name}"
        ,2 => "/put/{id}"
        ,3 => "/delete/{id}"
        ,4 => "/post/{name}"
    );
    public function __construct($url)
    {
        if(empty($url)){
            throw new UnexpectedValueException("$url is not empty");
        }
        $this->url = $url;
    }

    public function validateUrl(){

        foreach ($this->array_uris as $key => $val_uri) {
            $expresion = $this->generateExpresion($val_uri);
            $pass = preg_match($expresion, $this->url);
            if($pass){

                echo "uri: $val_uri <br>";
                echo "id: $key <br>";
                return $val_uri;
            }else{
                return "";

            }
        }
    }

    private function generateExpresion($url){

        $url = str_replace("/", "\/",$url);
        $url = str_replace("{id}", "+\d", $url);
        $url = str_replace("{name}", "+[a-z]*", $url);
        $url = "/". $url . "$/";
        //echo "<p>";echo $url;echo "</p>";
        return $url;
    }
}
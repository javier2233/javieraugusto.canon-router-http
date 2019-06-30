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
    private $listUrls;
    /*private $arrayUrls =  array(
        0 => "/get/{id}"
        ,1 => "/post/{id}/{name}"
        ,2 => "/put/{id}"
        ,3 => "/delete/{id}"
        ,4 => "/post/{name}"
        ,5 => "/put/{name}"
        ,6 => "/delete/{name}"
        ,7 => "/delete/{id}"
        ,8 => "/get/{name}/{id}"
        ,9 => "/get/{id}/{id}"
    );*/
    public function __construct($url, Array $arrayUrls)
    {
        if(empty($url)){
            throw new UnexpectedValueException("$url is not empty");
        }
        $this->url = $url;
        $this->listUrls = $arrayUrls;
    }

    public function validateUrl(){
        $match = "";
        foreach ($this->listUrls as $key => $urlValue) {
            //echo $key . "<br>";
            //echo $val_uri . "<br>";
            $expresion = $this->generateExpresion($urlValue);
            $pass = preg_match($expresion, $this->url);
            if($pass){

               $match = "match!! <br>id: " .$key . " <br> uri: " . $urlValue;
               break;
            }
        }
        return $match;
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
<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 19/04/2019
 * Time: 8:14 PM
 */

use PHPUnit\Framework\TestCase;

use App\Validator\Validator;

class RouterTest extends TestCase
{
    private $url;
    private $rawUrl;
    private $arrayUrls =  array(
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
    );

    /** @test */
    public function shouldCreateAnValidateObjectWhenAValidUrl()
    {
        $this->rawUrl = "/get/1";
        $this->url = new Validator($this->rawUrl, $this->arrayUrls);
        $this->assertInstanceOf(Validator::class, $this->url);
    }

    /** @test */
    public function shouldCreateAnValidateObjectWhenAValidUrlFormedGet()
    {
        $this->rawUrl = "get";
        $this->url = new Validator($this->rawUrl, $this->arrayUrls);
        $this->assertStringContainsString("get", $this->rawUrl, "No hubo match de URI");


    }

    /** @test */
    public function shouldCreateAnValidateObjectWhenAValidUrlFormedPost()
    {
        $this->rawUrl = "post";
        $this->url = new Validator($this->rawUrl, $this->arrayUrls);
        $this->assertStringContainsString("post", $this->rawUrl, "No hubo match de URI");
    }

    /** @test */
    public function shouldCreateAnValidateObjectWhenAValidUrlFormedPut()
    {
        $this->rawUrl = "put";
        $this->url = new Validator($this->rawUrl, $this->arrayUrls);
        $this->assertStringContainsString("put", $this->rawUrl, "No hubo match de URI");
    }

    /** @test */
    public function shouldCreateAnValidateObjectWhenAValidUrlFormedDelete()
    {
        $this->rawUrl = "delete";
        $this->url = new Validator($this->rawUrl, $this->arrayUrls);
        $this->assertStringContainsString("delete", $this->rawUrl, "No hubo match de URI");
    }

    /** @test */
    public function shouldCreateAnValidateObjectWhenAValidUrlEmpty()
    {
        $this->rawUrl = "/get";
        $this->url = new Validator($this->rawUrl, $this->arrayUrls);
        $this->assertNotEquals("/", $this->rawUrl, "Empty URI");


    }
}
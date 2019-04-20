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

    /** @test */
    public function shouldCreateAnValidateObjectWhenAValidUrl()
    {
        $this->rawUrl = "/get/1";
        $this->url = new Validator($this->rawUrl);
        $this->assertInstanceOf(Validator::class, $this->url);
    }

    /** @test */
    public function shouldCreateAnValidateObjectWhenAValidUrlFormedGet()
    {
        $this->rawUrl = "get";
        $this->url = new Validator($this->rawUrl);
        $this->assertStringContainsString("get", $this->rawUrl, "No hubo match de URI");


    }

    /** @test */
    public function shouldCreateAnValidateObjectWhenAValidUrlFormedPost()
    {
        $this->rawUrl = "get";
        $this->url = new Validator($this->rawUrl);
        $this->assertStringContainsString("post", $this->rawUrl, "No hubo match de URI");
    }

    /** @test */
    public function shouldCreateAnValidateObjectWhenAValidUrlFormedPut()
    {
        $this->rawUrl = "get";
        $this->url = new Validator($this->rawUrl);
        $this->assertStringContainsString("put", $this->rawUrl, "No hubo match de URI");
    }

    /** @test */
    public function shouldCreateAnValidateObjectWhenAValidUrlFormedDelete()
    {
        $this->rawUrl = "get";
        $this->url = new Validator($this->rawUrl);
        $this->assertStringContainsString("delete", $this->rawUrl, "No hubo match de URI");
    }

    /** @test */
    public function shouldCreateAnValidateObjectWhenAValidUrlEmpty()
    {
        $this->rawUrl = "/get";
        $this->url = new Validator($this->rawUrl);
        $this->assertNotEquals("/", $this->rawUrl, "Empty URI");


    }
}
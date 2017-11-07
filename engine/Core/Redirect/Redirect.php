<?php
namespace Engine\Core\Redirect;

class Redirect
{

    public $req404;
    public $req301;

    public function __construct()
    {
        $this->req404 = header("HTTP/1.0 404 Not Found");
    }

}
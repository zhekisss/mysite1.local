<?php
namespace Engine\Helper;

class Common
{

    /**
     * @return boolean
     */
    public static function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public static function getMethod()
    {
        return trim($_SERVER['REQUEST_METHOD']);
    }

    /**
     * @return mixed
     */
    public static function getPathUrl()
    {

        $pathUrl = trim($_SERVER['REQUEST_URI']);

        if ($position = strpos($pathUrl, '?')) {
            $pathUrl = substr($pathUrl, 0, $position);
        }

        return $pathUrl;
    }

    public static function filter()
    {


    }

}

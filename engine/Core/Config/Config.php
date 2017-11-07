<?php
namespace Engine\Core\Config;

/**
 *
 */
class Config
{

    public static function item($key, $group = 'main')
    {

        $groupItems = self::file($group);

        return isset($groupItems[$key]) ? $groupItems[$key] : null;

    }

    /**
     * Undocumented function
     *
     * @param $group
     * @return void
     */
    public static function file($group)
    {

        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . strtolower(ENV) . '/Config/' . $group . '.php';
        if (file_exists($path)) {
            $items = require $path;

            if (is_array($items)) {

                return $items;

            }
            else {
                throw new \Exception(

                    sprintf('Config file %s is not valid array', $path)
                );
            }
        }
        else {
            throw new \Exception(

                sprintf('Cannot load config from file, file %s does not exists.', $path)
            );
        }
        return false;
    }
}
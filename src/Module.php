<?php


namespace hub;


use NovemBit\i18n\system\Component;

class Module extends Component
{

    /**
     *
     * @var \NovemBit\i18n\Module
     * */
    public $i18n;

    private static $_instance;

    public static function instance($config)
    {

        if (!isset(self::$_instance)) {
            self::$_instance = new self($config);
        }

        return self::$_instance;
    }

}
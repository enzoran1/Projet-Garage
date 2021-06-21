<?php

class Autoloader
{
    public static array $list = array();
    
    /**
     * load
     *
     * @param  mixed $className
     * @return void
     */
    public static function load($className)
    {
        self::$list[] = $className;        
        if(file_exists(BASE_DIR . 'src/Controller/' . $className . '.php'))
            require BASE_DIR . 'src/Controller/' . $className . '.php';

        if(file_exists(BASE_DIR . 'src/Manager/' . $className . '.php'))
            require BASE_DIR . 'src/Manager/' . $className . '.php';

        if(file_exists(BASE_DIR . 'core/' . $className . '.php'))
            require BASE_DIR . 'core/' . $className . '.php';
    }
    
    /**
     * register
     *
     * @return void
     */
    public static function register()
    {
        spl_autoload_register([__CLASS__,'load']);
    }

}

// Appel de la méthode static register
Autoloader::register();
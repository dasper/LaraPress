<?php namespace LaraPress;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 *
 */
class LaraPress // extends AnotherClass
{
    static protected $baseParams = array(
        'driver' => 'mysql',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => 'wp_',
    );

    function __construct(array $params = [])
    {
        $this->connect([]);
    }

    public static function connect(array $params = [])
    {
        $capsule = new Capsule;
        $params = array_merge(static::$baseParams, $params);
        $capsule->addConnection($params);
        $capsule->bootEloquent();
    }

    public static function test()
    {
        return 'Hello World, Composer!';
    }
}

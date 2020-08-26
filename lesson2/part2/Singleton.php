<?php
require_once 'Trait1.php';

class Singleton{
	static $single;//объект нашего класса в дальнейшем.
    static $a;
    static $b;

	private function __construct(){
        $this->a = 999;
        $this->b = 777;
	}

	public static function getObject(){
		if (self::$single === null) {
			self::$single = new Singleton();
		}
		return self::$single;
	}
	use Trait1;
}

<?php
	namespace App\Models;

	trait Singleton
	{
	    protected static $instance;

	    protected function __construct(){}

	    public static function instance()
	    {
	        if (null === static::$instance) {
	            static::$instance = new static;
	        }
	        return static::$instance;
	    }
	}
?>
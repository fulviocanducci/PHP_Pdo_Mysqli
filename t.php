<?php

	declare(strict_types = 1);
	
	
	error_reporting(E_ALL);
	
    
	
	
    class Foo
    {
        public function bar():string
        {
            return true;
        }
    }

    $Foo = new Foo();
    echo ($Foo->bar());
<?php

function customAutoload($classname) {
	if (file_exists($classname . '.php')) {
		require_once $classname . '.php';
	}
}

spl_autoload_register('customAutoload');

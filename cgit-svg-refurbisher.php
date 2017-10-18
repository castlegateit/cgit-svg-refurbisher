<?php

/*
Plugin Name: Castlegate IT SVG Refurbisher
Plugin URI: http://github.com/castlegateit/cgit-svg-refurbisher
Description: Prevents cross-file interference between included SVG resources.
Version: 1.0.1
Author: Castlegate IT
Author URI: http://www.castlegateit.co.uk/
License: MIT
*/

// Load classes and functions
require_once __DIR__ . '/classes/autoload.php';
// Initialization
$condo = new \Cgit\Refurbisher\Refurbisher();

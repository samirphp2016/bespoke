<?php
require 'autoload.php';
require 'global-variables.php';
require 'function.php';
/* Following code will load db connection stuff and files */

// load viewer library
  $libraryPath = 'cms-admin/lib/viewer_functions.php';
  $dirsToCheck = ['','../','../../','../../../','../../../../']; // add if needed: '/home/customer/www/sydneyreliningcompany.com.au/public_html/'
  foreach ($dirsToCheck as $dir) { if (@include_once("$dir$libraryPath")) { break; }}
  if (!function_exists('getRecords')) { die("Couldn't load viewer library, check filepath in sourcecode."); }

router::init();

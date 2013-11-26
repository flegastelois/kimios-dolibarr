<?php

function __autoload($className) {
   $classFile = DOL_DOCUMENT_ROOT."/kimios/class/api/" . $className . '.php';
   if (file_exists($classFile)) {
      require_once($classFile);
      return true;
   }
   return false;
}
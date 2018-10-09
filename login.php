<?php
session_start();
require_once 'LIGA3/LIGA.php';

BD('localhost','root','','sistemacd');

$usuarios = LIGA("select * from usuarios where id = '$_POST[id]' and pass = md5('$_POST[pass]')");

if($usuarios -> numReg() == 1){
  
   //echo 'Si es';
   $_SESSION['id'] = $usuarios -> d('id');
   $_SESSION['pass'] = $usuarios -> d('pass');
  // header('Location: sistema.php');
   
}else{
    echo 'Error en los datos';
  // header('Location: index.php?error=1');
}


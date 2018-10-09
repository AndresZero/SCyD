<?php
session_start();

require_once 'LIGA3/LIGA.php';

BD('localhost','root','','sistemacd');

$tabla = 'usuarios';
$liga  = LIGA($tabla);

if(empty($_SESSION['id']) && empty($_SESSION['pass'])){
  //echo 'Usuario OK';
  require_once 'LIGA3/LIGA.php';
  
  HTML::cabeceras(array('title'=>'Sistema seguro','description'=>'Lo que sea...'));
  
  $body = array('contenedor'=>array('uno'=>'<p>Usuario valido</p>',
                                    'dos'=>'<a href="cerrar.php" >Cerrar sesion</a>'));
  
$cols = array('*', '-Pass');
$join = array('depende'=>$liga);
$pie  = '<th colspan="@[numCols]">Total de instancias: @[numReg]</th>';
HTML::tabla($liga, 'Instancias de '.$tabla, $cols, true, $join, $pie);
  
  
  
  HTML::cuerpo($body);
  
  HTML::pie();
  
}else{
   // echo 'Area prohibida';
   header('Location: .?error=1');
}
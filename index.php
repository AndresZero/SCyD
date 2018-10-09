<?php
session_start();
require_once 'LIGA3/LIGA.php';//Equibalente a un input

BD('localhost','root','','sistemacd');//linea de configuracion para conectarse a la base de datos

$where = '';

if(!empty($_SESSION['id']) && !empty($_SESSION['pass'])){
    $where = "where id = '$_SESSION[id]' and pass = '$_SESSION[pass]'";
}

$usuarios = LIGA('usuarios');//Aqui se liga la tabla que esta e la base de datos

if($usuarios -> numReg() == 1){
    //La funcion header sirve para hacer lo que yo quiera 
    header('sistema.php');  
}

HTML::cabeceras(array('title' => 'Login para usuarios','description'=>'Ingreso seguro a la pagina web'));


//Get = Datos se envian por la URL
//Post = En el campo de la peticion

$campos = array('Username'=> '<input id="Username" name="id"/>',
                'Contraseña'=>'<input type="password" id="Contraseña" name="pass">');

$prop = array('form'=>'action="Login.php" method="POST"');

if(isset($_GET['error'])){
    echo '<p>Error en datos';
}

HTML::forma($usuarios,'Acceso',$campos,$prop);//

$js = array('js'=>array('js/jquery-3.3.1.min.js', 'js/codigo.js'));

HTML::pie($js);//Para pie de pagina
?>
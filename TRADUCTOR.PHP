<?php 
include("conexcion.php");
include("class.Funciones.php");


$db = new MySQL();
$f= new Funciones();

$palab=$f->guardar_cadena_utf8($_REQUEST['palabra']);

$palabra=($palab);

$sql = "SELECT * FROM palabras_traduccion WHERE palabras like $palabra";


$result = $db->consulta($sql);
$result_num=$db->num_rows($result);
$result_palabra_row = $db->fetch_assoc($result);

if($result_num==1){

	$id_palabra = $f->imprimir_cadena_utf8($result_palabra_row['id_palabras']);
	$palabra_buscada = $f->imprimir_cadena_utf8($result_palabra_row['palabras']);
	$palabra_traducida = $f->imprimir_cadena_utf8($result_palabra_row['tsotsil']);
	$palabra_audio = $f->imprimir_cadena_utf8($result_palabra_row['audio']);

	echo($id_palabra);
	echo(",");
	echo($palabra_buscada);
	echo(",");
	echo($palabra_traducida);
	echo(",");
	echo($palabra_audio);
}
else{
	echo("NULL");
}

?>
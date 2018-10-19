<?php
require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
// Inserta un logo en la esquina superior zquierda a 300 ppp
$pdf->Image('logo.png',30,5,150);

include_once '../model/clave.class.php';
include_once '../model/formulario.class.php';
include_once '../session/control_sesion.php';
require_once '../model/usuarioClave.class.php';

$jefe=$_SESSION['nombre'];

if(isset($_GET['idFormulario'])) {
    $formularios = Formulario::getInstancia()->getUltimoFormulario($_GET['idFormulario']);
} else {
    $formularios = Formulario::getInstancia()->getUltimoFormulario();     
}

//foreach ($formularios as $formulario) {
               
//$formulario = Formulario::getInstancia()->getUltimoFormulario();
foreach ($formularios as $formulario) {
$ida=$formulario['idAsignatura'];
$idf=$formulario['idFormulario'];
$co=$formulario['copias'];
$fo=$formulario['forma'];
$bi=$formulario['bimestre'];
$gra=$formulario['grado'];
$jor=$formulario['jornada'];

}
if ($ida == "MT") {
	$ida = utf8_decode("Matemática");
}else if ($ida == "EN") {
	$ida = utf8_decode("Idioma Extranjero Inglés");
}else if ($ida == "ID") {
	$ida = utf8_decode("L-1 Idioma Español");
}else if ($ida == "CS") {
	$ida = utf8_decode("Ciencias sociales y formación ciudadana");
}else if ($ida == "RL") {
	$ida = utf8_decode("Religión");
}else if ($ida == "CN") {
	$ida = utf8_decode("Ciencias Naturales");
}else if ($ida == "CB") {
	$ida = utf8_decode("Contabilidad");
}else if ($ida == "FF") {
	$ida = utf8_decode("Física Fundamental");
}else if ($ida == "QA") {
	$ida = utf8_decode("Química");
}else if ($ida == "MAI") {
	$ida = utf8_decode("Matemática I");
}else if ($ida == "LL") {
	$ida = utf8_decode("Lengua y Literatura");
}else if ($ida == "FFI") {
	$ida = utf8_decode("Fisica I");
}else if ($ida == "CLI") {
	$ida = utf8_decode("Comunicación y Lenguaje L3 (Inglés I)");
}else if ($ida == "MAII") {
	$ida = utf8_decode("Matematicas II");
}else if ($ida == "ESD") {
	$ida = utf8_decode("Estadistica Descriptiva");
}else if ($ida == "CLII") {
	$ida = utf8_decode("Comunicación y Lenguaje L3 (Inglés II)");
}else if ($ida == "BI") {
	$ida = utf8_decode("Biología");
}else if ($ida == "MAIII") {
	$ida = utf8_decode("Matematicas III");
}else if ($ida == "FFII") {
	$ida = utf8_decode("Fisica II");
}else if ($ida == "CLIII") {
	$ida = utf8_decode("Comunicación y Lenguaje L3 (Inglés III)");
}else if ($ida == "AI") {
	$ida = utf8_decode("Artes Industriales");
}else if ($ida == "AP") {
	$ida = utf8_decode("Artes Plásticas");
}else if ($ida == "QM"){
	$ida = utf8_decode("Química");
}else{
	$ida = utf8_decode("Idioma Maya Kakchiquel");
}



$pdf->SetFont('Arial','B',24);
$pdf->Cell(10,40,'Clave de Examen');
$pdf->Ln(10);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,35,'Jefe de Equipo Tecnico:');
$pdf->Cell(25,35,"$jefe");
$pdf->Ln(5);

$pdf->Cell(49,35,'Cantidad de Examenes:');
$pdf->Cell(50,35,"$co");
$pdf->Ln(5);

$pdf->Cell(25,35,'Asignatura:');
$pdf->Cell(50,35,"$ida");
$pdf->Ln(5);

$pdf->Cell(19,35,'Jornada:');
$pdf->Cell(50,35,"$jor");
$pdf->Ln(5);

$pdf->Cell(20,35,'Bimestre:');
$pdf->Cell(50,35,"$bi");
$pdf->Ln(5);

$pdf->Cell(25,35,'Formulario:');
$pdf->Cell(50,35,"$idf");
$pdf->Ln(5);

$pdf->Cell(15,35,'Forma:');
$pdf->Cell(50,35,"$fo");
$pdf->Ln(5);

$pdf->Cell(15,35,'Grado:');
$pdf->Cell(100,35,"$gra");
$pdf->Ln(5);

$pdf->Cell(15,40,'Codigo de Activacion:_____________');
$pdf->Ln(10);

$pdf->SetFont('Arial','B',18);
$pdf->Cell(80,40,'N.de Pregunta');
$pdf->Cell(65,40,'Punteo');
$pdf->Cell(80,40,'Respuesta');
$pdf->Ln(10);

$pdf->SetFont('Arial','B',8);
$claves = Clave::getInstancia()->getClaves($idf);
foreach ($claves as $clave) {
	$np=$clave['numeroPregunta'];
	$v=$clave['valor'];
	$res=$clave['respuesta'];
	$pdf->Cell(20);
	$pdf->Cell(68,35,"$np");
	$pdf->Cell(72,35,"$v");
	$pdf->Cell(55,35,"$res");
	$pdf->Ln(3);
}


$pdf->SetY(-60);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40);
$pdf->Cell(80,35,"F._______________________          F._______________________");
$pdf->Ln(4);
$pdf->Cell(47);
$pdf->Cell(80,35,'Jefe de Equipo Tecnico                          Oficina Tecnica');
$pdf->Output();
?>

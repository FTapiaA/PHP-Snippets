<?php
$strHeader = '';

$strFirmaResponsable = '';

$strInstitucion = '';

$strCarrera = '';

$strProfesionista = '';

$strExpedicion = '';

$strAntecedente = '';

/******************  KEYS DECLARATION  ***************************/
$keysHeader = array("version", "folioControl");
$keysFirmaResponsable = array("curp", "idCargo", "cargo", "abrTitulo");
$keysInstitucion = array("cveInstitucion", "nombreInstitucion");
$keysCarrera = array("cveCarrera", "nombreCarrera", "fechaInicio", "fechaTerminacion", "idAutorizacionReconocimiento", "autorizacionReconocimiento", "numeroRvoe");
$keysProfesionista = array("curp", "nombre", "primerApellido", "segundoApellido", "correoElectronico");
$keysExpedicion = array("fechaExpedicion", "idModalidadTitulacion", "modalidadTitulacion", "fechaExamenProfesional", "fechaExencionExamenProfesional", "cumplioServicioSocial", "idFundamentoLegalServicioSocial", "fundamentoLegalServicioSocial", "idEntidadFederativa", "entidadFederativa");
$keysAntecedente = array("institucionProcedencia", "idTipoEstudioAntecedente", "tipoEstudioAntecedente", "idEntidadFederativa", "entidadFederativa", "fechaInicio", "fechaTerminacion", "noCedula");

/******************  GETTING VALUES FOR KEYS  ***************************/
$valores = array();
$valores['header'] = getValues($strHeader, $keysHeader);
$valores['firmaResponsable'] = getValues($strFirmaResponsable, $keysFirmaResponsable);
$valores['institucion'] = getValues($strInstitucion, $keysInstitucion);
$valores['carrera'] = getValues($strCarrera, $keysCarrera);
$valores['profesionista'] = getValues($strProfesionista, $keysProfesionista);
$valores['expedicion'] = getValues($strExpedicion, $keysExpedicion);
$valores['antecedente'] = getValues($strAntecedente, $keysAntecedente);
//echo var_dump($valores);

/******************  GENERATE STRING  ***************************/
$cadena = "||";
foreach($valores as $vals){
	$cadena.=implode("|", $vals);
	$cadena.="|";
}
$cadena.="|";
echo $cadena;

/******************  END  ***************************/

/******************  FUNCTION  ***************************/
function getValues($str, $keys){
	$parts = explode('"', $str);
	$values = array();
	foreach($keys as $key){
		//$values[$key] = false;
		foreach($parts as $i => $part){
			if(strpos($part," ".$key."=") !== false){
				$values[$key] = $parts[$i+1];
			}
		}
	}
	return $values;
}

<?php //if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once 'application/libraries/PHPWord-master/src/PhpWord/Autoloader.php';
use PhpOffice\PhpWord\TemplateProcessor;
\PhpOffice\PhpWord\Autoloader::register();  

class Prueba extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('reportes/reportes_model');
    $this->load->model('incidencia');
  }

  public function funcionprueba()
  {
    //require_once(APPPATH.'libraries/phpWord/autoload.php');    
      
    
    $templateWord = new TemplateProcessor(base_url().'plantilla/plantillas_documentos/PlantillaSolicitudIncidencia.docx');
    
    $nombre = "Nombre del personal";
    $cargo = "Cargo del personal";


    // --- Asignamos valores a la plantilla
    $templateWord->setValue('nombre_personal',$nombre);
    $templateWord->setValue('cargo_personal',$cargo);    

    // --- Guardamos el documento
    $templateWord->saveAs('Documento02.docx');
    
    //header("Content-Disposition: attachment; filename=Documento02.docx; charset=iso-8859-1");
    //echo file_get_contents('Documento02.docx');
  }
}
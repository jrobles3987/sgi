<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Consultas_equipos extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('reportes/reportes_model');
  }
  private function get_css(){
    $html = '<style>
              * {
                font-style: normal;
                font-weight: bold;
                font-size: 11px;
              }
              .datos{
  							font-weight: normal;
  						}
              .center{
                text-align: center;
              }

              .titulo{
                text-align: center;
                padding: 0;
              }

              .t1{ font-size: 15px; }
              .t2{ font-size: 12px; }
              .t3{ font-size: 12px; }
              .t4{ font-size: 9px; }


              .cabecera{
                text-align: left;
                width: 535px;
              }

              .logo1{ width: 100px;}
              .logo2{ width: 100px;}

              .width100{
                width: 100%;
              }
              .width80{
                width: 80%;
              }
              #tablaBloque{
                border-collapse: collapse;
              }
              .bloqueA{
                width: 100%;
                margin-right: 2px;
              }
              #tablaBloque, #tablaBloque th, #tablaBloque td{
                border: 1px solid black;
              }
              .bloqueGeneral{
                width: 100%;
              }
              .bloqueGeneral #cedula{
                width: 150px;
              }
              #labelBloque{
                background-color: #F1EE2A;
              }
              #labelBloque, #contenidoBloque{
                border-color: #000;
                border-width: 1px;
                border-style: solid;
              }

              #labelBloque label{
                margin-left: 15px;
              }
              .bloqueGeneral #area{
                width 25%;
              }

              .bloqueGeneral #nombre{
                width: 40%;
              }

              .bloqueGeneral #fecha{
                width: 20%;
              }
              #tablaBloque td{
                overflow:hidden;
                  text-align: center;
              }

              .colorheadergreen{
                color: #000;
                background-color: #A9F5BC;
              }

              .colorheaderblue{
                color: #000;
                background-color: #36AE1C;
              }

              .colorheaderyellow{
                color: #000;
                background-color: #F3F781;
              }

              .wheader{
                width: 730px;
              }

              .hheader{
                height: 5px;
              }

              .hheaderblue{
                height: 5px;
              }

              .alingleft{
                text-align: left;
              }

              .alignjustified{
                text-align: justify;
              }

              .alignright{
                text-align: right;
              }

              .alignverticaltop{
                vertical-align: top;
              }

              .padtext{
                padding-left: 5px;
                padding-right: 5px;
              }

            </style>';
            return $html;
  }
  public function get_equipo($fecha_inicio = '',$fecha_fin = ''){
    require_once(APPPATH.'libraries/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('L','A4', 'es');
    $html2pdf->pdf->SetTitle('Reporte de Incidencias');

            $html = '<!DOCTYPE html><head>';

            $html .= $this->get_css();

            $html .= '</head>
            <meta charset="UTF-8">
            <html lang="es">
            <body>';

            //CONSULTAS
              $requipo = $this->reportes_model->get_report_equipos($fecha_inicio,$fecha_fin);
              //contador
              $c_enfermeria = count($requipo);
            // DISEÑO HTML

            $html .= '<table class="bloqueGeneral center width100">
                  <tr>
                    <td class="logo1"><img src="'.FCPATH.'plantilla/dist/img/logo_utm.png" width="50" height="50"></td>
                    <td class="cabecera center width80">
                      <div class="titulo t1">UNIVERSIDAD TÉCNICA DE MANABÍ</div>
                      <div class="titulo t2">CENTRO DE COMPUTO</div>
                      <div class="titulo t3">REPORTE DE INCIDENCIAS</div>
                      <div class="titulo t3"></div>
                    </td>
                    <td class="logo2"></td>
                  </tr>
                </table>
                <br>
                <table class="bloqueGeneral">
    								<tr>
    									<td class="bloqueA"><div id="labelBloque"><label>DATOS DEL RESPONSABLE</label></div></td>
    								</tr>
    								<tr>
    									<td class="bloqueA"><div id="contenidoBloque">
    										<table class="bloqueGeneral">
    											<tr>
    												<td id="cedula"><label>CÉDULA:</label><label class="datos">'.$this->session->userdata('cedula').'</label></td>
    												<td id="nombre"><label>NOMBRES:</label><label class="datos">'. $this->session->userdata('apeuser').' '.$this->session->userdata('nomuser').'</label></td>
    												<td id="fecha"><label>FECHA:</label><label class="datos">'.date("d/m/Y").'</label></td>
    											</tr>
    										</table>
    									</div></td>
    								</tr>
    						</table>';
            //TITULOS
            $html .= '<table id="tablaBloque" class="width100">
                  <tr class="colorheaderblue">
                    <td width="20" class="headcolor">N°</td>
                    <td class="hheaderblue t3 center" width="150">TITULO</td>
                    <td class="hheaderblue t3 center" width="210">DESCRIPCIÓN</td>
                    <td class="hheaderblue t3 center" width="80">ESTADO</td>
                    <td class="hheaderblue t3 center" width="70">PRIORIDAD</td>
                    <td class="hheaderblue t3 center" width="70">URGENCIA</td>
                    <td class="hheaderblue t3 center" width="70">IMPACTO</td>
                    <td class="hheaderblue t3 center" width="120">USUARIO CREADOR</td>
                    <td class="hheaderblue t3 center" width="120">TÉCNICO ASIGNADO</td>
                    <td class="hheaderblue t3 center" width="100">ULT.FECHA MODIFICACIÓN</td>

                  </tr>';

                //DATOS DE LA TABLA
	              $num = 1;
                foreach ($requipo as $row) {
                  $html .= '<tr>
                       <td width="20" class="datos">'.$num.'</td>';
                  $html .= '<td class="hheaderblue t4 center" width="150"></td>';

                  $html .= '<td class="hheaderblue t4 center" width="210">'.$row->descripcion.'</td>';

                  $html .= '<td class="hheaderblue t4 center" width="80"></td>';
                  $html .= '
                      <td class="hheaderblue t4 center" width="70"></td>';
                  $html .= '
                      <td class="hheaderblue t4 center" width="70"></td>';
                  $html .= '
                      <td class="hheaderblue t4 center" width="70"></td>';
                  $html .= '
                      <td class="hheaderblue t4 center" width="120"></td>';
                  $html .= '
                      <td class="hheaderblue t4 center" width="120"></td>';
                  $html .= '
                      <td class="hheaderblue t4 center" width="100"></td>
                      </tr>';
$num +=1;
              }
              $html .= '</table><br>';
              $html .= '  <table class="bloqueGeneral">
                <tr>
                    <td class="bloqueA"><div id="contenidoBloque">
                      <table class="bloqueGeneral">
                        <tr>
                        <td id="estado"><label>Reporte Incidencias: </label><label class="datos">En General</label></td>
                        <td id="total"><label>Total de registros: </label><label class="datos"> '.$c_enfermeria.'</label></td>
                        </tr>
                      </table>
                    </div></td>
                  </tr>
              </table>';
              try{
                $html2pdf->writeHTML($html);
                //$html2pdf->Output(FCPATH.'public/pruebas.pdf','F');
                $html2pdf->Output('Reporte Incidencias.pdf');
              }catch(HTML2PDF_exception $e){
                echo $e;
              }
  }

}

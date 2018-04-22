<?php
Class Reporte
{
  public  static function canje_dia($paciente,$fecha,$hora,$sintomas,$durante="1 dia",$fecha2="1",$doctor)
  {
     $pdf = new FPDF();
	 $pdf->AddPage();
	 $pdf->Image(base_url('media/imagenes/escudo1.png'), 10, 5, 15, 15, 'PNG');
	 $pdf->SetFont('Arial', 'B', 12);
	 
	 $pdf->Cell(170, 9, 'UNIVERSIDAD TÉCNICA DE MANABÍ', '', 0, 'C');
	 $pdf->Ln(5); 
	 $pdf->SetFont('Arial', '', 12);
	 $pdf->Cell(170, 9, 'Unidad de Bienestar Estudiantil', '', 0, 'C');
	 $pdf->Ln(10); 
	 $pdf->SetFont('Arial', '', 12);
	  $pdf->SetFont('Arial', 'B', 12);
	 $pdf->Cell(170, 9, 'CERTIFICADO', '', 0, 'C');
	 $pdf->Ln(12); 
	 $pdf->SetFont('Arial', '', 11);
	 $pdf->Cell(25, 9, "Que el Sr(a).: $paciente ", '', 0, 'L');
	 $pdf->Ln(10); 
	 $pdf->MultiCell(190, 5, "Fue atendido con el Diágnostico de :  $sintomas", 0, 'L');
	 $pdf->Ln();
	 $pdf->Cell(90, 9, "Motivo por el cual debe guardar reposo durante : $durante", '', 0, 'L');
	 $pdf->Ln(); 
	 $pdf->Cell(80, 9, "A partir : $fecha2", '', 0, 'L');
	 $pdf->Ln(10);
	 $pdf->MultiCell(190, 8, "Portoviejo, ".date("d/m/Y"), 0, 'J');
	 $pdf->Ln(20);
	 $pdf->Cell(170, 9, 'DR.'.$doctor, '', 0, 'C');
	 $pdf->Output();
  }
  
  public  static function canje_hora($paciente,$fecha,$hora1,$hora2,$doctor)
  {
     $pdf = new FPDF();
	 $pdf->AddPage();
	 $pdf->Image(base_url('media/imagenes/escudo1.png'), 10, 5, 15, 15, 'PNG');
	 $pdf->SetFont('Arial', 'B', 12);
	 $pdf->Cell(170, 9, 'UNIVERSIDAD TÉCNICA DE MANABÍ', '', 0, 'C');
	 $pdf->Ln(5); 
	 $pdf->SetFont('Arial', '', 12);
	 $pdf->Cell(170, 9, 'DEPARTAMENDO DE BIENESTAR ESTUDIANTIL', '', 0, 'C');
	 $pdf->Ln(10); 
	 $pdf->SetFont('Arial', '', 12);
	 $pdf->SetFont('Arial', 'B', 12);
	 $pdf->Cell(170, 9, 'CERTIFICO', '', 0, 'C');
	 $pdf->Ln(12); 
	 $pdf->SetFont('Arial', '', 11);
	 $pdf->Cell(25, 9, 'QUE EL SR(A).:  ', '', 0, 'L');
	 $pdf->Ln();
	 $pdf->Cell(170, 9, $paciente, '', 0, 'L');
	 $pdf->Ln(); 
	 $pdf->SetFont('Arial', 'B', 11);
	 $pdf->Cell(20, 9, 'SE PRESENTO A CONSULTA MEDICA:', '', 0, 'L');
	 $pdf->Ln();
	 $pdf->SetFont('Arial', '', 11);
	 $pdf->MultiCell(190, 5, "EL DÍA: ".date('d/m/Y'), 0, 'J');
	 $pdf->Ln(3);
	 $pdf->Cell(17, 9, "DESDE: ", '', 0, 'L');
	 $pdf->Cell(30, 9, $hora1, '', 0, 'L');
	 $pdf->Cell(17, 9, "HASTA", '', 0, 'L');
	 $pdf->Cell(30, 9, $hora2, '', 0, 'L');
	 $pdf->Ln(50);
	 $pdf->Cell(170, 9, 'DR.'.$doctor, '', 0, 'C');
	 $pdf->Output();
  }
  
   public  static function pacientes_atendidos($fdesde,$fhasta,$pacientes,$doctor)
   {
     $pdf = new FPDF();
	 $pdf->AddPage('');
	 $pdf->Image(base_url('media/imagenes/escudo1.png'), 10, 5, 15, 15, 'PNG');
	 $pdf->SetFont('Arial', 'B', 12);
	 $pdf->Cell(170, 5, 'Universidad Técnica de Manabí', '', 0, 'C');
	 $pdf->Ln(5); 
	 $pdf->SetFont('Arial', '', 12);
	 $pdf->Cell(170, 5, 'Unidad de Bienestar Estudiantil', '', 0, 'C');
	 $pdf->Ln(15); 	 
	 $pdf->SetFont('Arial', '', 11);
	 $pdf->Cell(20, 9, 'Doctor(a):', '', 0, 'L');
	 $pdf->Cell(170, 9, $doctor, '', 0, 'L');
	 $pdf->Ln(15); 
	 $pdf->Cell(170, 5, 'Reporte de Pacientes Atendidos', 1, 0, 'C');
	 $pdf->Ln();
	 $pdf->Cell(60, 5, 'Desde', 1, 0, 'C');
	 $pdf->Cell(60, 5, 'Hasta', 1, 0, 'C');
	 $pdf->Cell(50, 5, 'Pacientes Atendidos', 1, 0, 'C'); 
	 $pdf->Ln();
	 $pdf->Cell(60, 5, $fdesde, 1, 0, 'C');
	 $pdf->Cell(60, 5, $fhasta, 1, 0, 'C');
	 $pdf->Cell(50, 5, $pacientes, 1, 0, 'C');
	 $pdf->Ln(15);
	 $pdf->Output();
  }
   
  public static function lista_atendidos($lista,$f1="",$f2="")
  {
     $pdf = new FPDF();
	 $pdf->AddPage('L');
	 $pdf->Image(base_url('media/imagenes/escudo1.png'), 10, 5, 15, 15, 'PNG');
	 $pdf->SetFont('Arial', 'B', 12);
	 $pdf->Cell(280, 5, 'Universidad Técnica de Manabí', 0, 0, 'C');
	 $pdf->Ln(5); 
	 $pdf->SetFont('Arial', '', 12);
	 $pdf->Cell(280, 5, 'Unidad de Bienestar Estudiantil', '', 0, 'C');
	 $pdf->Ln(10); 
	 $pdf->Cell(280, 5, 'REGISTRO DIARIO DE ACTIVIDADES DEL ÁREA DE ADMISIÓN Y ARCHIVO', '', 0, 'C');
	  $pdf->Ln(6); 
	 $pdf->Cell(280, 5, "DEL: $f1 AL $f2", '', 0, 'C');
	 $pdf->Ln(8); 
	 $pdf->SetFont('Arial', '', 9);	 
	 $pdf->Cell(10, 5, 'C.', 1, 0, 'C');
	 $pdf->Cell(20, 5, 'HISTORIA', 1, 0, 'C');
	 $pdf->Cell(40, 5, 'ESPECIALIDAD', 1, 0, 'C');
	 $pdf->Cell(80, 5, 'MÉDICO', 1, 0, 'C');
	 $pdf->Cell(20, 5, 'FECHA', 1, 0, 'C');
	 $pdf->Cell(20, 5, 'HORA', 1, 0, 'C');
	 $pdf->Cell(70, 5, 'ESTUDIANTE', 1, 0, 'C');
	 $pdf->Cell(20, 5, 'CÉDULA', 1, 0, 'C');
	 $pdf->Ln();
	 foreach($lista as $l)
	 {
	  $pdf->Cell(10, 5, $l->n, 1, 0, 'C');
	  $pdf->Cell(20, 5, $l->numhistoria, 1, 0, 'C');
	  $pdf->Cell(40, 5, $l->descripcion, 1, 0, 'C');
	  $pdf->Cell(80, 5, $l->medico, 1, 0, 'C');
	  $pdf->Cell(20, 5, $l->fecha, 1, 0, 'C');
	  $pdf->Cell(20, 5, $l->hora, 1, 0, 'C');
	  $pdf->Cell(70, 5, $l->paciente, 1, 0, 'C');
	  $pdf->Cell(20, 5, $l->cedula, 1, 0, 'C');
	  $pdf->Ln(); 
	 }
	 
     $pdf->Output();
  
  }
}
?>
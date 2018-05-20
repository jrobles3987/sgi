<?php
/**
* 
*/
class Equipo extends CI_Controller
{
	public function GuardarEquiposComputador()
	{
		if ($this->input->is_ajax_request()) {
			$data = array(
				'idtipobien'		=> $this->input->post('idtipobien'),
				'idfamiliabien'		=> $this->input->post('idfamiliabien'),		
				'idsubfamiliabien'	=> $this->input->post('idsubfamiliabien'),
				'fechacompra'		=> $this->input->post('fechacompra'),
				'valorcompra'		=> $this->input->post('valorcompra'),
				'garantia'			=> $this->input->post('garantia'),
				'vidautil'			=> $this->input->post('vidautil'),
				'idpersonacustodio'	=> $this->input->post('idpersonacustodio'),
				'codinventario'		=> $this->input->post('codinventario'),
				'codequipo'			=> $this->input->post('codequipo'),
				'descripcion'		=> $this->input->post('descripcion'),
				'observacion'		=> $this->input->post('observacion'),
				'idlocalizacion'	=> $this->input->post('idlocalizacion'),
				'vidautiltiempo'	=> $this->input->post('vidautiltiempo'),
				'garantiatiempo'	=> $this->input->post('garantiatiempo')
			);

			if ($data) {
				$this->load->model('equipos');
				$modelos = $this->equipos->setIngresarEquiposComputadores($data);				
				$data= array(
					"res" => $modelos->f_ingreso_equipos_computador
				);				
			}else{
				show_404();
			}	

			echo json_encode($data);
		}else{
			show_404();
		}
	}

	public function DardeBajaEquipos()
	{
		if ($this->input->is_ajax_request()) {
			$IdEquipo	= $this->input->post('idEquipo');		
			$this->load->model('equipos');
			$modelos = $this->equipos->setDardeBajaEquipos($IdEquipo);				
			echo json_encode($modelos);
		}else{
			show_404();
		}
	}

	public function GuardarSistemas()
	{
		if ($this->input->is_ajax_request()) {
			$data = array(
				'idtipobien'		=> $this->input->post('idtipobien'),
				'idfamiliabien'		=> $this->input->post('idfamiliabien'),
				'fechaingreso'		=> $this->input->post('fechaingreso'),
				'idlocalizacion'	=> $this->input->post('idlocalizacion'),
				'descripcion'		=> $this->input->post('descripcion'),
				'codigosistema'		=> $this->input->post('codigosistema')
			);

			if ($data) {
				$this->load->model('equipos');
				$modelos = $this->equipos->setIngresarSistemas($data);				
				$data= array(
					"res" => $modelos->f_ingreso_sistemas
				);			
			}else{
				show_404();
			}	

			echo json_encode($data);
		}else{
			show_404();
		}
	}

	public function SubirEquiposArchivos()
	{
		$estado = true;
		$usuario = $this->session->userdata('user');
		$this->load->model('equipos');
		$modelos = $this->equipos->setBorrarEquiposSubidaArchivo($usuario);
		$this->load->model('equipos');
		if ($_FILES['csv']['size'] > 0) {
			$csv = $_FILES['csv']['tmp_name'];
			$handle = fopen($csv,'r');
			while ($data = fgetcsv($handle,10000,",","'")){
				if ($data[0]) { 					
					$data= array(
						"nombreproducto" => $data[0],
						"marca" => $data[1],
						"modelo" => $data[2],
						"fechaingreso" => $data[3],
						"descripcion" => $data[4],
						"codigoequipo" => $data[5],
						"codigoinventario" => $data[6],
						"usuario" => $usuario,
						"fechacompra" => $data[7],
						"garantia" => $data[8],
						"vidautil" => $data[9],
						"pvpcompra" => $data[10],
						"revalorizacion" => $data[11]
					);
					//echo json_encode($data);
					$modelos = $this->equipos->setIngresarEquiposSubidaArchivo($data);
					if ($modelos==false && $estado==true){
						$estado = false;
					}
				}
			}
			if ($estado == true) {
				echo 'OK';
			}else{
				echo 'FALSE';
			}
			
		}else{
			echo 'FALSE';
		}
	}

	public function TablaEquiposSubidosTemp()
	{
		$num = 0;
		$usuario = $this->session->userdata('user');
		$this->load->model('equipos');
		$equipos = $this->equipos->getEquiposSubidosTemp($usuario);

		echo '<TABLE class="table table-hover">';
		echo '<THEAD>';
		echo '<TR><TH>N°</TH><TH>Nombre</TH><TH>Marca</TH><TH>Modelo</TH><TH>Fecha de ingreso</TH><TH>Descripcion</TH><TH>Código de equipo</TH><TH>Código de Inventario</TH><TH>Fecha de Compra</TH><TH>Garantia</TH><TH>Vida Util</TH><TH>PVP compra</TH><TH>Revalorización</TH></TR>';
		echo '</THEAD>';
		echo '<TBODY>';
		foreach ($equipos as $fila) {
			$num++;
			echo '<TR><TD>'.$num.'</TD><TD>'.$fila->nombreproducto.'</TD><TD>'.$fila->marca.'</TD><TD>'.$fila->modelo.'</TD><TD>'.$fila->fechaingreso.'</TD><TD>'.$fila->descripcion.'</TD><TD>'.$fila->codigoequip.'</TD><TD>'.$fila->codigoinvent.'</TD><TD>'.$fila->fechacompra.'</TD><TD>'.$fila->garantia.'</TD><TD>'.$fila->vidautil.'</TD><TD>'.$fila->pvpcompra.'</TD><TD>'.$fila->revalorizacion.'</TD></TR>';
		}
		echo '</TBODY>';
		echo '</TABLE>';
	}

	public function ReDibujaTablaEquiposDeBaja()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('equipos');
			$lista_equipos = $this->equipos->getListarEquiposDarbaja();
			echo '<TABLE id="tablaequipos" class="table table-striped table-bordered table-hover">';
					echo '<THEAD>';
					echo '<TR><TH>N°</TH><TH>Descripción</TH><TH>Codigo Equipo</TH><TH>Codigo Inventario</TH><TH>Garantia</TH><TH>Valor compra</TH><TH>Fecha Compra</TH><TH>Fecha Ingreso</TH><TH>Estado</TH><TH>Acción</TH></TR>';
					echo '</THEAD>';
					echo '<TBODY>';
					$num=0;
					if($lista_equipos){
						foreach ($lista_equipos as $fila) {
							$num++;
							echo '<TR id="'.$fila->idequipo.'"><TD>'.$num.'</TD><TD>'.$fila->descripcion.'</TD><TD>'.$fila->codigoequipo.'</TD><TD>'.$fila->codinventario.'</TD><TD>'.$fila->garantia.'</TD><TD>'.$fila->valorcompra.'</TD>
							<TD>'.$fila->fechacompra.'</TD><TD>'.$fila->fechaingreso.'</TD><TD>'.$fila->estado_equipo.'</TD><TD><div onclick="Dardebajaequipo('.$fila->idequipo.')"><a class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-cloud-download"></span> Dar de Baja</a></div></TD></TR>';
						}
					}
					echo '</TBODY>';
			echo '</TABLE>';
		}else{
			show_404();
		}
	}

	public function index()
	{
		echo gethostbyname();
	}
	
}
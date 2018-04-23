<?php
/**
*
*/
class Equipo extends CI_Controller
{
	public function GuardarEquipos()
	{
		if ($this->input->is_ajax_request()) {
			$data = array(
				'nombreequipo'		=> $this->input->post('nombreequipo'),
				'idmarca'			=> $this->input->post('idmarca'),
				'idmodelo'			=> $this->input->post('idmodelo'),
				'idtipobien'		=> $this->input->post('idtipobien'),
				'idfamiliabien'		=> $this->input->post('idfamiliabien'),
				'idsubfamiliabien'	=> $this->input->post('idsubfamiliabien'),
				'fechaingreso'		=> $this->input->post('fechaingreso'),
				'descripcion'		=> $this->input->post('descripcion'),
				'codigoequipo'		=> $this->input->post('codigoequipo'),
				'codigoinventario'	=> $this->input->post('codigoinventario'),
				'idlugarequipo'		=> $this->input->post('idlugarequipo')
			);

			if ($data) {
				$this->load->model('equipos');
				$modelos = $this->equipos->setIngresarEquipos($data);

				$data= array(
					"res" => $modelos->f_ingreso_equipos
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
	public function index()
	{
		echo gethostbyname();
	}
}

<?php
/**
* 
*/
class Menu extends CI_Controller
{	
	public function __construct() {
	    parent::__construct();
	    header("Expires: Thu, 19 Nov 1981 08:52:00 GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
	  }
	public function index()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$this->load->model('usuarios');
			$data = array(
				'contenido' => 'menuinicio',
				'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
				'incidencia_estados' => $this->incidencia->getlistarestado(),
				'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
				'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistema()
			); //menuinicio.php
			$this->load->view('menu.php',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function IngresoEquipos()
	{	
		if ($this->session->userdata('login')==TRUE) {
			
			$this->load->model('tiposbienes');
			$this->load->model('marcas');
			//$data['tiposbienes'] = $this->tiposbienes->getListarTiposBienes();
			$data = array('contenido' => 'menuingresoequipos', 'tiposbienes' => $this->tiposbienes->getListarTiposBienesEquipos(),
						'marcas' => $this->marcas->getListarMarcas());
			$this->load->view('menu.php',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function IngresoEquiposExcel()
	{	
		if ($this->session->userdata('login')==TRUE) {
			
			$data = array('contenido' => 'menuingresoequiposlote');
			$this->load->view('menu.php',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function IngresoSistemas()
	{	
		if ($this->session->userdata('login')==TRUE) {
			
			$this->load->model('tiposbienes');
			//$data['tiposbienes'] = $this->tiposbienes->getListarTiposBienes();
			$data = array('contenido' => 'menuingresosistemas', 'tiposbienes' => $this->tiposbienes->getListarTiposBienesSistemas());
			$this->load->view('menu.php',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function Incidentes()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$data = array('contenido' => 'menuincidentes', 'incidentes'=>$this->incidencia->getlistartabla());
			$this->load->view('menu.php',$data);
		}else{
			$this->load->view('login');
		}
	}
	
	public function ingresonuevaincidencia()
	{	
		
		if ($this->session->userdata('login')==TRUE) {
			
			$this->load->model('incidencia');
			$this->load->model('usuarios');
			$data = array(
				'contenido'   => 'menuincidentesnuevos.php',
				'fuentetipo'  => $this->incidencia->getlistarfuenteincidencia(),
				'inciestados' => $this->incidencia->getlistarestado(),
				'necesidades' => $this->incidencia->getlistarnecesidades(),
				'categorias'  => $this->incidencia->getlistarcategorias(),
				'tecnicos'    => $this->usuarios->getListarUsuariosSistema()
			);			
			$this->load->view('menu.php',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function Reportes()
	{	
		if ($this->session->userdata('login')==TRUE) {
			
			$data = array('contenido' => 'reportes/reporte-encidencia');
			$this->load->view('menu.php',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function UsuariosSistema()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('usuarios');
			$data = array('contenido' => 'menuusuariossistema', 'usuarios'=>$this->usuarios->getUsuariosSistema());
			$this->load->view('menu.php',$data);
		}else{
			$this->load->view('login');
		}
	}


}
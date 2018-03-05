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
			if ( $this->session->userdata('rol')!=0 ) {
				$this->load->model('incidencia');
				$this->load->model('usuarios');
				$data = array(
					'contenido' => 'menuinicio',
					'incidentes'=>$this->incidencia->getlistartabla(),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('Técnico'),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()
				);
				$this->load->view('menu',$data);
			}else{
				$this->load->view('menu2');
			}
		}else{
			$this->load->view('login');
		}
	}

	public function IngresoEquipos()
	{	
		if ($this->session->userdata('login')==TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {			
				$this->load->model('tiposbienes');
				$this->load->model('marcas');
				$this->load->model('incidencia');
				$this->load->model('usuarios');		
				$data = array(
					'contenido' => 'equipos/menuingresoequipos',
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('Técnico'),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias(),
					'tiposbienes' => $this->tiposbienes->getListarTiposBienesEquipos(),
					'marcas' => $this->marcas->getListarMarcas()
				);
				$this->load->view('menu',$data);
			}else{
				$this->load->view('menu2',$data);
			}
		}else{
			$this->load->view('login');
		}
	}

	public function IngresoEquiposExcel()
	{	
		if ($this->session->userdata('login')==TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {	
				$this->load->model('incidencia');
				$this->load->model('usuarios');		
				$data = array(
					'contenido' => 'equipos/menuingresoequiposlote',
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('Técnico'),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()
				);
				$this->load->view('menu',$data);
			}else{
				$this->load->view('menu2',$data);
			}
		}else{
			$this->load->view('login');
		}
	}

	public function IngresoSistemas()
	{	
		if ($this->session->userdata('login')==TRUE) {			
			if ( $this->session->userdata('rol')!=0 ) {	
				$this->load->model('tiposbienes');
				$this->load->model('incidencia');
				$this->load->model('usuarios');
				$data = array(
					'contenido' => 'equipos/menuingresosistemas', 
					'tiposbienes' => $this->tiposbienes->getListarTiposBienesSistemas(),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('Técnico'),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()
				);
				$this->load->view('menu',$data);
			}else{
				$this->load->view('menu2',$data);
			}
		}else{
			$this->load->view('login');
		}
	}

	public function Incidentes()
	{
		if ($this->session->userdata('login')==TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {	
				$this->load->model('incidencia');
				$this->load->model('usuarios');
				$data = array(
					'contenido' => 'incidencias/menuincidentes', 
					'incidentes'=>$this->incidencia->getlistartabla(),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('Técnico'),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()
				);
				$this->load->view('menu',$data);
			}else{
				$this->load->view('menu2',$data);
			}
		}else{
			$this->load->view('login');
		}
	}
	
	public function ingresonuevaincidencia()
	{	
		
		if ($this->session->userdata('login')==TRUE) {			
			if ( $this->session->userdata('rol')!=0 ) {	
				$this->load->model('incidencia');
				$this->load->model('usuarios');
				$data = array(
					'contenido'   => 'incidencias/menuincidentesnuevos',
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('Técnico'),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()
				);			
				$this->load->view('menu',$data);
			}else{
				$this->load->view('menu2',$data);
			}
		}else{
			$this->load->view('login');
		}
	}

	public function Reportes()
	{	
		if ($this->session->userdata('login')==TRUE) {			
			if ( $this->session->userdata('rol')!=0 ) {	
				$this->load->model('incidencia');
				$this->load->model('usuarios');
				$data = array(
					'contenido' => 'reportes/reporte-incidencia',
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('Técnico'),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()
				);
				$this->load->view('menu',$data);
			}else{
				$this->load->view('menu2',$data);
			}
		}else{
			$this->load->view('login');
		}
	}


	public function UsuariosSistema()
	{
		if ($this->session->userdata('login')==TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {	
				$this->load->model('incidencia');
				$this->load->model('usuarios');
				$data = array(
					'contenido' => 'usuarios/menuusuariossistema', 
					'usuarios'=>$this->usuarios->getUsuariosSistema(),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('Técnico'),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()
				);
				$this->load->view('menu',$data);
			}else{
				$this->load->view('menu2',$data);
			}
		}else{
			$this->load->view('login');
		}
	}


}
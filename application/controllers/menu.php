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
			$this->load->model('localizacion');
			if ( $this->session->userdata('rol')!=0 ) {
				$data = array(
					'contenido' => 'menuinicio',
					'incidentes'=>$this->incidencia->getlistartabla(),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias(),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion()
				);
				$this->load->view('menu',$data);
			}else{
				$data = array(
					'contenido' => 'menuinicio2',
					'incidentes'=>$this->incidencia->getListartablaUsuarioNormal($this->session->userdata('idusuario')),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias(),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion()
				);
				$this->load->view('menu2',$data);
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
				$this->load->model('localizacion');
				$data = array(
					'contenido' => 'equipos/menuingresoequipos',
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias(),
					'tiposbienes' => $this->tiposbienes->getListarTiposBienesEquipos(),
					'marcas' => $this->marcas->getListarMarcas(),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion()
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
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
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
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
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
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias(),
					'tecnicos'  => $this->incidencia->getlistarpersonal()
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
			$this->load->model('incidencia');
			$this->load->model('usuarios');
			$this->load->model('localizacion');
			if ( $this->session->userdata('rol')!=0 ) {
				$data = array(
					'contenido'   => 'incidencias/menuincidentesnuevos',
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion(),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()
				);
				$this->load->view('menu',$data);
			}else{
				$data = array(
					'contenido'   => 'vistas_normal/menuincidentesnuevos',
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion(),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()
				);
				$this->load->view('menu2',$data);
			}
		}else{
			$this->load->view('login');
		}
	}
///REPORTE DE EQUIPO
	public function Reportes_equipo()
	{
		if ($this->session->userdata('login')==TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {
				$this->load->model('incidencia');
				$this->load->model('usuarios');
				$this->load->model('localizacion');
				$data = array(
					'contenido' => 'reportes/reporte-equipos',
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
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
///REPORTE DE INCIDENCIA
	public function Reportes_incidencia()
	{
		if ($this->session->userdata('login')==TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {
				$this->load->model('incidencia');
				$this->load->model('usuarios');
				$this->load->model('localizacion');
				$data = array(
					'contenido' => 'reportes/reporte-incidencia',
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
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
				$this->load->model('localizacion');
				$data = array(
					'contenido' => 'usuarios/menuusuariossistema',
					'usuarios'=>$this->usuarios->getUsuariosSistema(),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
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


	public function Estadisticas_Incidencias()
	{
		if ($this->session->userdata('login')==TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {
				$this->load->model('incidencia');
				$this->load->model('usuarios');
				$this->load->model('localizacion');
				$data = array(
					'contenido' => 'usuarios/menuusuariossistema',
					'usuarios'=>$this->usuarios->getUsuariosSistema(),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()
				);
				$this->load->view('menu',$data);
			}else{
				$data = array(
					'contenido' => 'vistas_normal/menuestadisticas'
				);
				$this->load->view('menu2',$data);
			}
		}else{
			$this->load->view('login');
		}
	}


	public function Calificacion_Incidencias()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$this->load->model('localizacion');
			$this->load->model('usuarios');
			if ( $this->session->userdata('rol')!=0 ) {
				$data = array(
					'contenido' => 'usuarios/menuusuariossistema',
					'usuarios'=>$this->usuarios->getUsuariosSistema(),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion(),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()
				);
				$this->load->view('menu',$data);
			}else{
				$data = array(
					'contenido' => 'vistas_normal/menuincidentescalificacion',
					'incidentes'=>$this->incidencia->getListartablaUsuarioNormal($this->session->userdata('idusuario')),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion(),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()
				);
				$this->load->view('menu2',$data);
			}
		}else{
			$this->load->view('login');
		}
	}

	public function Estados_Incidencias()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$this->load->model('localizacion');
			$this->load->model('usuarios');
			if ( $this->session->userdata('rol')!=0 ) {
				$data = array(
					'contenido' => 'configuracion/menuestadosincidencias',
					'usuarios'=>$this->usuarios->getUsuariosSistema(),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion(),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias(),
					'tecnicos'  => $this->incidencia->getlistarpersonal()
				);
				$this->load->view('menu',$data);
			}else{
				$data = array(
					'contenido' => 'menuinicio2',
					'incidentes'=>$this->incidencia->getListartablaUsuarioNormal($this->session->userdata('idusuario')),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion(),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()
				);
				$this->load->view('menu2',$data);
			}
		}else{
			$this->load->view('login');
		}

	}

	public function Planificaciones()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$this->load->model('localizacion');
			$this->load->model('usuarios');
			if ( $this->session->userdata('rol')!=0 ) {
				$data = array(
					'contenido' => 'incidencias/menuplanificaciones',
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion(),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()

				);
				$this->load->view('menu',$data);
			}else{
				$data = array(
					'contenido' => 'menuinicio2',
					'incidentes'=>$this->incidencia->getListartablaUsuarioNormal($this->session->userdata('idusuario')),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion(),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias()
				);
				$this->load->view('menu2',$data);
			}
		}else{
			$this->load->view('login');
		}

	}


	public function Fuente_Incidencia()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$this->load->model('localizacion');
			$this->load->model('usuarios');
			if ( $this->session->userdata('rol')!=0 ) {
				$data = array(
					'contenido' => 'configuracion/menufuentesincidencias',
					'usuarios'=>$this->usuarios->getUsuariosSistema(),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion(),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias(),
					'tecnicos'  => $this->incidencia->getlistarpersonal()

				);
				$this->load->view('menu',$data);
			}
		}else{
			$this->load->view('login');
		}

	}


	public function marca_equipos()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$this->load->model('localizacion');
			$this->load->model('usuarios');
			if ( $this->session->userdata('rol')!=0 ) {
				$data = array(
					'contenido' => 'configuracion/menumarcaequipos',
					'usuarios'=>$this->usuarios->getUsuariosSistema(),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion(),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias(),
					'tecnicos'  => $this->incidencia->getlistarpersonal(),
					'listar_marcas'  => $this->incidencia->getlistarmarcas()

				);
				$this->load->view('menu',$data);
			}
		}else{
			$this->load->view('login');
		}

	}

}

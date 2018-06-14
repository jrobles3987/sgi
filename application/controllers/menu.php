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
	  
	private function MuestraVista( $DataAdicional, $Contenido, $Menu){
		$this->load->model('incidencia');
		$this->load->model('usuarios');
		$this->load->model('localizacion');
		
		$DataPublic = array(
			'contenido' => $Contenido,
			'incidentes_todos'=>$this->incidencia->getlistartabla(),
			'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
			'incidencia_estados' => $this->incidencia->getlistarestado(),
			'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
			'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
			'incidencias_categorias'  => $this->incidencia->getlistarcategorias(),
			'incidencia_localizacion' => $this->localizacion->getLocalizacion()
		);
		$data = array_merge($DataPublic, $DataAdicional);
		$this->load->view($Menu, $data);
	}

	public function index()
	{	
		$data = array();
		$menu = '';
		$contenido = '';
		$this->load->model('incidencia');
		if ($this->session->userdata('login') == TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {
				if ( $this->session->userdata('rol') == 1 ){
					$menu = 'menu';
					$contenido = 'menuinicio';
				}
				if ( $this->session->userdata('rol') == 2 ){
					$data = array(
						'incidentes'=>$this->incidencia->GetListarTablaTecnico($this->session->userdata('idusuario'))
					);
					$menu = 'menutecnico';
					$contenido = 'menuinicio3';
				}
				if ( $this->session->userdata('rol') == 3 ){
					$menu = 'menusupervisor';
					$contenido = 'menuinicio';
				}
				$this->MuestraVista($data, $contenido, $menu);
			}else{
				$data = array(
					'incidentes'=>$this->incidencia->GetListarTablaNormal($this->session->userdata('idusuario'))
				);
				$this->MuestraVista($data, 'menuinicio2', 'menu2');
			}
		}else{
			$this->load->view('login');
		}
	}	

	public function IngresoEquipos(){
		$data = array();
		$menu = '';
		$contenido = '';
		$this->load->model('tiposbienes');
		$this->load->model('marcas');
		if ($this->session->userdata('login') == TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {
				if ( $this->session->userdata('rol') == 1 ){
					$menu = 'menu';
					$contenido = 'equipos/menuingresoequipos';
					$data = array(
						'tiposbienes' => $this->tiposbienes->getListarTiposBienesEquipos(),
						'marcas' => $this->marcas->getListarMarcas()
					);
				}
				if ( $this->session->userdata('rol') == 2 ){
					$menu = 'menutecnico';
					$contenido = 'equipos/menuingresoequipos';
					$data = array(
						'tiposbienes' => $this->tiposbienes->getListarTiposBienesEquipos(),
						'marcas' => $this->marcas->getListarMarcas()
					);
				}
				if ( $this->session->userdata('rol') == 3 ){
					$menu = 'menusupervisor';
					$contenido = 'equipos/menuingresoequipos';
					$data = array(
						'tiposbienes' => $this->tiposbienes->getListarTiposBienesEquipos(),
						'marcas' => $this->marcas->getListarMarcas()
					);
				}
				$this->MuestraVista($data, $contenido, $menu);
			}else{
				show_404();
			}
		}else{
			$this->load->view('login');
		}
	}

	public function IngresoEquiposExcel()
	{	
		$data = array();
		$menu = '';
		$contenido = '';
		$this->load->model('incidencia');
		if ($this->session->userdata('login')==TRUE) {			
			if ( $this->session->userdata('rol')!=0 ) {
				if ( $this->session->userdata('rol') == 1 ){
					$menu = 'menu';
					$contenido = 'equipos/menuingresoequiposlote';					
				}
				if ( $this->session->userdata('rol') == 2 ){
					$menu = 'menutecnico';
					$contenido = 'menuinicio3';
					$data = array(
						'incidentes'=>$this->incidencia->GetListarTablaTecnico($this->session->userdata('idusuario'))
					);
				}
				if ( $this->session->userdata('rol') == 3 ){
					$menu = 'menusupervisor';
					$contenido = 'equipos/menuingresoequiposlote';					
				}
				$this->MuestraVista($data, $contenido, $menu);
			}else{
				show_404();
			}
		}else{
			$this->load->view('login');
		}
	}

	public function IngresoSistemas()
	{	
		$data = array();
		$menu = '';
		$contenido = '';
		$this->load->model('tiposbienes');
		$this->load->model('incidencia');
		if ($this->session->userdata('login')==TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {
				if ( $this->session->userdata('rol') == 1 ){
					$menu = 'menu';
					$contenido = 'equipos/menuingresosistemas';
					$data = array(
						'tiposbienes' => $this->tiposbienes->getListarTiposBienesSistemas()
					);
				}
				if ( $this->session->userdata('rol') == 2 ){
					$menu = 'menutecnico';
					$contenido = 'menuinicio3';
					$data = array(
						'incidentes'=>$this->incidencia->GetListarTablaTecnico($this->session->userdata('idusuario'))
					);
				}
				if ( $this->session->userdata('rol') == 3 ){
					$menu = 'menusupervisor';
					$contenido = 'equipos/menuingresosistemas';
					$data = array(
						'tiposbienes' => $this->tiposbienes->getListarTiposBienesSistemas()
					);				
				}
				$this->MuestraVista($data, $contenido, $menu);
			}else{
				show_404();
			}
		}else{
			$this->load->view('login');
		}
	}

	public function ListarIncidentes()
	{	
		$data = array();
		$menu = '';
		$contenido = '';
		$this->load->model('tiposbienes');
		$this->load->model('incidencia');
		if ($this->session->userdata('login')==TRUE) {			
			if ( $this->session->userdata('rol')!=0 ) {
				if ( $this->session->userdata('rol') == 1 ){
					$menu = 'menu';
					$contenido = 'incidencias/menuincidentes';					
				}
				if ( $this->session->userdata('rol') == 2 ){
					$menu = 'menutecnico';
					$contenido = 'incidencias/menuincidentes';					
				}
				if ( $this->session->userdata('rol') == 3 ){
					$menu = 'menusupervisor';
					$contenido = 'incidencias/menuincidentes';									
				}
				$this->MuestraVista($data, $contenido, $menu);
			}else{
				show_404();
			}
		}else{
			$this->load->view('login');
		}
	}

	public function ingresonuevaincidencia() {
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
				if ( $this->session->userdata('rol') == 1 ){
					$this->load->view('menu',$data);
				}
				if ( $this->session->userdata('rol') == 2 ){
					$this->load->view('menutecnico',$data);
				}
				if ( $this->session->userdata('rol') == 3 ){
					$this->load->view('menusupervisor',$data);
				}
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
		$data = array();
		$menu = '';
		$contenido = '';
		$this->load->model('tiposbienes');
		$this->load->model('incidencia');
		if ($this->session->userdata('login')==TRUE) {			
			if ( $this->session->userdata('rol')!=0 ) {
				if ( $this->session->userdata('rol') == 1 ){
					$menu = 'menu';
					$contenido = 'reportes/reporte-equipos';
				}
				if ( $this->session->userdata('rol') == 2 ){
					$menu = 'menutecnico';
					$contenido = 'reportes/reporte-equipos';
				}
				if ( $this->session->userdata('rol') == 3 ){
					$menu = 'menusupervisor';
					$contenido = 'reportes/reporte-equipos';
				}
				$this->MuestraVista($data, $contenido, $menu);
			}else{
				show_404();
			}
		}else{
			$this->load->view('login');
		}
	}

///REPORTE DE INCIDENCIA
	public function Reportes_incidencia()
	{
		$data = array();
		$menu = '';
		$contenido = '';
		$this->load->model('tiposbienes');
		$this->load->model('incidencia');
		if ($this->session->userdata('login')==TRUE) {			
			if ( $this->session->userdata('rol')!=0 ) {
				if ( $this->session->userdata('rol') == 1 ){
					$menu = 'menu';
					$contenido = 'reportes/reporte-incidencia';
				}
				if ( $this->session->userdata('rol') == 2 ){
					$menu = 'menutecnico';
					$contenido = 'reportes/reporte-incidencia';
				}
				if ( $this->session->userdata('rol') == 3 ){
					$menu = 'menusupervisor';
					$contenido = 'reportes/reporte-incidencia';
				}
				$this->MuestraVista($data, $contenido, $menu);
			}else{
				show_404();
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


	public function Estadisticas_IncidenciasEstados()
	{
		$data = array();
		$menu = '';
		$contenido = '';
		if ($this->session->userdata('login') == TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {
				if ( $this->session->userdata('rol') == 1 ){
					$menu = 'menu';
					$contenido = 'menuinicio';
				}
				if ( $this->session->userdata('rol') == 2 ){
					$menu = 'menutecnico';
					$contenido = 'menuinicio3';
				}
				if ( $this->session->userdata('rol') == 3 ){
					$menu = 'menusupervisor';
					$contenido = 'menuinicio';
				}
				$this->MuestraVista($data, $contenido, $menu);
			}else{
				$menu = 'menu2';
				$contenido = 'vistas_normal/menuestadisticasporestados';
				$this->MuestraVista($data, $contenido, $menu);
			}
		}else{
			$this->load->view('login');
		}
	}

	public function Estadisticas_IncidenciasUrgencia()
	{
		$data = array();
		$menu = '';
		$contenido = '';
		if ($this->session->userdata('login') == TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {
				if ( $this->session->userdata('rol') == 1 ){
					$menu = 'menu';
					$contenido = 'menuinicio';
				}
				if ( $this->session->userdata('rol') == 2 ){
					$menu = 'menutecnico';
					$contenido = 'menuinicio3';
				}
				if ( $this->session->userdata('rol') == 3 ){
					$menu = 'menusupervisor';
					$contenido = 'menuinicio';
				}
				$this->MuestraVista($data, $contenido, $menu);
			}else{
				$menu = 'menu2';
				$contenido = 'vistas_normal/menuestadisticasporUrgencia';
				$this->MuestraVista($data, $contenido, $menu);
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
		$data = array();
		$menu = '';
		$contenido = '';
		if ($this->session->userdata('login') == TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {
				if ( $this->session->userdata('rol') == 1 ){
					$menu = 'menu';
					$contenido = 'incidencias/menuplanificaciones';
				}
				if ( $this->session->userdata('rol') == 2 ){
					$menu = 'menutecnico';
					$contenido = 'incidencias/menuplanificaciones';
				}
				if ( $this->session->userdata('rol') == 3 ){
					$menu = 'menusupervisor';
					$contenido = 'incidencias/menuplanificaciones';
				}
				$this->MuestraVista($data, $contenido, $menu);
			}else{
				show_404();
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

	public function darbajaequipos()
	{
		$data = array();
		$menu = '';
		$contenido = '';
		$this->load->model('equipos');
		if ($this->session->userdata('login') == TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {
				if ( $this->session->userdata('rol') == 1 ){
					$menu = 'menu';
					$contenido = 'equipos/menudarbajaequipos';
					$data = array(
						'lista_equipos' => $this->equipos->getListarEquiposDarbaja()
					);
				}
				if ( $this->session->userdata('rol') == 2 ){
					$menu = 'menutecnico';
					$contenido = 'equipos/menudarbajaequipos';
					$data = array(
						'lista_equipos' => $this->equipos->getListarEquiposDarbaja()
					);
				}
				if ( $this->session->userdata('rol') == 3 ){
					$menu = 'menusupervisor';
					$contenido = 'equipos/menudarbajaequipos';
					$data = array(
						'lista_equipos' => $this->equipos->getListarEquiposDarbaja()
					);
				}
				$this->MuestraVista($data, $contenido, $menu);
			}else{
				show_404();
			}
		}else{
			$this->load->view('login');
		}
	}

	public function listadoequipos(){		
		$data = array();
		$menu = '';
		$contenido = '';
		$this->load->model('equipos');
		if ($this->session->userdata('login') == TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {
				if ( $this->session->userdata('rol') == 1 ){
					$menu = 'menu';
					$contenido = 'equipos/menulistarequipos';
					$data = array(
						'lista_equipos' => $this->equipos->getListarEquipos()
					);
				}
				if ( $this->session->userdata('rol') == 2 ){
					$menu = 'menutecnico';
					$contenido = 'equipos/menulistarequipos';
					$data = array(
						'lista_equipos' => $this->equipos->getListarEquipos()
					);
				}
				if ( $this->session->userdata('rol') == 3 ){
					$menu = 'menusupervisor';
					$contenido = 'equipos/menulistarequipos';
					$data = array(
						'lista_equipos' => $this->equipos->getListarEquipos()
					);
				}
				$this->MuestraVista($data, $contenido, $menu);
			}else{
				show_404();
			}
		}else{
			$this->load->view('login');
		}
	}

	public function listadoequiposdebaja(){
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$this->load->model('localizacion');
			$this->load->model('usuarios');
			$this->load->model('equipos');
			if ( $this->session->userdata('rol')!=0 ) {
				$data = array(
					'contenido' => 'equipos/menulistarequiposdebaja',
					'usuarios'=>$this->usuarios->getUsuariosSistema(),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion(),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias(),
					'tecnicos'  => $this->incidencia->getlistarpersonal(),
					'lista_equipos' => $this->equipos->getListarEquipos()

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

	public function marca_modelos()
	{
		if ($this->session->userdata('login')==TRUE) {
			$this->load->model('incidencia');
			$this->load->model('localizacion');
			$this->load->model('usuarios');
			if ( $this->session->userdata('rol')!=0 ) {
				$data = array(
					'contenido' => 'configuracion/menumarcamodelos',
					'usuarios'=>$this->usuarios->getUsuariosSistema(),
					'incidencia_fuente' => $this->incidencia->getlistarfuenteincidencia(),
					'incidencia_estados' => $this->incidencia->getlistarestado(),
					'incidencia_necesidades' => $this->incidencia->getlistarnecesidades(),
					'incidencia_tecnicos' => $this->usuarios->getListarUsuariosSistemaTipo('TÉCNICO'),
					'incidencia_localizacion' => $this->localizacion->getLocalizacion(),
					'incidencias_categorias'  => $this->incidencia->getlistarcategorias(),
					'tecnicos'  => $this->incidencia->getlistarpersonal(),
					'listar_marcas'  => $this->incidencia->getlistarmarcas(),
					'listar_modelos'  => $this->incidencia->getlistarmodelos()


				);
				$this->load->view('menu',$data);
			}
		}else{
			$this->load->view('login');
		}

	}

	public function Cambios_Incidencias(){	
		$data = array();
		$menu = '';
		$contenido = '';
		$this->load->model('incidencia');
		if ($this->session->userdata('login') == TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {
				if ( $this->session->userdata('rol') == 1 ){
					$menu = 'menu';
					$contenido = 'menuinicio';
				}
				if ( $this->session->userdata('rol') == 2 ){
					$menu = 'menutecnico';
					$contenido = 'menuinicio3';
				}
				if ( $this->session->userdata('rol') == 3 ){
					$menu = 'menusupervisor';
					$contenido = 'menuinicio';
				}
				$this->MuestraVista($data, $contenido, $menu);
			}else{
				$data = Array (
					'incidentes'=>$this->incidencia->GetListarTablaNormal($this->session->userdata('idusuario'))
				);		
				$this->MuestraVista($data, 'vistas_normal/menulistaincidenciasnormal', 'menu2');
			}
		}else{
			$this->load->view('login');
		}
	}

	public function listadosistemas(){	
		$data = array();
		$menu = '';
		$contenido = '';
		$this->load->model('equipos');
		if ($this->session->userdata('login') == TRUE) {
			if ( $this->session->userdata('rol')!=0 ) {
				if ( $this->session->userdata('rol') == 1 ){
					$menu = 'menu';
					$contenido = 'equipos/menulistarsistemas';
					$data = Array (
						'lista_sistemas'=>$this->equipos->getListarSistemas()
					);
				}
				if ( $this->session->userdata('rol') == 2 ){
					$menu = 'menutecnico';
					$contenido = 'equipos/menulistarsistemas';
					$data = Array (
						'lista_sistemas'=>$this->equipos->getListarSistemas()
					);
				}
				if ( $this->session->userdata('rol') == 3 ){
					$menu = 'menusupervisor';
					$contenido = 'equipos/menulistarsistemas';
					$data = Array (
						'lista_sistemas'=>$this->equipos->getListarSistemas()
					);
				}
				$this->MuestraVista($data, $contenido, $menu);
			}else{
				$data = Array (
					'incidentes'=>$this->incidencia->GetListarTablaNormal($this->session->userdata('idusuario'))
				);		
				$this->MuestraVista($data, 'menuinicio2', 'menu2');
			}
		}else{
			$this->load->view('login');
		}
	}

}

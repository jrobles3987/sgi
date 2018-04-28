<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$active_group = 'default';
$active_record = TRUE;

// Conexion a Base de datos del sistema SGI
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'administrador';
$db['default']['password'] = 'admin';
$db['default']['database'] = 'sistemasutm';
$db['default']['dbdriver'] = 'postgre';
$db['default']['port'] 	   = '5432';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf-8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

// Conexion a Base de datos de logueo de SGA
$db['usuarios']['hostname'] = 'localhost';
$db['usuarios']['username'] = 'postgres';
$db['usuarios']['password'] = 'admin';
$db['usuarios']['database'] = 'db_sgacnx';
$db['usuarios']['dbdriver'] = 'postgre';
$db['usuarios']['port'] 	= '5432';
$db['usuarios']['dbprefix'] = '';
$db['usuarios']['pconnect'] = TRUE;
$db['usuarios']['db_debug'] = TRUE;
$db['usuarios']['cache_on'] = FALSE;
$db['usuarios']['cachedir'] = '';
$db['usuarios']['char_set'] = 'utf8';
$db['usuarios']['dbcollat'] = 'utf8_general_ci';
$db['usuarios']['swap_pre'] = '';
$db['usuarios']['autoinit'] = TRUE;
$db['usuarios']['stricton'] = FALSE;

// Conexion a Base de datos del personal del sistema SGA
$db['personal']['hostname'] = 'localhost';
$db['personal']['username'] = 'postgres';
$db['personal']['password'] = 'admin';
$db['personal']['database'] = 'dba_sga';
$db['personal']['dbdriver'] = 'postgre';
$db['personal']['port']     = '5432';
$db['personal']['dbprefix'] = '';
$db['personal']['pconnect'] = TRUE;
$db['personal']['db_debug'] = TRUE;
$db['personal']['cache_on'] = FALSE;
$db['personal']['cachedir'] = '';
$db['personal']['char_set'] = 'utf8';
$db['personal']['dbcollat'] = 'utf8_general_ci';
$db['personal']['swap_pre'] = '';
$db['personal']['autoinit'] = TRUE;
$db['personal']['stricton'] = FALSE;

/* End of file database.php */
/* Location: ./application/config/database.php */

<?php
/**
*
*/

class Enviamail extends CI_Controller
{
    public function EnviaCorreoIncidencias ($nombrePersonal, $emailPersonal, $asunto, $mensaje) {
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => '',
            'smtp_port' => 25,
            'smtp_user' => '',
            'smtp_pass' => '',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            'wordwrap'  => TRUE
        );

        $this->load->library("email");
        //$this->email->initialize($config);
        $this->email->from('support.sgi@utm.edu.ec','Soporte');
        $this->email->to('jonathanroblesc@hotmail.com');
        $this->email->subject('Prueba de envio de correo');
        $this->email->message('Probando el envio de mensajes de correos electronicos...');

        if($this->email->send()){
            echo "correo enviado";
        }else{
            echo $this->email->print_debugger();
        }
    }
}
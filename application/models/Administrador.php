<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Model {

	private $nombreUsuario;
	private $contrasena;

	
	public function validar_login($usuario,$password) {

		$errores = [];
		if ($usuario == null) {
			$errores[] = 'El usuario no puede ser vacío';
		}

		if ($password== null) {
			$errores[] = 'La contraseña no puede ser vacío';
		}
		if (empty($errores)) {
			
			$this->db->where('nombreUsuario',$usuario);
			$this->db->where('contrasena',$password);			
			$row=$this->db->get('administrador');

			if ($row->num_rows()==1) {

				$data = array('username' => $usuario,
							   'tipo' => 'administradortotal',
							'is_logged_in' => TRUE,
						);

				$this->session->set_userdata('ci_session',$data);

				return TRUE;
				
			}else{

				return FALSE;
			}

		} else {
			return $errores;
		}

	}

}

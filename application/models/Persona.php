<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Model {

	private $nombre;
	private $apellido;
	private $tipoDocumento;
	private $numeroDocumento;
	private $fechaNacimiento;
	private $email;
	private $direccion;
	private $telefono;
	private $celular;
	private $nombreUsuario;
	private $tipoUsuario;
	private $contrasena;
	private $contrasena2;

	public function __construct($value = null,$tipo = 0) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');   

			if (is_object($value)) {       
				$this->nombre = isset($value->nombre)? $value->nombre : null; 
				$this->apellido = isset($value->apellido)? $value->apellido : null;
				$this->tipoDocumento = isset($value->tipoDocumento)? $value->tipoDocumento : null;
				$this->numeroDocumento = isset($value->numeroDocumento)? $value->numeroDocumento : null;
				$this->fechaNacimiento = isset($value->fechaNacimiento)? $value->fechaNacimiento : null;
				$this->email = isset($value->email)? $value->email: null;
				$this->direccion = isset($value->direccion)? $value->direccion : null;
				$this->telefono = isset($value->telefono)? $value->telefono : null;
				$this->celular = isset($value->celular)? $value->celular : null;
				$this->nombreUsuario = isset($value->nombreUsuario) ? $value->nombreUsuario : null;
				$this->contrasena = isset($value->contrasena) ? $value->contrasena : null;
				$this->contrasena2 = isset($value->contrasena2) ? $value->contrasena2 : null;
				
				if ($tipo == 1) {
					$this->tipoUsuario = 'usuario';					
				}elseif ($tipo == 2) {
					$this->tipoUsuario = 'administradorsede';
				}
				
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'nombre':
			case 'apellido':
			case 'tipoDocumento':
			case 'numeroDocumento':
			case 'fechaNacimiento':
			case 'email':
			case 'direccion':
			case 'telefono':
			case 'celular':
			case 'nombreUsuario':
			case 'contrasena':
			case 'contrasena2':
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}

	public function validar() {

		$this->form_validation->set_rules('nombre','Nombre','required|alpha');
		$this->form_validation->set_rules('apellido','Apellido','required|alpha');
		$this->form_validation->set_rules('tipoDocumento','Tipo de documento','required|callback_select_validar');	
		$this->form_validation->set_rules('numeroDocumento','Numero de documento','required|is_natural_no_zero');
		$this->form_validation->set_rules('fechaNacimiento','Fecha de nacimiento','required|callback_validarFecha');	
		$this->form_validation->set_rules('email','Correo electronico','required|valid_email');
		$this->form_validation->set_rules('direccion','Direccion','required');
		$this->form_validation->set_rules('telefono','Telefono','required|is_natural_no_zero');
		$this->form_validation->set_rules('celular','Celular','required|is_natural_no_zero');	
		$this->form_validation->set_rules('nombreUsuario','Usuario','required|is_unique[persona.nombreUsuario]');
		$this->form_validation->set_rules('contrasena','Contraseña','required');	
		$this->form_validation->set_rules('contrasena2','Repita la contraseña','required');		

	}
	public function registrar() {

		$data = [
			'nombre' => $this->nombre,
			'apellido' => $this->apellido,
			'tipoDocumento' => $this->tipoDocumento,
			'numeroDocumento' => $this->numeroDocumento,
			'fechaNacimiento' => $this->fechaNacimiento,
			'email' => $this->email,
			'direccion' => $this->direccion,
			'telefono' => $this->telefono,
			'celular' => $this->celular,
			'nombreUsuario' => $this->nombreUsuario,
			'tipoUsuario' => $this->tipoUsuario,			
			'contrasena' => $this->contrasena
		];

		if ($this->db->insert('persona', $data) == TRUE) {

			return TRUE;

		} else {

			return FALSE;

		}

	}

	public function validar_login() {

		$this->form_validation->set_rules('nombreUsuario','Usuario','required');	
		$this->form_validation->set_rules('contrasena','Contraseña','required');	

		if ($this->form_validation->run() === FALSE) {

			return FALSE;

		} else {

			$this->db->where('nombreUsuario',$this->input->post('nombreUsuario'));
			$this->db->where('contrasena',$this->input->post('contrasena'));			
			$row=$this->db->get('persona');
			$result = $row->result();

			if ($row->num_rows()==1) {

				$data = array('username' => $this->input->post('nombreUsuario'),
							  'tipo' => $result[0]->tipoUsuario,
							  'is_logged_in' => TRUE,
						);

				$this->session->set_userdata('ci_session',$data);

				return TRUE;
				
			}else{

				$errores[] = 'El usuario no existe en nuestra base de datos';
				return $errores;
			}

		}

	}	

}
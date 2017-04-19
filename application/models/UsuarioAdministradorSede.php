<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioAdministradorSede extends CI_Model {

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
	private $contrasena;
	private $contrasena2;

	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');   //El array se vuelve objeto

			if (is_object($value)) {       //pregunta si es un objeto
				$this->nombre = isset($value->nombre)? $value->nombre : null; //isset pregunta si no está nulo. Si hay algo
				//se asigna el valor, si no, se pone nulo.
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
		$errores = [];
		if ($this->nombre == null) {
			$errores[] = 'El nombre no puede ser vacío';
		}

		if ($this->apellido == null) {
			$errores[] = 'El apellido no puede ser vacío';
		}

		if ($this->tipoDocumento == null) {
			$errores[] = 'El tipo de documento no puede ser vacío';
		}
		if ($this->tipoDocumento == '0') {
			$errores[] = 'El tipo de documento no es válido';
		}
		if ($this->numeroDocumento == null) {
			$errores[] = 'El número de documento no puede ser vacío';
		}

		if ($this->fechaNacimiento == null) {
			$errores[] = 'La fecha de nacimiento no puede ser vacía';
		}

		if ($this->email == null) {
			$errores[] = 'El correo electrónico no puede ser vacío';
		} else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			$errores[] = 'El correo eléctronico ingresado no es válido';
		}

		if ($this->direccion == null) {
			$errores[] = 'La dirección no puede ser vacía';
		}
		// Acá habría que validar también que sea una fecha correcta
		// y que sea menor a la fecha actual.

		if ($this->telefono == null) {
			$errores[] = 'El número de teléfono no puede ser vacío';
		}

		if ($this->celular == null) {
			$errores[] = 'El número celular no puede ser vacío';
		}

		if ($this->nombreUsuario == null) {
			$errores[] = 'El nombre de Usuario no puede ser vacío';
		}
		if ($this->contrasena == null) {
			$errores[] = 'La contraseña no puede ser vacía';
		}

		if ($this->contrasena2 == null) {
			$errores[] = 'El campo repetir contraseña no puede ser vacío';
		}
		if ($this->contrasena != $this->contrasena2) {
			$errores[] = 'Las contraseñas no coinciden';
		}

		$query = $this->db->get_where('usuario', ['nombreUsuario' => $this->nombreUsuario]);
		$result = $query->result();

		$query2 = $this->db->get_where('usuarioadminsede', ['nombreUsuario' => $this->nombreUsuario]);
		$result2 = $query->result();

		$query3 = $this->db->get_where('administrador', ['nombreUsuario' => $this->nombreUsuario]);
		$result3 = $query3->result();		

		if (empty($result) && empty($result2) && empty($result3))  {
			$x = 1;
		}elseif((isset($result[0]->nombreUsuario) && $this->nombreUsuario == $result[0]->nombreUsuario) || (isset($result2[0]->nombreUsuario) && $this->nombreUsuario == $result2[0]->nombreUsuario) || (isset($result3[0]->nombreUsuario) && $this->nombreUsuario == $result3[0]->nombreUsuario)) {
			$errores[] = 'El nombre de usuario ya existe en nuestra base de datos, escoje otro';		
		}	

		if (empty($errores)) {
			return TRUE;
		} else {
			return $errores;
		}
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
			'contrasena' => $this->contrasena
		];

		return $this->db->insert('usuarioadminsede', $data);
	}

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
			$row=$this->db->get('usuarioadminsede');

			if ($row->num_rows()==1) {

				$data = array('username' => $usuario,
							   'tipo' => 'administrador',
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

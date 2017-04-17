<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CodigoDescuento extends CI_Model {

	private $codigo;
	private $fecha_vencimiento;
	private $patrocinador;

	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');   //El array se vuelve objeto

			if (is_object($value)) {       //pregunta si es un objeto
				$this->codigo = isset($value->codigo)? $value->codigo : null; //isset pregunta si no está nulo. Si hay algo se asigna el valor, si no, se pone nulo.
				$this->fecha_vencimiento = isset($value->fecha_vencimiento)? $value->fecha_vencimiento : null;
				$this->patrocinador = isset($value->patrocinador)? $value->patrocinador : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'codigo':
			case 'fecha_vencimiento':
			case 'patrocinador':
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}

	public function validar() {
		$errores = [];
		if ($this->codigo == null) {
			$errores[] = 'El codigo no puede ser vacío';
		}

		if ($this->fecha_vencimiento == null) {
			$errores[] = 'La fecha de vencimiento no puede ser vacía';
		}

		if ($this->patrocinador == null) {
			$errores[] = 'El patrocinador no puede ser vacío';
		}

		if (empty($errores)) {
			return TRUE;
		} else {
			return $errores;
		}
	}

	public function registrar() {
		$data = [
			'codigo' => $this->codigo,
			'fecha_vencimiento' => $this->fecha_vencimiento,
			'patrocinador' => $this->patrocinador
		];

		return $this->db->insert('codigo_descuento', $data);
	}
	
	public function obtener_datos() {
		$query = $this->db->get_where('persona', ['numero_documento' => $this->numero_documento]);
		$result = $query->result();
		if (empty($result)) {
			return FALSE;
		} else {
			$this->tipo_documento = $result[0]->tipo_documento;
			$this->numero_documento = $result[0]->numero_documento;
			$this->nombre = $result[0]->nombre;
			$this->apellido = $result[0]->apellido;
			$this->sexo = $result[0]->sexo;
			$this->fecha_nacimiento = $result[0]->fecha_nacimiento;
			$this->direccion = $result[0]->direccion;
			$this->ciudad = $result[0]->ciudad;
			$this->nacionalidad = $result[0]->nacionalidad;
			$this->email = $result[0]->email;
			$this->telefono = $result[0]->telefono;
			return $this;
		}
	}

	public function obtener_todas() {
		$query = $this->db->get('persona');

		$result = [];

		foreach ($query->result() as $key=>$persona) {
			$result[$key] = new Persona($persona);
		}

		return $result;
	}
	
}

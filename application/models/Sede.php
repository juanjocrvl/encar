<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sede extends CI_Model {

	private $nombre;
	private $direccion;
	private $capacidad;

	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');   

			if (is_object($value)) {      
				$this->nombre = isset($value->nombre)? $value->nombre : null; 
				$this->direccion = isset($value->direccion)? $value->direccion : null;
				$this->capacidad = isset($value->capacidad)? $value->capacidad : null;
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'nombre':
			case 'direccion':
			case 'capacidad':
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}

	public function validar() {

		$this->form_validation->set_rules('nombre','Nombre','required|alpha');
		$this->form_validation->set_rules('direccion','Direccion','required');
		$this->form_validation->set_rules('capacidad','capacidad','required|is_natural_no_zero');				
		
		if ($this->form_validation->run() === FALSE) {

			return FALSE;

		} else {

			return TRUE;

		}
		
	}

	public function registrar() {
		$data = [
			'nombre' => $this->nombre,
			'direccion' => $this->direccion,
			'capacidad' => $this->capacidad
		];

		return $this->db->insert('sede', $data);

	}

	public function obtener_sedes() {

		$this->db->select('nombre');
		$query = $this->db->get('sede');

		$result = [];

		foreach ($query->result() as $key=>$sede) {
			$result[$key] = $sede;
		}

		return $result;

	}

}
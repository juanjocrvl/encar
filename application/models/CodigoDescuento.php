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
				settype($value, 'object'); 

			if (is_object($value)) {   
				$this->codigo = isset($value->codigo)? $value->codigo : null; 
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

		$this->form_validation->set_rules('codigo','Codigo','required|is_natural_no_zero');
		$this->form_validation->set_rules('fecha_vencimiento','Fecha de vencimiento','required|callback_validarFecha');
		$this->form_validation->set_rules('patrocinador','Patrocinador','required|alpha_numeric');				
		
		if ($this->form_validation->run() === FALSE) {

			return FALSE;

		} else {

			return TRUE;

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
	
	public function obtener_codigos() {
		$query = $this->db->get('codigo_descuento');

		$result = [];

		foreach ($query->result() as $key=>$codigo) {
			$result[$key] = new CodigoDescuento($codigo);
		}

		return $result;
	}

	public function validarCodigo($codigo) {

		$query = $this->db->get_where('codigo_descuento', ['codigo' => $codigo]);
		$result = $query->result();

		if (empty($result)) {
			return FALSE;
		} else {
			return TRUE;
		}

	}	
	
}

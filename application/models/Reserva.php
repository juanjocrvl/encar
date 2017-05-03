<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Model {

	private $codigo;
	private $fecha;
	private $hora_inicio;
	private $hora_fin;		
	private $vehiculo;
	private $descuento;
	private $sede;			

	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');   

			if (is_object($value)) {      
				$this->codigo = isset($value->codigo)? $value->codigo : null; 
				$this->fecha = isset($value->fecha)? $value->fecha : null;
				$this->hora_inicio = isset($value->hora_inicio)? $value->hora_inicio : null;
				$this->hora_fin = isset($value->hora_fin)? $value->hora_fin : null; 
				$this->vehiculo = isset($value->vehiculo)? $value->vehiculo : null;
				$this->sede = isset($value->sede)? $value->sede : null;					
				$this->descuento = isset($value->descuento)? $value->descuento : null;								
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'codigo':
			case 'fecha':
			case 'hora_inicio':
			case 'hora_fin':
			case 'vehiculo':
			case 'sede':	
			case 'descuento':					
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}

	public function validar() {

		$this->form_validation->set_rules('hora_inicio','Hora inicio','required|callback_select_validar');
		$this->form_validation->set_rules('hora_fin','Hora fin','required|callback_select_validar');
		$this->form_validation->set_rules('descuento','Descuento','required');							
		
		if ($this->form_validation->run() === FALSE) {

			return FALSE;

		} else {

			return TRUE;

		}
		
	}

	public function registrar($usuario) {
		$data = [
			'codigo' => $this->nombre,
			'fecha' => $this->fecha,
			'hora_inicio' => $this->hora_inicio,
			'hora_fin' => $this->hora_fin,
			'vehiculo' => $this->vehiculo,
			'sede' => $this->sede,
			'descuento' => $this->descuento,															
			'usuario' => $this->$usuario
		];

		return $this->db->insert('reserva', $data);

	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculo extends CI_Model {

	private $categoria;
	private $precio;
	private $placa;
	private $transmision;
	private $combustible;
	private $color;
	private $sede;
	private $estado;

	
	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');   

			if (is_object($value)) {       
				$this->categoria = isset($value->categoria)? $value->categoria : null; 
				$this->precio = isset($value->precio)? $value->precio : null;
				$this->placa = isset($value->placa)? $value->placa : null;
				$this->transmision = isset($value->transmision)? $value->transmision : null;
				$this->combustible = isset($value->combustible)? $value->combustible : null;
				$this->color = isset($value->color)? $value->color : null;
				$this->sede = isset($value->sede)? $value->sede : null;		
				$this->estado = isset($value->estado)? $value->estado : null;							
			}
		}
	}

	public function __get($key) {
		switch ($key) {
			case 'categoria':
			case 'precio':
			case 'placa':
			case 'transmision':
			case 'combustible':
			case 'color':
			case 'sede':
			case 'estado':						
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}

	public function validar() {

		$this->form_validation->set_rules('placa','Placa','required|alpha_numeric|exact_length[6]');
		$this->form_validation->set_rules('precio','Precio','required|is_natural_no_zero');
		$this->form_validation->set_rules('categoria','Categoria','required|callback_select_validar');	
		$this->form_validation->set_rules('transmision','Transmision','required|callback_select_validar');
		$this->form_validation->set_rules('combustible','Combustible','required|callback_select_validar');	
		$this->form_validation->set_rules('color','Color','required|callback_select_validar');	
		$this->form_validation->set_rules('sede','Sede','required|callback_select_validar');									
		
		if ($this->form_validation->run() === FALSE) {

			return FALSE;

		} else {

			return TRUE;

		}
	}

	public function validar_mover() {

		$this->form_validation->set_rules('sede_nueva','Sede nueva','required|callback_select_validar');
								
		if ($this->form_validation->run() === FALSE) {

			return FALSE;

		} else {

			return TRUE;

		}
	}	

	public function registrar() {
		$data = [
			'placa' => $this->placa,
			'precio' => $this->precio,
			'categoria' => $this->categoria,
			'transmision' => $this->transmision,
			'combustible' => $this->combustible,
			'color' => $this->color,
			'sede' => $this->sede,
			'estado' => 'Disponible'							
		];

		return $this->db->insert('vehiculo', $data);
	}

	public function actualizar() {
		$data = [
			'placa' => $this->placa,
			'precio' => $this->precio,
			'categoria' => $this->categoria,
			'transmision' => $this->transmision,
			'combustible' => $this->combustible,
			'color' => $this->color,
			'sede' => $this->sede,
			'estado' => 'Disponible'							
		];

		return $this->db->update('vehiculo', $data , ['placa' => $this->placa]);
	}		

	public function obtener_vehiculos() {
		$query = $this->db->get('vehiculo');

		$result = [];

		foreach ($query->result() as $key=>$vehiculo) {
			$result[$key] = new Vehiculo($vehiculo);
		}

		return $result;
	}

	public function obtener_vehiculos_catalogo($sede) {

		if ($sede == 'Todas' || $sede == null) {

			$query = $this->db->get('vehiculo');


		}else{

			$this->db->where(['sede' => $sede]);		
			$query = $this->db->get('vehiculo');

		}

		$result = [];

		foreach ($query->result() as $key=>$vehiculo) {
			$result[$key] = new Vehiculo($vehiculo);
		}

		return $result;
	}	

	public function obtener_vehiculo($placa) {
		$query = $this->db->get_where('vehiculo', ['placa' => $placa]);
		$result = $query->result();
		if (empty($result)) {
			return FALSE;
		} else {
			return $result;
		}
	}	

	
}

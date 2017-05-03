<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TarjetaCredito extends CI_Model {

	private $numero_tarjeta;
	private $codigo_seguridad;
	private $fecha_vencimiento;
	private $saldo;	

	public function __construct($value = null) {
		parent::__construct();

		if (isset($value)) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->numero_tarjeta = isset($value->numero_tarjeta) ? $value->numero_tarjeta : null;
				$this->codigo_seguridad = isset($value->codigo_seguridad) ? $value->codigo_seguridad : null;
				$this->fecha_vencimiento = isset($value->fecha_vencimiento) ? $value->fecha_vencimiento : null;
				$this->saldo = isset($value->saldo) ? $value->saldo : null;				
			}
		}
	}
	public function __get($key) {
		switch ($key) {
			case 'numero_tarjeta':
			case 'codigo_seguridad':
			case 'fecha_vencimiento':
			case 'saldo':			
			return $this->$key;
			default:
			return parent::__get($key);
		}
	}
	public function validar() {

		$this->form_validation->set_rules('numero_tarjeta','Numero','required|is_natural_no_zero');
		$this->form_validation->set_rules('codigo_seguridad','Codigo de seguridad','required|exact_length[4]|is_natural_no_zero|');
		$this->form_validation->set_rules('fecha_vencimiento','Fecha de vencimiento','required|callback_validarFecha');	
		$this->form_validation->set_rules('saldo','Saldo','required|is_natural_no_zero');

	}

	public function registrar($usuario) {
		$data = [
			'usuario' => $usuario->numeroDocumento,
		    'numero' => $this->numero_tarjeta,
		    'codigo_seguridad' => $this->codigo_seguridad,
		    'fecha_vencimiento' => $this->fecha_vencimiento,
		    'saldo' => $this->saldo		    
		];

		if ($this->db->insert('tarjeta_credito', $data) !== false) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}

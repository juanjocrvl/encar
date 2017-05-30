<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends Persona {

	private $tarjeta_credito;	

	public function __construct($value = null,$tipo = 0) {
		parent::__construct($value,$tipo);
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');   

			if (is_object($value)) {       
				$this->tarjeta_credito = isset($value->tarjeta_credito) ? $value->tarjeta_credito : null;	

			}

		}

	}

	public function __get($key) {

		switch ($key) {
			case 'tarjeta_credito':			
				return $this->$key;
			default:
				return parent::__get($key);
		}

	}

	public function validar() {
		
		parent::validar();

		$this->TarjetaCredito->validar();
		
		if ($this->form_validation->run() === FALSE) {

			return FALSE;

		} else {

			return TRUE;

		}		

	}

	public function validar_saldo($usuario,$placa) {
		
		$this->load->model('TarjetaCredito');
		$this->load->model('Vehiculo');
		$saldo = $this->TarjetaCredito->obtener_saldo($usuario);
		$precio = $this->Vehiculo->obtener_precio($placa);

		if ($saldo == FALSE || $precio == FALSE) {
			return FALSE;

		}elseif ($saldo < $precio) {
			return FALSE;
		
		}else{

			$resta = $saldo - $precio;
			$this->TarjetaCredito->actualizar_saldo($usuario,$resta);
			return TRUE;

		}


	}	

	public function registrar() {

		$this->db->trans_begin();
		$parent_result = parent::registrar();

		if (!$parent_result) {
			$this->db->trans_rollback();
			return $parent_result;
		}

		if ($this->tarjeta_credito != null) {
			if (!$this->tarjeta_credito->registrar($this)) {
				$this->db->trans_rollback();
				return FALSE;

			}else{

				$this->db->trans_commit();
				return TRUE;

			}

		}
		
		$this->db->trans_rollback();
		return FALSE;

	}
	
}

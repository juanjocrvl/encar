<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TarjetaCredito extends CI_Model {

	private $numero;
	private $codigo_seguridad;
	private $fecha_vencimiento;
	private $saldo;	

	public function __construct($value = null) {
		parent::__construct();

		if (isset($value)) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->numero = isset($value->numero) ? $value->numero : null;
				$this->codigo_seguridad = isset($value->codigo_seguridad) ? $value->codigo_seguridad : null;
				$this->fecha_vencimiento = isset($value->fecha_vencimiento) ? $value->fecha_vencimiento : null;
				$this->saldo = isset($value->saldo) ? $value->saldo : null;				
			}
		}
	}
	public function __get($key) {
		switch ($key) {
			case 'numero':
			case 'codigo_seguridad':
			case 'fecha_vencimiento':
			case 'saldo':			
			return $this->$key;
			default:
			return parent::__get($key);
		}
	}
	public function validar() {
		$errores = [];

		if ($this->numero == null) {
			$errores[] = 'El numero de tarjeta no puede ser vacía';
		}

		if ($this->codigo_seguridad == null) {
			$errores[] = 'El codigo de seguridad no puede ser vacío';
		}

		if ($this->fecha_vencimiento == null) {
			$errores[] = 'La fecha de vencimiento no puede ser vacía';
		}

		if ($this->saldo == null) {
			$errores[] = 'El saldo no puede ser vacío';
		}		

		return empty($errores) ? TRUE : $errores;

	}

	public function registrar($usuario) {
		$data = [
			'usuario' => $usuario->numeroDocumento,
		    'numero' => $this->numero,
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

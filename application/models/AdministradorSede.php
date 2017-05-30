<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdministradorSede extends Persona {

	private $sede;

	public function __construct($value = null,$tipo = 0) {

		parent::__construct($value,$tipo);
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');

			if (is_object($value)) {
				$this->sede = isset($value->sede) ? $value->sede : null;

			}
		}		

	}

	public function __get($key) {

		switch ($key) {
			case 'sede':
			return $this->$key;
			default:
			return parent::__get($key);
		}

	}

	public function validar() {

		parent::validar();
		$this->form_validation->set_rules('sede','Sede','required|callback_select_validar');

		if ($this->form_validation->run() === FALSE) {

			return FALSE;

		} else {

			return TRUE;

		}

	}

	public function registrar() {

		$this->db->trans_begin();
		$parent_result = parent::registrar();	

		if (!$parent_result) {

			$this->db->trans_rollback();
			return $parent_result;

		}else{

			$data = [
				'administrador' => $this->numeroDocumento,
				'sede' => $this->sede
			];

			$this->db->insert('administrador_sede', $data);
			$this->db->trans_commit();
			return TRUE;

		}

	}

}

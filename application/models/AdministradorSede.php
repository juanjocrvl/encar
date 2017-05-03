<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdministradorSede extends Persona {

	public function __construct($value = null,$tipo = 0) {

		parent::__construct($value,$tipo);
		$this->load->database();

	}

	public function __get($key) {

		return parent::__get($key);

	}

	public function validar() {

		parent::validar();

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

			$this->db->trans_commit();
			return TRUE;

		}

	}

}

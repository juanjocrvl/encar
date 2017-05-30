<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Model {

	private $codigo;
	private $fecha;
	private $hora_inicio;
	private $sede_entrega;	
	private $hora_fin;		
	private $vehiculo;
	private $descuento;
	private $sede;
	private $usuario;				
	private $estado;		

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
				$this->sede_entrega = isset($value->sede_entrega)? $value->sede_entrega : null;						
				$this->hora_fin = isset($value->hora_fin)? $value->hora_fin : null; 
				$this->vehiculo = isset($value->vehiculo)? $value->vehiculo : null;
				$this->sede = isset($value->sede)? $value->sede : null;					
				$this->descuento = isset($value->descuento)? $value->descuento : null;	
				$this->usuario = isset($value->usuario)? $value->usuario : null;
				$this->estado = isset($value->estado)? $value->estado : null;																	
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
			case 'sede_entrega':				
			case 'descuento':
			case 'usuario':				
			case 'estado':							
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}

	public function validar() {

		$this->form_validation->set_rules('hora_inicio','Hora inicio','required|callback_select_validar');
		$this->form_validation->set_rules('hora_fin','Hora fin','required|callback_select_validar');
		$this->form_validation->set_rules('descuento','Descuento','callback_validarCodigoDescuento');
		$this->form_validation->set_rules('sede_entrega','Sede entrega','required|callback_select_validar');									
		
		if ($this->form_validation->run() === FALSE) {

			return FALSE;

		} else {

			return TRUE;

		}
		
	}

	public function registrar($usuario) {

		if ($this->descuento == null) {

			$data = [
				'fecha' => $this->fecha,
				'hora_inicio' => $this->hora_inicio,
				'hora_fin' => $this->hora_fin,
				'vehiculo' => $this->vehiculo,
				'sede' => $this->sede,
				'sede_entrega' => $this->sede_entrega,																			
				'usuario' => $usuario,
				'estado' => 'Registrada'
			];

		}else{

			$data = [
				'fecha' => $this->fecha,
				'hora_inicio' => $this->hora_inicio,
				'hora_fin' => $this->hora_fin,
				'vehiculo' => $this->vehiculo,
				'sede' => $this->sede,
				'sede_entrega' => $this->sede_entrega,					
				'descuento' => $this->descuento,															
				'usuario' => $usuario,
				'estado' => 'Registrada'
			];

		}

		return $this->db->insert('reserva', $data);

	}

	public function obtener_reservas($estado) {

		if ($estado == 'Todas' || $estado == null) {
				
			$query = $this->db->get('reserva');


		}else{

			$this->db->where(['estado' => $estado]);		
			$query = $this->db->get('reserva');

		}

		$result = [];

		foreach ($query->result() as $key=>$reserva) {
			$result[$key] = new Reserva($reserva);
		}

		return $result;
	}	

	public function obtener_reserva($usuario,$estado) {

		if ($estado == 'Todas' || $estado == null) {

			$this->db->where(['usuario' => $usuario]);					
			$query = $this->db->get('reserva');


		}else{

			$this->db->where(['usuario' => $usuario]);
			$this->db->where(['estado' => $estado]);		
			$query = $this->db->get('reserva');

		}

		$result = [];

		foreach ($query->result() as $key=>$reserva) {
			$result[$key] = new Reserva($reserva);
		}

		return $result;
	}

	public function obtener_reserva_codigo($codigo,$tipo) {

		if ($tipo == 1) {

			$this->form_validation->set_rules('codigo','Codigo reserva','required|callback_validarCodigoRegistrado');	

		}elseif ($tipo == 2) {

			$this->form_validation->set_rules('codigo','Codigo reserva','required|callback_validarCodigoActivado');	

		}
							
		if ($this->form_validation->run() === FALSE) {

			return FALSE;

		} else {

			$this->db->where(['codigo' => $codigo]);					
			$query = $this->db->get('reserva');			

			$result = [];

			foreach ($query->result() as $key=>$reserva) {
				$result[$key] = new Reserva($reserva);
			}

			return $result;

		}

	}	

	public function cancelar($codigo) {

		return $this->db->delete('reserva', array('codigo' => $codigo));
	
	}	

	public function activar($codigo) {

		$this->db->update('reserva', array('estado' => 'Activa') , array('codigo' => $codigo));


	}	

	public function finalizar($codigo) {

		$this->db->update('reserva', array('estado' => 'Finalizada') , array('codigo' => $codigo));


	}	

	public function validarCodigoRegistrado($codigo) {

		$query = $this->db->get_where('reserva', ['codigo' => $codigo]);
		$result = $query->result();

		if (empty($result)) {

			return FALSE;

		} else {

			if (strcmp($result[0]->estado,'Registrada') !== 0) {
				
				return 1;

			}

			return TRUE;

		}

	}

	public function validarCodigoActivado($codigo) {

		$query = $this->db->get_where('reserva', ['codigo' => $codigo]);
		$result = $query->result();

		if (empty($result)) {

			return FALSE;

		} else {

			if (strcmp($result[0]->estado,'Activa') !== 0) {
				
				return 1;

			}

			return TRUE;

		}

	}	

	public function obtener_sede_entrega($codigo) {

		$this->db->select('sede_entrega');
		$this->db->where(['codigo' => $codigo]);		
		$query = $this->db->get('reserva');

		$result = $query->result();

		return $result;

	}	

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculo extends CI_Model {

	private $categoria;
	private $precio;
	private $placa;
	private $transmision;
	private $combustible;
	private $color;
	
	public function __construct($value = null) {
		parent::__construct();
		$this->load->database();

		if ($value != null) {
			if (is_array($value))
				settype($value, 'object');   //El array se vuelve objeto

			if (is_object($value)) {       //pregunta si es un objeto
				$this->categoria = isset($value->categoria)? $value->categoria : null; //isset pregunta si no está nulo. Si hay algo se asigna el valor, si no, se pone nulo.
				$this->precio = isset($value->precio)? $value->precio : null;
				$this->placa = isset($value->placa)? $value->placa : null;
				$this->transmision = isset($value->transmision)? $value->transmision : null;
				$this->combustible = isset($value->combustible)? $value->combustible : null;
				$this->color = isset($value->color)? $value->color : null;
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
				return $this->$key;
			default:
				return parent::__get($key);
		}
	}

	public function validar() {
		$errores = [];
		if ($this->categoria == '0') {
			$errores[] = 'La categoria no puede ser vacía';
		}

		if ($this->precio == null) {
			$errores[] = 'El precio no puede ser vacío';
		}

		if ($this->placa == null) {
			$errores[] = 'La placa no puede ser vacía';
		}

		if ($this->transmision == '0') {
			$errores[] = 'La transmision no puede ser vacía';
		}

		if ($this->combustible == '0') {
			$errores[] = 'El combustible no puede ser vacío';
		}

		if ($this->color == '0') {
			$errores[] = 'El color no puede ser vacío';
		}

		if (empty($errores)) {
			return TRUE;
		} else {
			return $errores;
		}
	}

	public function registrar() {
		$data = [
			'placa' => $this->placa,
			'precio' => $this->precio,
			'categoria' => $this->categoria,
			'transmision' => $this->transmision,
			'combustible' => $this->combustible,
			'color' => $this->color
		];

		return $this->db->insert('vehiculo', $data);
	}

	public function actualizar() {
		$data = [
			'tipo_documento' => $this->tipo_documento,
			'nombre' => $this->nombre,
			'apellido' => $this->apellido,
			'sexo' => $this->sexo,
			'fecha_nacimiento' => $this->fecha_nacimiento,
			'direccion' => $this->direccion,
			'ciudad' => $this->ciudad,
			'nacionalidad' => $this->nacionalidad,
			'email' => $this->email,
			'telefono' => $this->telefono
		];

		return $this->db->update('persona', $data , array('numero_documento' => $this->numero_documento));
	}	

	public function eliminar() {

		return $this->db->delete('persona', array('numero_documento' => $this->numero_documento));
	}

	public function obtener_datos() {
		$query = $this->db->get_where('persona', ['numero_documento' => $this->numero_documento]);
		$result = $query->result();
		if (empty($result)) {
			return FALSE;
		} else {
			$this->tipo_documento = $result[0]->tipo_documento;
			$this->numero_documento = $result[0]->numero_documento;
			$this->nombre = $result[0]->nombre;
			$this->apellido = $result[0]->apellido;
			$this->sexo = $result[0]->sexo;
			$this->fecha_nacimiento = $result[0]->fecha_nacimiento;
			$this->direccion = $result[0]->direccion;
			$this->ciudad = $result[0]->ciudad;
			$this->nacionalidad = $result[0]->nacionalidad;
			$this->email = $result[0]->email;
			$this->telefono = $result[0]->telefono;
			return $this;
		}
	}

	
	public function obtener_estudios() {
		$this->load->model('Estudio');
		
		return $this->estudios = $this->Estudio->obtener_estudios_por_persona($this);
	}
	

	public function obtener_todas() {
		$query = $this->db->get('persona');

		$result = [];

		foreach ($query->result() as $key=>$persona) {
			$result[$key] = new Persona($persona);
		}

		return $result;
	}

	
}

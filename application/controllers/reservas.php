<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Reservas extends CI_controller{

		public function registrar_vista($placa){

			$session_data = $this->session->userdata('ci_session');
			$tipo = $session_data['tipo'];	

			if (isset($tipo) && $tipo != 'usuario') {

				$this->load->view('basic/header');
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/login');			
				$this->load->view('basic/footer');

			}else{

				$this->load->model('Vehiculo');	
				$this->load->model('Sede');					
				$vehiculo = $this->Vehiculo->obtener_vehiculo($placa);
				$datos['sedes'] = $this->Sede->obtener_sedes();				
				$datos['fecha'] = date("Y/m/d");
				$datos['placa'] = $vehiculo[0]->placa;
				$datos['sede'] = $vehiculo[0]->sede;							
				$this->load->view('basic/header',$datos);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/registrar_reserva');			
				$this->load->view('basic/footer');
			}

		}

		public function registrar_modelo($placa){

			$this->load->model('Reserva');	
				
			$errores = $this->Reserva->validar();

			if ($errores == TRUE) {

				$this->load->model('Persona');
				$this->load->model('Usuario');				

				$data = array('vehiculo' => $this->input->post('vehiculo'),
							  'sede' => $this->input->post('sede'),
							  'fecha' => $this->input->post('fecha'),
							  'hora_inicio' => $this->input->post('hora_inicio'),
							  'hora_fin' => $this->input->post('hora_fin'),
							  'sede_entrega' => $this->input->post('sede_entrega'),							  
							  'descuento' => $this->input->post('descuento')							  
						);	

				$codigo = new Reserva($data);
				$session_data = $this->session->userdata('ci_session');
				$usuario = $session_data['documento'];	

				$saldo = $this->Usuario->validar_saldo($usuario,$this->input->post('vehiculo'));

				if ($saldo == FALSE) {

					$errores = [];
					$errores[] = 'Saldo insuficiente';
					$head['errores'] = $errores;	

					$this->load->view('basic/header',$head);
					$this->barra_nav();
					$this->load->view('encar/error');
					$this->registrar_vista($placa);									
					$this->load->view('basic/footer');	
					
				} else {

					$this->load->model('Vehiculo');
					$this->Vehiculo->cambiarEstado($placa,'Reservado');
					$codigo->registrar($usuario);	
					$head['success'] = 'Reserva hecha correctamente';	

					$this->load->view('basic/header',$head);
					$this->barra_nav();
					$this->load->view('basic/content');	
					$this->load->view('encar/success');			
					$this->load->view('basic/footer');	

				}

			}else{
					
				$this->registrar_vista($placa);										

			}
		}

		public function listar(){

			$this->load->model('Reserva');			
			$lista['reservas'] = $this->Reserva->obtener_reservas($this->input->post('estado'));			
			$this->load->view('basic/header',$lista);
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/listar_reservas');			
			$this->load->view('basic/footer');
		
		}

		public function consultar(){

			$this->load->model('Reserva');	
			$session_data = $this->session->userdata('ci_session');
			$usuario = $session_data['documento'];				
			$lista['reservas'] = $this->Reserva->obtener_reserva($usuario,$this->input->post('estado'));		
			$this->load->view('basic/header',$lista);
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/consultar_reservas');			
			$this->load->view('basic/footer');
		
		}

		public function cancelar($codigo,$placa){

			$this->load->model('Reserva');				
			$this->Reserva->cancelar($codigo);
			$this->load->model('Vehiculo');
			$this->Vehiculo->cambiarEstado($placa,'Disponible');
			$head['success'] = 'Reserva cancelada correctamente';				
			$this->load->view('basic/header',$head);
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/success');			
			$this->load->view('basic/footer');
		
		}						

		public function activar(){
			
			$data['link'] = '/encar/index.php/reservas/activar_vista';
			$data['legend'] = 'Activar reserva';			
			$this->load->view('basic/header',$data);
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/activar_finalizar_reserva');			
			$this->load->view('basic/footer');
		
		}

		public function activar_vista(){

			$this->load->model('Reserva');			
			$data['reserva'] = $this->Reserva->obtener_reserva_codigo($this->input->post('codigo'),1);

			if ($data['reserva'] == FALSE) {
			
				$this->activar();

			}else{

				$data['link'] = '/encar/index.php/reservas/activar_modelo/';
				$data['boton'] = 'Activar';					
				$this->load->view('basic/header',$data);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/mostrar_reserva');			
				$this->load->view('basic/footer');

			}

		}		

		public function activar_modelo($codigo,$placa){

			$this->load->model('Reserva');	
			$this->load->model('Vehiculo');						
			$this->Reserva->activar($codigo);
			$this->Vehiculo->cambiarEstado($placa,'Ocupado');			
			$head['success'] = 'Reserva activada correctamente';				
			$this->load->view('basic/header',$head);
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/success');			
			$this->load->view('basic/footer');
		
		}	

		public function finalizar(){

			$data['link'] = '/encar/index.php/reservas/finalizar_vista';
			$data['legend'] = 'Finalizar reserva';			
			$this->load->view('basic/header',$data);
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/activar_finalizar_reserva');			
			$this->load->view('basic/footer');
		
		}

		public function finalizar_vista(){

			$this->load->model('Reserva');			
			$data['reserva'] = $this->Reserva->obtener_reserva_codigo($this->input->post('codigo'),2);

			if ($data['reserva'] == FALSE) {
			
				$this->finalizar();

			}else{

				$data['link'] = '/encar/index.php/reservas/finalizar_modelo/';
				$data['boton'] = 'Finalizar';	
				$this->load->view('basic/header',$data);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/mostrar_reserva');			
				$this->load->view('basic/footer');

			}
			
		}		

		public function finalizar_modelo($codigo,$placa){

			$this->load->model('Reserva');	
			$this->load->model('Vehiculo');							
			$this->Reserva->finalizar($codigo);
			$this->Vehiculo->cambiarEstado($placa,'Disponible');
			$sede = $this->Reserva->obtener_sede_entrega($codigo);
			$this->Vehiculo->actualizarSede($placa,$sede[0]->sede_entrega);									
			$head['success'] = 'Reserva finalizada correctamente';				
			$this->load->view('basic/header',$head);
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/success');			
			$this->load->view('basic/footer');
		
		}					

		public function barra_nav(){

			$session_data = $this->session->userdata('ci_session');
			$data['tipo'] = $session_data['tipo'];	
					
			if (isset($data['tipo'])) {

				if ($data['tipo'] == 'usuario') {

					$log['usuario'] = $session_data['username'];
					$this->load->view('basic/nav_usuario',$log);	

				}elseif($data['tipo'] == 'administrador'){

					$log['usuario'] = $session_data['username'];
					$this->load->view('basic/nav_administrador',$log);

				}elseif($data['tipo'] == 'administradorsede'){

					$log['usuario'] = $session_data['username'];
					$this->load->view('basic/nav_administrador_sede',$log);
				}

			}else{

				$this->load->view('basic/nav');	

			}

		}	

		function validarFecha($date){

			$format = 'Y/m/d';
		    $fecha = DateTime::createFromFormat($format, $date);

			if ($fecha && $fecha->format($format) == $date) {

				return TRUE;

			} else {

				$format = 'Y-m-d';
			    $fecha = DateTime::createFromFormat($format, $date);
			    
				if ($fecha && $fecha->format($format) == $date) {

					return TRUE;

				} else {

					$this->form_validation->set_message('validarFecha','Fecha incorrecta.');		
					return FALSE;

				}	

			}		    

		}

		function validarCodigoDescuento($codigo){

			$this->load->model('CodigoDescuento');
			$validar = $this->CodigoDescuento->validarCodigo($codigo);

			if ($validar == TRUE) {

				return TRUE;

			}else {

				if ($codigo == null) {
					return TRUE;
				}
				
				$this->form_validation->set_message('validarCodigoDescuento','Codigo de descuento incorrecto');		
				return FALSE;
				
			}		    

		}

		function validarCodigoRegistrado($codigo){

			$this->load->model('Reserva');
			$validar = $this->Reserva->validarCodigoRegistrado($codigo);
		
			if ($validar === 1) {

				$this->form_validation->set_message('validarCodigoRegistrado','Este codigo de reserva ya ha sido activado');		
				return FALSE;

			}elseif ($validar == TRUE) {
	
				return TRUE;

			}else {
				
				$this->form_validation->set_message('validarCodigoRegistrado','Codigo de reserva incorrecto');		
				return FALSE;
				
			}		    

		}

		function validarCodigoActivado($codigo){

			$this->load->model('Reserva');
			$validar = $this->Reserva->validarCodigoActivado($codigo);
		
			if ($validar === 1) {

				$this->form_validation->set_message('validarCodigoActivado','Este codigo de reserva no se encuentra activado');		
				return FALSE;

			}elseif ($validar == TRUE) {
	
				return TRUE;

			}else {
				
				$this->form_validation->set_message('validarCodigoActivado','Codigo de reserva incorrecto');		
				return FALSE;
				
			}		    

		}						

		public function select_validar($opcion){

			if ($opcion == "0") {

				$this->form_validation->set_message('select_validar','Porfavor elija una opcion.');
				return FALSE;

			} else {
			
				return TRUE;

			}
		
		}											
																			
	}
?>
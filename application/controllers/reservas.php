<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Reservas extends CI_controller{

		public function registrar_vista($placa){

			$this->load->model('Vehiculo');	
			$vehiculo = $this->Vehiculo->obtener_vehiculo($placa);
			$datos['fecha'] = date("Y/m/d");
			$datos['placa'] = $vehiculo[0]->placa;
			$datos['sede'] = $vehiculo[0]->sede;							
			$this->load->view('basic/header',$datos);
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/registrar_reserva');			
			$this->load->view('basic/footer');

		}

		public function registrar_modelo(){

			$this->load->model('CodigoDescuento');			
			$errores = $this->CodigoDescuento->validar();

			if ($errores == TRUE) {

				$data = array('codigo' => $this->input->post('codigo'),
						'fecha_vencimiento' => $this->input->post('fecha_vencimiento'),
						'patrocinador' => $this->input->post('patrocinador')
					);	

				$codigo = new CodigoDescuento($data);								
				$codigo->registrar();
			
				$head['success'] = 'Codigo de descuento registrado correctamente';	
				$head['link'] = '/encar/index.php/codigosDescuento/registrar_vista';	
				$head['boton'] = 'codigo de descuento';	

				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/success');			
				$this->load->view('basic/footer');			

			}else{
					
				$this->load->view('basic/header');
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/registrar_codigodescuento');							
				$this->load->view('basic/footer');										

			}
		}

		public function listar(){

			$this->load->model('CodigoDescuento');	
			$lista['codigos'] = $this->CodigoDescuento->obtener_codigos();
			$this->load->view('basic/header',$lista);
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/listar_codigos');			
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

				$this->form_validation->set_message('validarFecha','Fecha incorrecta.');		
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
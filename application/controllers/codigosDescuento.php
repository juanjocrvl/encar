<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class CodigosDescuento extends CI_controller{

		public function registrar_vista(){

			$this->load->view('basic/header');
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/registrar_codigodescuento');			
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
																			
	}
?>
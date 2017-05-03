<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Sedes extends CI_controller{

		public function registrar_vista(){

			$this->load->view('basic/header');
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/registrar_sede');			
			$this->load->view('basic/footer');

		}

		public function registrar_modelo(){

			$this->load->model('Sede');			
			$errores = $this->Sede->validar();

			if ($errores == TRUE) {

				$data = array('nombre' => $this->input->post('nombre'),
							  'direccion' => $this->input->post('direccion'),
							  'capacidad' => $this->input->post('capacidad')
					);	

				$codigo = new Sede($data);								
				$codigo->registrar();
			
				$head['success'] = 'Codigo de descuento registrado correctamente';	
				$head['link'] = '/encar/index.php/sedes/registrar_vista';	
				$head['boton'] = 'Registrar nueva sede';	

				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/success');			
				$this->load->view('basic/footer');			

			}else{
					
				$this->load->view('basic/header');
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/registrar_sede');							
				$this->load->view('basic/footer');										

			}
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
																			
	}
?>
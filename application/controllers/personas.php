<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Personas extends CI_controller{

		public function login_vista(){

			$this->load->view('basic/header');
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/login');			
			$this->load->view('basic/footer');

		}

		public function login(){

			$this->load->model('Persona');
			$errores = $this->Persona->validar_login();

			if (is_array($errores)) {
					
				$head['errores'] = $errores;			
				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/error');
				$this->load->view('encar/login');							
				$this->load->view('basic/footer');



			}elseif ($errores == TRUE) {

				$session_data = $this->session->userdata('ci_session');	
				$data['tipo'] = $session_data['tipo'];	

				$this->load->view('basic/header');

				if (isset($data['tipo'])) {

					if ($data['tipo'] == 'usuario') {

						$log['usuario'] = $session_data['username'];
						$this->load->view('basic/nav_usuario',$log);	
						
					}elseif ($data['tipo'] == 'administradorsede') {

						$log['usuario'] = $session_data['username'];
						$this->load->view('basic/nav_administrador_sede',$log);

					}elseif ($data['tipo'] == 'administrador') {

						$log['usuario'] = $session_data['username'];
						$this->load->view('basic/nav_administrador',$log);

					}

				}else{

					$this->load->view('basic/nav');	

				}

				$this->load->view('basic/content');				
				$this->load->view('basic/footer');

			}else{

				$this->load->view('basic/header');
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/login');							
				$this->load->view('basic/footer');				
				
			
			}

		}

		public function logout(){

			$this->session->unset_userdata('ci_session');

			$session_data = $this->session->userdata('ci_session');
			$data['tipo'] = $session_data['tipo'];

			$this->load->view('basic/header');

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

			$this->load->view('basic/content');				
			$this->load->view('basic/footer');

		}

		public function select_validar($opcion){

			if ($opcion == "0") {

				$this->form_validation->set_message('select_validar','Porfavor elija una opcion.');
				return FALSE;

			} else {
			
				return TRUE;

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
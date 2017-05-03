<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Encar extends CI_controller{

		public function index(){
					
			$this->load->view('basic/header');
			$this->barra_nav();
			$this->load->view('basic/content');		
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

				}elseif($data['tipo'] == 'administradortotal'){

					$log['usuario'] = $session_data['username'];
					$this->load->view('basic/nav_administradortotal',$log);
				}

			}else{

				$this->load->view('basic/nav');	

			}

		}						
																			
	}
?>
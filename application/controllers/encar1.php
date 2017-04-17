<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class encar1 extends CI_Controller {

	public function index(){

		$this->load->library('session');
		$session_data = $this->session->userdata('ci_session');
		$data['tipo'] = $session_data['tipo'];	
				
		$this->load->helper('url');
		$this->load->view('basic/header');
		if (isset($data['tipo'])) {

			if ($data['tipo'] == 'usuario') {

				$head['usuario'] = $session_data['username'];
				$this->load->view('basic/nav_usuario',$head);	

			}elseif($data['tipo'] == 'usuario'){

				$head['usuario'] = $session_data['username'];
				$this->load->view('basic/nav_administrador',$head);

			}

		}else{
			$this->load->view('basic/nav');				
		}
		$this->load->view('basic/content');				
		$this->load->view('basic/footer');

	}
		public function loginvista(){
			
		$this->load->helper('url');
		$this->load->view('basic/header');
		$this->load->view('basic/nav');
		$this->load->view('basic/content');	
		$this->load->view('encar/login');			
		$this->load->view('basic/footer');

		}

	public function login(){
		$this->load->library('session');

		$usuario = $this->input->post('nombreUsuario');
		$pass = $this->input->post('contrasena');	

		$this->load->model('Usuario');

		if (is_array($this->Usuario->validar_login($usuario,$pass))) {
				
				$errores = $this->Usuario->validar_login($usuario,$pass);
				$dat['titulo'] = 'Error';
				$dat['errores'] = $errores;
				$this->load->vars($dat);
				$this->load->view('encar/error');
				$this->load->view('templates/footer');	

		}elseif (is_bool($this->Usuario->validar_login($usuario,$pass)) && $this->Usuario->validar_login($usuario,$pass)== TRUE) {

			$session_data = $this->session->userdata('ci_session');	
			$data['tipo'] = $session_data['tipo'];	

			$this->load->helper('url');
			$this->load->view('basic/header');
			if (isset($data['tipo'])) {

				if ($data['tipo'] == 'usuario') {

					$head['usuario'] = $session_data['username'];
					$this->load->view('basic/nav_usuario',$head);	
					
				}

			}else{

				$this->load->view('basic/nav');	

			}
			$this->load->view('basic/content');
			$this->load->view('encar/inicio');					
			$this->load->view('basic/footer');

		}else{

			$this->load->model('UsuarioAdministradorSede');

			if (is_bool($this->UsuarioAdministradorSede->validar_login($usuario,$pass)) && $this->UsuarioAdministradorSede->validar_login($usuario,$pass)== TRUE) {

				$session_data = $this->session->userdata('ci_session');	
				$data['tipo'] = $session_data['tipo'];	

				$this->load->helper('url');
				$this->load->view('basic/header');
				if (isset($data['tipo'])) {

					if ($data['tipo'] == 'administrador') {

						$head['usuario'] = $session_data['username'];
						$this->load->view('basic/nav_administrador',$head);	
						
					}

				}else{

					$this->load->view('basic/nav');	

				}
				$this->load->view('basic/content');					
				$this->load->view('basic/footer');

			}else{

				$errores[] = 'Usuario no exite';
				$dat['titulo'] = 'Error';
				$dat['errores'] = $errores;
				$this->load->vars($dat);
				$this->load->view('encar/error');
				$this->load->view('templates/footer');

			}

		}
		
	}

	public function logout(){

		$this->load->library('session');
		$this->session->unset_userdata('ci_session');

		$this->load->helper('url');
		$this->load->view('basic/header');
		$this->load->view('basic/nav');
		$this->load->view('basic/content');				
		$this->load->view('basic/footer');

	}	

}

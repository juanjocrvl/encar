<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Usuarios extends CI_controller{

		public function registrar_vista(){

			$this->load->view('basic/header');
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/registrar_usuario');			
			$this->load->view('basic/footer');

		}

		public function registrar_modelo(){	

			$this->load->model('Persona');	
			$this->load->model('Usuario');	
			$this->load->model('TarjetaCredito');			
			$errores = $this->Usuario->validar();

			if ($errores == TRUE) {

				$data = array('numero_tarjeta' => $this->input->post('numero_tarjeta'),
							  'codigo_seguridad' => $this->input->post('codigo_seguridad'),
							  'fecha_vencimiento' => $this->input->post('fecha_vencimiento'),
							  'saldo' => $this->input->post('saldo')
						);

				$this->load->model('TarjetaCredito');
				$tarjeta = new TarjetaCredito($data);
			

				$data = array('nombre' => $this->input->post('nombre'),
							  'apellido' => $this->input->post('apellido'),
							  'tipoDocumento' => $this->input->post('tipoDocumento'),
							  'numeroDocumento' => $this->input->post('numeroDocumento'),
							  'fechaNacimiento' => $this->input->post('fechaNacimiento'),
							  'email' => $this->input->post('email'),
							  'direccion' => $this->input->post('direccion'),
							  'telefono' => $this->input->post('telefono'),
							  'celular' => $this->input->post('celular'),
							  'nombreUsuario' => $this->input->post('nombreUsuario'),
							  'contrasena' => $this->input->post('contrasena'),
							  'contrasena2' => $this->input->post('contrasena2'),
							  'tarjeta_credito' => $tarjeta						
						);

				$this->load->model('Usuario');
				$usuario = new Usuario($data,1);
				$usuario->registrar();		
					
				$head['success'] = 'Usuario registrado correctamente';		
				$head['link'] = '/encar/index.php/usuarios/registrar_vista';
				$head['boton'] = 'usuario';	

				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/success');			
				$this->load->view('basic/footer');			

			}else{
					
				$this->load->view('basic/header');
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/registrar_usuario');							
				$this->load->view('basic/footer');								

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
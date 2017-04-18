<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Encar extends CI_controller{

		public function index(){
					
			$this->load->helper('url');
			$this->load->view('basic/header');
			$this->barra_nav();
			$this->load->view('basic/content');		
			$this->load->view('basic/footer');

		}	

		public function loginvista(){

			$this->load->library('session');

			$this->load->helper('url');
			$this->load->view('basic/header');
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/login');			
			$this->load->view('basic/footer');

		}		

		public function registrar_usuariovista(){

			$this->load->library('session');			
					
			$this->load->helper('url');
			$this->load->view('basic/header');
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/registrar_usuario');			
			$this->load->view('basic/footer');

		}

		public function registrar_adminsedevista(){

			$this->load->library('session');			
				
			$this->load->helper('url');
			$this->load->view('basic/header');
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/registrar_adminsede');			
			$this->load->view('basic/footer');

		}

		public function registrar_vehiculovista(){

			$this->load->library('session');
					
			$this->load->helper('url');
			$this->load->view('basic/header');
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/registrar_vehiculo');			
			$this->load->view('basic/footer');

		}

		public function registrar_codigovista(){

			$this->load->library('session');

			$this->load->helper('url');
			$this->load->view('basic/header');
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/registrar_codigodescuento');			
			$this->load->view('basic/footer');

		}

		public function registrar_usuariomodelo(){

			$this->load->library('session');

			$data = array('numero' => $this->input->post('numero'),
						'codigo_seguridad' => $this->input->post('codigo_seguridad'),
						'fecha_vencimiento' => $this->input->post('fecha_vencimiento'),
						'saldo' => $this->input->post('saldo')
					);

			$this->load->model('TarjetaCredito');
			$tarjeta = new TarjetaCredito($data);			
			$head['tarjeta'] = $data;

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
			$usuario = new Usuario($data);
			$errores = $usuario->validar();
			

			if ($errores[0] == ''){

				$usuario->registrar();
		
				$head['success'] = 'Usuario registrado correctamente';	
				$head['link'] = '/encar/index.php/encar/registrar_usuariovista';	
				$head['boton'] = 'usuario';	
																		
				$this->load->helper('url');
				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/success');			
				$this->load->view('basic/footer');				

			}else{

				$head['errores'] = $errores;
				$head['usuario'] = $data;									
				$this->load->helper('url');
				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/error');
				$this->load->view('encar/registrar_usuario');							
				$this->load->view('basic/footer');									

			}
		}

		public function registrar_adminsedemodelo(){

			$this->load->library('session');

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
						'contrasena2' => $this->input->post('contrasena2')
					);

				$this->load->model('UsuarioAdministradorSede');
				$usuarioadminsede = new UsuarioAdministradorSede($data);	
				$errores = $usuarioadminsede->validar();

			if ($errores[0] == '') {

				$usuarioadminsede->registrar();
			
				$head['success'] = 'Administrador registrado correctamente';	
				$head['link'] = '/encar/index.php/encar/registrar_adminsedevista';	
				$head['boton'] = 'administrador';	

				$this->load->helper('url');
				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/success');			
				$this->load->view('basic/footer');			

			}else{

				$head['errores'] = $errores;
				$head['admin'] = $data;					
				$this->load->helper('url');
				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/error');
				$this->load->view('encar/registrar_adminsede');							
				$this->load->view('basic/footer');								

			}
		}

		public function registrar_vehiculomodelo(){

			$this->load->library('session');	

			$data = array('placa' => $this->input->post('placa'),
						'precio' => $this->input->post('precio'),
						'categoria' => $this->input->post('categoria'),
						'transmision' => $this->input->post('transmision'),
						'combustible' => $this->input->post('combustible'),
						'color' => $this->input->post('color')
					);

			$this->load->model('Vehiculo');
			$vehiculo = new Vehiculo($data);	
			$errores = $vehiculo->validar();

			if ($errores[0] == '') {

				$vehiculo->registrar();
			
				$head['success'] = 'Vehiculo registrado correctamente';		
				$head['link'] = '/encar/index.php/encar/registrar_vehiculovista';
				$head['boton'] = 'vehiculo';	

				$this->load->helper('url');
				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/success');			
				$this->load->view('basic/footer');			

			}else{

				$head['errores'] = $errores;
				$head['vehiculo'] = $data;					
				$this->load->helper('url');
				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/error');
				$this->load->view('encar/registrar_vehiculo');							
				$this->load->view('basic/footer');								

			}
		}		

		public function registrar_codigodescuentomodelo(){

			$this->load->library('session');	

			$data = array('codigo' => $this->input->post('codigo'),
						'fecha_vencimiento' => $this->input->post('fecha_vencimiento'),
						'patrocinador' => $this->input->post('patrocinador')
					);

			$this->load->model('CodigoDescuento');
			$codigo = new CodigoDescuento($data);			
			$errores = $codigo->validar();

			if ($errores[0] == '') {

				$codigo->registrar();
			
				$head['success'] = 'Codigo de descuento registrado correctamente';	
				$head['link'] = '/encar/index.php/encar/registrar_codigovista';	
				$head['boton'] = 'codigo de descuento';	

				$this->load->helper('url');
				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/success');			
				$this->load->view('basic/footer');			

			}else{

				$head['errores'] = $errores;
				$head['codigo'] = $data;					
				$this->load->helper('url');
				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/error');
				$this->load->view('encar/registrar_codigodescuento');							
				$this->load->view('basic/footer');										

			}
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
				$head['errores'] = $errores;			
				$this->load->helper('url');
				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/error');
				$this->load->view('encar/login');							
				$this->load->view('basic/footer');



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

				$errores[] = 'El usuario no existe en nuestra base de datos';
				$head['errores'] = $errores;			
				$this->load->helper('url');
				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/error');
				$this->load->view('encar/login');							
				$this->load->view('basic/footer');
		



				}

			}
			
		}

		public function logout(){

			$this->load->library('session');

			$this->session->unset_userdata('ci_session');

			$session_data = $this->session->userdata('ci_session');
			$data['tipo'] = $session_data['tipo'];

			$this->load->helper('url');
			$this->load->view('basic/header');

			if (isset($data['tipo'])) {

				if ($data['tipo'] == 'usuario') {

					$log['usuario'] = $session_data['username'];
					$this->load->view('basic/nav_usuario',$log);	

				}elseif($data['tipo'] == 'administrador'){

					$log['usuario'] = $session_data['username'];
					$this->load->view('basic/nav_administrador',$log);

				}

			}else{
				$this->load->view('basic/nav');				
			}

			$this->load->view('basic/content');				
			$this->load->view('basic/footer');

		}

		public function barra_nav(){

			$this->load->library('session');

			$session_data = $this->session->userdata('ci_session');
			$data['tipo'] = $session_data['tipo'];	
					
			if (isset($data['tipo'])) {

				if ($data['tipo'] == 'usuario') {

					$log['usuario'] = $session_data['username'];
					$this->load->view('basic/nav_usuario',$log);	

				}elseif($data['tipo'] == 'administrador'){

					$log['usuario'] = $session_data['username'];
					$this->load->view('basic/nav_administrador',$log);

				}

			}else{

				$this->load->view('basic/nav');	

			}

		}						
																			
	}
?>
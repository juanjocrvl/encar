<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Vehiculos extends CI_controller{

		public function registrar_vista(){
			
			$this->load->model('Sede');	
			$lista['sedes'] = $this->Sede->obtener_sedes();
			$this->load->view('basic/header',$lista);
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/registrar_vehiculo');			
			$this->load->view('basic/footer');

		}

		public function registrar_modelo(){	

			$this->load->model('Vehiculo');	
			$errores = $this->Vehiculo->validar();

			if ($errores == TRUE) {

				$data = array('placa' => $this->input->post('placa'),
						'precio' => $this->input->post('precio'),
						'categoria' => $this->input->post('categoria'),
						'transmision' => $this->input->post('transmision'),
						'combustible' => $this->input->post('combustible'),
						'color' => $this->input->post('color'),
						'sede' => $this->input->post('sede')						
						);	

				$vehiculo = new Vehiculo($data);
				$vehiculo->registrar();
			
				$head['success'] = 'Vehiculo registrado correctamente';		
				$head['link'] = '/encar/index.php/Vehiculos/registrar_vista';
				$head['boton'] = 'Registrar nuevo vehiculo';	

				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/success');			
				$this->load->view('basic/footer');			

			}else{

				$this->load->model('Sede');	
				$lista['sedes'] = $this->Sede->obtener_sedes();					
				$this->load->view('basic/header',$lista);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/registrar_vehiculo');							
				$this->load->view('basic/footer');								

			}

		}

		public function listar(){

			$this->load->model('Vehiculo');				
			$lista['vehiculos'] = $this->Vehiculo->obtener_vehiculos();	
			$this->load->view('basic/header',$lista);
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/listar_vehiculos');			
			$this->load->view('basic/footer');
		
		}	

		public function catalogo(){

			$this->load->model('Vehiculo');	
			$this->load->model('Sede');			
			$lista['vehiculos'] = $this->Vehiculo->obtener_vehiculos_catalogo($this->input->post('sede'));
			$lista['sedes'] = $this->Sede->obtener_sedes();				
			$this->load->view('basic/header',$lista);
			$this->barra_nav();
			$this->load->view('basic/content');	
			$this->load->view('encar/catalogo_vehiculos');			
			$this->load->view('basic/footer');
		
		}		

		public function mover_vista($placa){

			$this->load->model('Sede');	
			$data['sedes'] = $this->Sede->obtener_sedes();		
			$data['placa'] = $placa;

			$this->load->model('Vehiculo');	
			$vehiculo = $this->Vehiculo->obtener_vehiculo($placa);

			if ($vehiculo == FALSE) {

				$errores[] = 'No se encontro el vehiculo intente denuevo';
				$head['errores'] = $errores;			
				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/error');						
				$this->load->view('basic/footer');

			}else{

				$data['sede'] = $vehiculo[0]->sede;			
				$this->load->view('basic/header',$data);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/mover_vehiculo');			
				$this->load->view('basic/footer');

			}
		
		}

		public function mover_modelo($placa){

			$this->load->model('Vehiculo');	
			$errores = $this->Vehiculo->validar_mover();

			if ($errores == TRUE) {

				$vehiculo = $this->Vehiculo->obtener_vehiculo($placa);	

				$data = array('placa' => $vehiculo[0]->placa,
						  	  'precio' => $vehiculo[0]->precio,
							  'categoria' => $vehiculo[0]->categoria,
							  'transmision' => $vehiculo[0]->transmision,
							  'combustible' => $vehiculo[0]->precio,
							  'color' => $vehiculo[0]->color,
							  'sede' => $this->input->post('sede_nueva')												  						
						);

				$vehiculo = new Vehiculo($data);
				$vehiculo->actualizar();
			
				$head['success'] = 'Vehiculo movido correctamente';		

				$this->load->view('basic/header',$head);
				$this->barra_nav();
				$this->load->view('basic/content');	
				$this->load->view('encar/success');			
				$this->load->view('basic/footer');			

			}else{

				$this->mover_vista($placa);								

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
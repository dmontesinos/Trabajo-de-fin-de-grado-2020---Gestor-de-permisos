<?php
	require_once '../CAS/config.php';
	require_once '../' . $phpcas_path . '/CAS.php';

	phpCAS::setDebug();
	phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context);
	phpCAS::setNoCasServerValidation();
	phpCAS::forceAuthentication();

	// Hace logout if si lo solicita
	if (isset($_REQUEST['logout'])) {
		phpCAS::logout();
	}

   
   
   
	if(!isset($_SESSION['niu'])){
		include_once "models/conexionBD.php";
    	include_once "models/Administradores/consultarAdministrador.php";
  
		if(consultarAdmin(conexionBD(), phpCAS::getUser())) {
			$_SESSION['niu'] = phpCAS::getUser();
		} 
	}


	if(isset($_SESSION["niu"])) {
		$accion = $_GET['accion'] ?? null;

		switch ($accion) {
			// Gestión de Centros
			case 'centros':
				require __DIR__.'/controllers/Centros/centros.php';
				break;
			case 'addCentro':
				require __DIR__.'/controllers/Centros/addCentro.php';
				break;
			case 'editCentro':
				require __DIR__.'/controllers/Centros/editCentro.php';
				break;
			case 'delCentro':
				require __DIR__.'/controllers/Centros/delCentro.php';
				break;


			// Gestión de Estudios
			case 'estudios':
				require __DIR__.'/controllers/Estudios/estudios.php';
				break;
			case 'addEstudio':
				require __DIR__.'/controllers/Estudios/addEstudio.php';
				break;
			case 'editEstudio':
				require __DIR__.'/controllers/Estudios/editEstudio.php';
				break;
			case 'delEstudio':
				require __DIR__.'/controllers/Estudios/delEstudio.php';
				break;


			// Gestión de Asignaturas
			case 'asignaturas':
				require __DIR__.'/controllers/Asignaturas/asignaturas.php';
				break;
			case 'addAsignatura':
				require __DIR__.'/controllers/Asignaturas/addAsignatura.php';
				break;
			case 'editAsignatura':
				require __DIR__.'/controllers/Asignaturas/editAsignatura.php';
				break;
			case 'delAsignatura':
				require __DIR__.'/controllers/Asignaturas/delAsignatura.php';
				break;

			// Gestión de profesores
			case 'profesores':
				require __DIR__.'/controllers/Profesores/profesores.php';
				break;
			case 'addProfesor':
				require __DIR__.'/controllers/Profesores/addProfesor.php';
				break;
			case 'editProfesor':
				require __DIR__.'/controllers/Profesores/editProfesor.php';
				break;
			case 'delProfesor':
				require __DIR__.'/controllers/Profesores/delProfesor.php';
				break;

			// Gestión de grupos
			case 'grupos':
				require __DIR__.'/controllers/Grupos/grupos.php';
				break;
			case 'addGrupo':
				require __DIR__.'/controllers/Grupos/addGrupo.php';
				break;
			case 'delGrupo':
				require __DIR__.'/controllers/Grupos/delGrupo.php';
				break;

			// Gestión de departamentos
			case 'departamentos':
				require __DIR__.'/controllers/Departamentos/departamentos.php';
				break;
			case 'addDepartamento':
				require __DIR__.'/controllers/Departamentos/addDepartamento.php';
				break;
			case 'editDepartamento':
				require __DIR__.'/controllers/Departamentos/editDepartamento.php';
				break;
			case 'delDepartamento':
				require __DIR__.'/controllers/Departamentos/delDepartamento.php';
				break;
			case 'asignarProfesorDepartamento':
				require __DIR__.'/controllers/Departamentos/asignarProfesorDepartamento.php';
				break;

			// Gestión de cargos
			case 'cargos':
				require __DIR__.'/controllers/Cargos/cargos.php';
				break;
			case 'addCargo':
				require __DIR__.'/controllers/Cargos/addCargo.php';
				break;
			case 'editCargo':
				require __DIR__.'/controllers/Cargos/editCargo.php';
				break;
			case 'delCargo':
				require __DIR__.'/controllers/Cargos/delCargo.php';
				break;
			case 'asignarProfesorCargo':
				require __DIR__.'/controllers/Cargos/asignarProfesorCargo.php';
				break;


			// Gestión de objetos
			case 'objetos':
				require __DIR__.'/controllers/Objetos/objetos.php';
				break;
			case 'addObjeto':
				require __DIR__.'/controllers/Objetos/addObjeto.php';
				break;
			case 'editObjeto':
				require __DIR__.'/controllers/Objetos/editObjeto.php';
				break;
			case 'delObjeto':
				require __DIR__.'/controllers/Objetos/delObjeto.php';
				break;
			case 'asignarPermisosObjeto':
				require __DIR__.'/controllers/Objetos/asignarPermisos.php';
				break;

			// Importación
			case 'importacion':
				require __DIR__.'/controllers/Importacion/importacion.php';
				break;
			
			// Cerrar sesión
			case 'logout':
				phpCAS::logout();
				break;

			default:
				require __DIR__ .'/controllers/portada.php';
				break;
		}
	} else {
		// Si llega hasta aqui, aunque se haya autenticado bien, no esta en el sistema, lo deslogueamos y le denegamos el acceso
		phpCAS::logout();
	}
?>
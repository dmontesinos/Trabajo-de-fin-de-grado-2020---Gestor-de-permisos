<?php
	// Requerim autenticacio al CAS
	// Load the settings from the central config file
	require_once '../CAS/config.php';
	// Load the CAS lib
	require_once '../' . $phpcas_path . '/CAS.php';

	// Enable debugging
	phpCAS::setDebug();

	// Initialize phpCAS
	phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context);

	// For production use set the CA certificate that is the issuer of the cert
	// on the CAS server and uncomment the line below
	// phpCAS::setCasServerCACert($cas_server_ca_cert_path);

	// For quick testing you can disable SSL validation of the CAS server.
	// THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
	// VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!
	phpCAS::setNoCasServerValidation();

	// force CAS authentication
	phpCAS::forceAuthentication();

	// at this step, the user has been authenticated by the CAS server
	// and the user's login name can be read with phpCAS::getUser().

	// Identificar alumno
	// Comprueba que phpCAS::getUser() es un usuario del sistema 
	//if((phpCAS::getUser() == "1014671"))
	//{
		//$_SESSION["niu"] = phpCAS::getUser(); // Guardar el niu en variable de sesión

	//} else
	//{
		// Si llega hasta aqui, aunque se haya autenticado bien, no esta en el sistema, lo deslogueamos y le denegamos el acceso
		//phpCAS::logout();
	//}

	// Hace logout if si lo solicita
	if (isset($_REQUEST['logout'])) {
		phpCAS::logout();
	}


session_start();

if((phpCAS::getUser() == "1460920")) {
	$_SESSION["niu"] = phpCAS::getUser(); // Guardar el niu en variable de sesión

} else {
	// Si llega hasta aqui, aunque se haya autenticado bien, no esta en el sistema, lo deslogueamos y le denegamos el acceso
	phpCAS::logout();
}

//session_destroy();
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

	    default:
	        require __DIR__ .'/controllers/portada.php';
	        break;
	}
}

?>

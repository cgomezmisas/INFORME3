<?php

if( isset( $_POST[ 'Submit' ]  ) ) {
	// Get input
	$target = trim($_REQUEST[ 'ip' ]);

	// Set blacklist
	$substitutions = array(
		'||' => '',
		'&'  => '',
		';'  => '',
		'| ' => '',
		'-'  => '',
		'$'  => '',
		'('  => '',
		')'  => '',
		'`'  => '',
	);

	// Remove any of the characters in the array (blacklist).
	//$target = str_replace( array_keys( $substitutions ), $substitutions, $target );

	// Determine OS and execute the ping command.
//	if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
		// Windows
//		$cmd = shell_exec( 'ping  ' . $target );
//	}
//	else {
		// *nix
//		$cmd = shell_exec( 'ping  -c 4 ' . $target );
//	}
// ✅ REEMPLAZA por esto:

// Validar que sea una IP válida (IPv4)
if( !filter_var( $target, FILTER_VALIDATE_IP ) ) {
    $html .= "<pre>IP no válida. Solo se permiten direcciones IPv4.</pre>";
} else {
    // Escapar el argumento antes de pasarlo al shell
    $target = escapeshellarg( $target );

    if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
        $cmd = shell_exec( 'ping ' . $target );
    } else {
        $cmd = shell_exec( 'ping -c 4 ' . $target );
    }

    $html .= "<pre>{$cmd}</pre>";
}
	// Feedback for the end user
	$html .= "<pre>{$cmd}</pre>";
}

?>

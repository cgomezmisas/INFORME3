<?php

if( isset( $_POST[ 'Upload' ] ) ) {
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
  $allowed_exts  = ['jpg', 'jpeg', 'png', 'gif'];
 
  $file_name = basename($_FILES['uploaded']['name']);
  $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
  $file_type = mime_content_type($_FILES['uploaded']['tmp_name']);
 
  if (!in_array($file_type, $allowed_types) ||
      !in_array($file_ext, $allowed_exts)) {
      echo 'Error: solo se permiten imagenes (jpg, png, gif).';
  } else {
      $target = DVWA_WEB_PAGE_TO_ROOT . 'hackable/uploads/' . $file_name;
      move_uploaded_file($_FILES['uploaded']['tmp_name'], $target);
      echo 'Imagen subida correctamente.';
  }
 
	// Where are we going to be writing to?
//	$target_path  = DVWA_WEB_PAGE_TO_ROOT . "hackable/uploads/";
//	$target_path .= basename( $_FILES[ 'uploaded' ][ 'name' ] );

	// Can we move the file to the upload folder?
//	if( !move_uploaded_file( $_FILES[ 'uploaded' ][ 'tmp_name' ], $target_path ) ) {
		// No
//		$html .= '<pre>Your image was not uploaded.</pre>';
//	}
//	else {
		// Yes!
//		$html .= "<pre>{$target_path} succesfully uploaded!</pre>";
//	}
}

?>

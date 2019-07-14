<?php

    $state = json_decode(file_get_contents("state.json"), true);
    
    if (($_FILES['file']['name']!="")){
        $state->num_uploads++;
    	$file = $_FILES['file']['name'];
    	$path = pathinfo($file);
    	$ext = $path['extension'];
    	$temp_name = $_FILES['file']['tmp_name'];
    	$path_filename_ext = "uploads/".$state->numuploads.".".$ext;
        move_uploaded_file($temp_name, $path_filename_ext);
        file_put_contents('myfile.json', json_encode($state));
      
    }
    
    header("Location: index.php");


?>
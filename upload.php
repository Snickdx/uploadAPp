<?php

    $state = json_decode(file_get_contents("state.json"), true);
    
    if (($_FILES['file']['name']!="")){
        $state["num_uploads"]++;
        //echo var_dump($state);
    	$file = $_FILES['file']['name'];
    	$path = pathinfo($file);
    	$ext = $path['extension'];
    	$temp_name = $_FILES['file']['tmp_name'];
    	$path_filename_ext = "uploads/".$state["num_uploads"].".".$ext;
        move_uploaded_file($temp_name, $path_filename_ext);
        file_put_contents('state.json', json_encode($state));
      
    }
    
    header("Location: form.php?upload=true");


?>
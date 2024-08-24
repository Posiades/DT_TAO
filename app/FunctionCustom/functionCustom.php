<?php
     function end_code_imageBase64($path){
        $path_public = public_path($path);
        $imageData = file_get_contents($path_public);
        $base64Image = base64_encode($imageData);
        return $base64Image;
    }


    function end_code_form_imageBase64($file){
        if($file!= null){
        $imageData = file_get_contents($file->getPathname());;
        $base64Image = base64_encode($imageData);
        return $base64Image;
        }
        return null;
    }

    
    


    

<?php
     function end_code_imageBase64($path){
        $imageData = file_get_contents($path->getRealPath());
        $base64Image = base64_encode($imageData);
        return $base64Image;
    }

    

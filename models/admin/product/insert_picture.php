<?php

if(isset($_POST['savePicture'])){
    
    require_once "../../../config/connection.php";
    require_once "product_functions.php";
    require_once "insert_product.php";


    

  

    $file_name = $_FILES['pictue']['name'];
    $tmp_Location = $_FILES['pictue']['tmp_name'];
    $file_type = $_FILES['pictue']['type'];
    $file_size = $_FILES['pictue']['size'];
    

 
    $errors = [];

    $alow_types = ['image/jpg', 'image/jpeg', 'image/png'];

    if(!in_array($file_type, $alow_types)){
        array_push($errors, "Wrong type");
    }
    if($file_size > 3000000){
        array_push($errors, "To heavy");
    }

    
    if(count($errors) == 0){
       

        list($width, $height) = getimagesize($tmp_Location);

       
        
        $permanent_picture = null;
        switch($file_type){
            case 'image/jpeg':
                $permanent_picture = imagecreatefromjpeg($tmp_Location);
                break;
            case 'image/png':
                $permanent_picture = imagecreatefrompng($tmp_Location);
                break;
        }

        $newWidth = 320;
        $newHeight = ($newWidth/$width) * $height; 
        $newPicture = imagecreatetruecolor($newWidth, $newHeight);
        
    
        imagecopyresampled($newPicture, $permanent_picture, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        
        $name = time().$file_name;
        $srcNewPicture = 'assets/img/small/'.$name;

        switch($file_type){
            case 'image/jpeg':
                imagejpeg($newPicture,'../../../'.$srcNewPicture, 75);
                break;
            case 'image/png':
                imagepng($newPicture,'../../../'.$srcNewPicture);
                break;
        }

        $srcOriginalPicture = 'assets/img/'.$name;

        if(move_uploaded_file($tmp_Location, '../../../'.$srcOriginalPicture)){
            

            try {
                insert_product();
                $product_id = $conn->lastInsertId();
                $isInserted = insert($srcOriginalPicture, $srcNewPicture,$product_id);

                if($isInserted){
                    
                    header("Location: ../../../index.php?page=adminpanel");
                }
                
            } catch(PDOException $e){
        
                handle($e->getMessage());
            }
        }

       
        imagedestroy($permanent_picture);
        imagedestroy($newPicture);

    } else {
        var_dump($errors);
    }

}
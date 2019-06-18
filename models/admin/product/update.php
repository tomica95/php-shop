<?php

include "../../../config/connection.php";

include "../../../config/errorHandler.php";

global $conn;

     if(isset($_POST['update-product']))
     {
         $name = $_POST['product-name'];

         $price = $_POST['price'];

         $description = $_POST['description'];

         $category_id = $_POST['category_id'];

         $date = date("Y-m-d H:i:s");

         $id = $_POST['id'];

         
        
         try
            {

                $query = $conn->prepare("UPDATE products SET product_name=:name,price=:price,description=:desc,category_id=:cat_id,date=:date WHERE id=:id");

                $query->execute([
                    "name"=>$name,
                    "price"=>$price,
                    "desc"=>$description,
                    "cat_id"=>$category_id,
                    "date"=>$date,
                    "id"=>$id
                ]);

                $file_name = $_FILES['picture']['name'];
                $tmp_Location = $_FILES['picture']['tmp_name'];
                $file_type = $_FILES['picture']['type'];
                $file_size = $_FILES['picture']['size'];
                
            
             
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
                        
            
                            
                            $update = $conn->prepare("UPDATE pictures SET big_picture=:big,small_picture=:small WHERE product_id=:product_id");
                            
                            $update->execute([
                                "big"=>$srcOriginalPicture,
                                "small"=>$srcNewPicture,
                                "product_id"=>$id
                            ]);
            
                            
                            
                         
                    }
            
                   
                    imagedestroy($permanent_picture);
                    imagedestroy($newPicture);
                }
            }
            catch(Exception $e)
            {
                handle($e->getMessage());
            }

            header('Location:../../../index.php?page=adminpanel');


     }   



?>
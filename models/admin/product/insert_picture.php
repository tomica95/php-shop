<?php

if(isset($_POST['btnSacuvaj'])){
    
    require_once "../../../config/connection.php";
    require_once "product_functions.php";

  

    $fajl_naziv = $_FILES['slika']['name'];
    $fajl_tmpLokacija = $_FILES['slika']['tmp_name'];
    $fajl_tip = $_FILES['slika']['type'];
    $fajl_velicina = $_FILES['slika']['size'];

 
    $greske = [];

    $dozvoljeni_tipovi = ['image/jpg', 'image/jpeg', 'image/png'];

    if(!in_array($fajl_tip, $dozvoljeni_tipovi)){
        array_push($greske, "Pogresan tip fajla. - Profil slika");
    }
    if($fajl_velicina > 3000000){
        array_push($greske, "Maksimalna velicina fajla je 3MB. - Profil slika");
    }

    
    if(count($greske) == 0){
       

        list($sirina, $visina) = getimagesize($fajl_tmpLokacija);

       
        
        $postojecaSlika = null;
        switch($fajl_tip){
            case 'image/jpeg':
                $postojecaSlika = imagecreatefromjpeg($fajl_tmpLokacija);
                break;
            case 'image/png':
                $postojecaSlika = imagecreatefrompng($fajl_tmpLokacija);
                break;
        }

        $novaSirina = 200;
        $novaVisina = ($novaSirina/$sirina) * $visina; 
        $novaSlika = imagecreatetruecolor($novaSirina, $novaVisina);
        
    
        imagecopyresampled($novaSlika, $postojecaSlika, 0, 0, 0, 0, $novaSirina, $novaVisina, $sirina, $visina);

        
        $naziv = time().$fajl_naziv;
        $putanjaNovaSlika = 'assets/img/small/'.$naziv;

        switch($fajl_tip){
            case 'image/jpeg':
                imagejpeg($novaSlika,'../../../'.$putanjaNovaSlika, 75);
                break;
            case 'image/png':
                imagepng($novaSlika,'../../../'.$putanjaNovaSlika);
                break;
        }

        $putanjaOriginalnaSlika = 'assets/img/'.$naziv;

        if(move_uploaded_file($fajl_tmpLokacija, '../../../'.$putanjaOriginalnaSlika)){
            echo "Slika je upload-ovana na server!";

            try {
                $isInserted = insert($putanjaOriginalnaSlika, $putanjaNovaSlika);

                if($isInserted){
                    echo "Putanja do slike je upisana u bazu!";
                    header("Location: ../../../index.php?page=adminpanel");
                }
                
            } catch(PDOException $ex){
                echo $ex->getMessage();
            }
        }

       
        imagedestroy($postojecaSlika);
        imagedestroy($novaSlika);

    } else {
        var_dump($greske);
    }

}
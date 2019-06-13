<?php 

    include "../../config/connection.php";

    include "author_functions.php";

    $author = author();

   // Create new COM object – word.application
    $word = new COM("word.application");

    // Hide MS Word application window
    $word->Visible = 0;

    //Create new document
    $word->Documents->Add();

    // Define page margins
    $word->Selection->PageSetup->LeftMargin = '2';
    $word->Selection->PageSetup->RightMargin = '2';

    // Define font settings
    $word->Selection->Font->Name = 'Arial';
    $word->Selection->Font->Size = 10;

    // Add text
    $word->Selection->TypeText("$author->name \n $author->description");

    // Save document
    $filename = tempnam(sys_get_temp_dir(), "word");
    $word->Documents[1]->SaveAs($filename);

    // Close and quit
    $word->quit();
    unset($word);

    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=Aboutauthor.doc");

    // Send file to browser
    readfile($filename);
    unlink($filename);
?>
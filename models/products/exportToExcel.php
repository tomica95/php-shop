<?php 

require_once "../../config/connection.php";
include "product_functions.php";

$id = $_POST['id'];

$product = singleProduct($id);

$excel = new COM("Excel.Application");

$excel->Visible = 1;

$excel->DisplayAlerts = 1;

$workbook = $excel->WorkBooks->Open("http://localhost/php-shop/data/Product.xlsx") or die ('Could not be able to open filename');

$sheet = $workbook->Worksheets('Sheet1');
$sheet->activate;


//header of table
$field = $sheet->Range("A1");
$field->activate;
$field->value = "Id";

$field = $sheet->Range("B1");
$field->activate;
$field->value= "Product Name";

$field = $sheet->Range("C1");
$field->activate;
$field->value = "Price";

$field = $sheet->Range("D1");
$field->activate;
$field->value = "Description";

$field = $sheet->Range("E1");
$field->activate;
$field->value = "Category";

//about product

$field = $sheet->Range("A2");
$field->activate;
$field->value = "$product->product_id";

$field = $sheet->Range("B2");
$field->activate;
$field->value= "$product->product_name";

$field = $sheet->Range("C2");
$field->activate;
$field->value = "$ $product->price";

$field = $sheet->Range("D2");
$field->activate;
$field->value = "$product->description";

$field = $sheet->Range("E2");
$field->activate;
$field->value = "$product->category_name";

// $workbook->_SaveAs("http://localhost/php-shop/data/Product.xlsx", -4143);
// $workbook->Save();

// $workbook->Saved=true;
// $workbook->Close;

// $excel->Workbooks->Close();
// $excel->Quit();

// unset($sheet);
// unset($workbook);
// unset($excel);

header("Location:../../index.php?page=product&id=$product->product_id");




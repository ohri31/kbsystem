<?php
    require_once('brains/global.php');
    
    require_once('controllers/MainController.php');
    require_once('fpdf/fpdf.php');

    $pdf = new FPDF();
    $pdf->SetFont('Times', 'BI', 16);

    $document = simplexml_load_file("data/xml/articles.xml");
    foreach($document->article as $article)
    {   
      $pdf->AddPage();
      $pdf->Write(10, (string)$article->title.' and the description is: ---->');
      $pdf->write(8, (string)$article->description);
    }

    $pdf->Output("data/pdf/articles.pdf", "I");

    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"" . basename("data/pdf/articles.pdf") . "\""); 
    readfile("data/pdf/articles.pdf");

?>
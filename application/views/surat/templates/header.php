<?php
$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);

        // $pdf->WriteHTML("$headerHtml");
        // mencetak string
        $pdf->Cell(190,7,'PEMERINTAH KABUPATEN '. strtoupper($dpByNik['dp_kabupaten']),0,1,'C');
        $pdf->Cell(190,7,'KECAMATAN '. strtoupper($dpByNik['dp_kecamatan']) ,0,1,'C');
        $pdf->Cell(190,7,'KELURAHAN '. strtoupper($dpByNik['dp_kelurahan']) ,0,1,'C');
        $pdf->Cell(190,7,'',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        // $pdf->garis();

        // 
        $pdf->SetLineWidth(1);
        $pdf->Line(10,36,200,36);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,37,200,37);
        $pdf->Cell(190,7,'',0,1,'C');

        ?>
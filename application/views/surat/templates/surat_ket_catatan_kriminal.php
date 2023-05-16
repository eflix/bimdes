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

        
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,strtoupper($dataSurat['ds_layanan']),0,1,'C');

        $pdf->SetFont('Arial','',12);
        $pdf->Cell(190,7,'Nomor : '.$noSurat,0,1,'C');
        $pdf->Ln();
        
        $pdf->SetFont('Arial','',12);
        // $pdf->SetXY()
        $pdf->MultiCell(190,5,'         Yang bertanda tangan dibawah ini ' . $staff . ' Kecamatan '.$dpByNik['dp_kecamatan'].', Kabupaten '.$dpByNik['dp_kabupaten'] .', Provinsi '.$dpByNik['dp_provinsi'] .' menerangkan yang sebenarnya bahwa :',0,1);

        $pdf->Cell(190,7,'',0,1,'C');

        $pdf->setX(30);$pdf->Cell(60,6,'1.   Nama Lengkap',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_nama'],0,1);

        $pdf->setX(30);$pdf->Cell(60,6,'2.   NIK / No KTP',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_nik'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'3.   No KK',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_no_kk'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'4.   Tempat / Tanggal Lahir',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_tempat_lahir'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'5.   Jenis Kelamin',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_gender'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'6.   Alamat',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_alamat'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'7.   Agama',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_agama'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'8.   Status',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_status_perkawinan'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'9.   Pekerjaan',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_pekerjaan'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'10. Kewarganegaraan',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_kewarganegaraan'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'11. Keperluan',0,0);
        $pdf->MultiCell(110,6,': Sebagai pengantar untuk mendapatkan SKCK yang akan dipergunakan untuk ' .$keperluan,0,1);

        $pdf->Ln();
        $pdf->MultiCell(190,5,'         Orang tersebut diatas adalah benar-benar warga Kelurahan '. $dpByNik['dp_kelurahan'] .' dan menurut data kami tidak pernah terlibat perkara Polisi dan beradat istiadat baik.',0,1);
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->MultiCell(190,5,'         Demikian surat keterangan ini dibuat, untuk dipergunakan sebagaimana mestinya.',0,1);

        $pdf->setY(225);
        // $pdf->setX(30);
        $pdf->Cell(90,6,'',0,0,'C');$pdf->Cell(90,6,$dpByNik['dp_kelurahan'].', '.date('d-m-Y'),0,1,'C');
        // $pdf->setX(30);
        $pdf->Cell(90,6,'',0,0,'C');$pdf->Cell(90,6,$jabatan,0,1,'C');

        $pdf->Cell(190,20,'',0,1,'C');
        // $pdf->setX(30);
        $pdf->Cell(90,6,'',0,0,'C');$pdf->Cell(90,6,$staff,0,1,'C');

        $pdf->Output();
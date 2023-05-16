<?php
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,strtoupper($dataSurat['ds_layanan']),0,1,'C');

        $pdf->SetFont('Arial','',12);
        $pdf->Cell(190,7,'Nomor : '.$noSurat,0,1,'C');
        $pdf->Ln();
        
        $pdf->SetFont('Arial','',12);
        // $pdf->SetXY()
        $pdf->MultiCell(190,5,'Yang bertanda tangan dibawah ini ' . $jabatan . ', Kecamatan '.$dpByNik['dp_kecamatan'].', Kabupaten '.$dpByNik['dp_kabupaten'] .', Provinsi menerangkan yang sebenarnya bahwa :',0,1);

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
        $pdf->Cell(20,6,': ',0,1);
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
        $pdf->Cell(20,6,': ',0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'11. Berlaku mulai',0,0);
        $pdf->Cell(20,6,': '. date('d-m-y',strtotime($tglAwal)) . ' s/d '.date('d-m-y',strtotime($tglAkhir)) ,0,1);

        $pdf->Ln();
        $pdf->MultiCell(190,5,'Orang tersebut adalah benar-benar warga Kelurahan '. $dpByNik['dp_kelurahan'] .' dengan data seperti di atas',0,1);
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->MultiCell(190,5,'Demikian surat keterangan ini dibuat, untuk dipergunakan sebagaimana mestinya.',0,1);

        $pdf->setY(225);
        // $pdf->setX(30);
        $pdf->Cell(90,6,'',0,0,'C');$pdf->Cell(90,6,$dpByNik['dp_kelurahan'].', '.date('d-m-y'),0,1,'C');
        // $pdf->setX(30);
        $pdf->Cell(90,6,'',0,0,'C');$pdf->Cell(90,6,$jabatan,0,1,'C');

        $pdf->Cell(190,20,'',0,1,'C');
        // $pdf->setX(30);
        $pdf->Cell(90,6,'',0,0,'C');$pdf->Cell(90,6,$staff,0,1,'C');

        $pdf->Output();
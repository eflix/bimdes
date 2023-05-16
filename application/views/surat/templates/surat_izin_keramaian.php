<?php
$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();

        $pdf->Image(base_url('assets/img/').$is['is_logo'],15,5,30,30);

        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);

        // $pdf->WriteHTML("$headerHtml");
        // mencetak string
        $pdf->Cell(190,7,'PEMERINTAH KABUPATEN '. strtoupper($is['is_kabupaten']),0,1,'C');
        $pdf->Cell(190,7,'KECAMATAN '. strtoupper($is['is_kecamatan']) ,0,1,'C');
        $pdf->Cell(190,7,'KELURAHAN '. strtoupper($is['is_kelurahan']) ,0,1,'C');

         $pdf->SetFont('Arial','',11,'C');
        $pdf->Cell(190,7,$is['is_alamat'],0,1,'C');

        $pdf->Cell(190,0,'',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        // $pdf->garis();

        // 
        $pdf->SetLineWidth(1);
        $pdf->Line(10,40,200,40);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,41,200,41);
        $pdf->Cell(190,7,'',0,1,'C');
        
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,strtoupper($dataSurat['ds_layanan']),0,1,'C');

        $pdf->SetFont('Arial','',12);
        $pdf->Cell(190,7,'Nomor : '.$noSurat,0,1,'C');
        $pdf->Ln();
        
        $pdf->SetFont('Arial','',12);
        // $pdf->SetXY()
        $pdf->MultiCell(190,5,'         Yang bertanda tangan dibawah ini ' . $atasNama . ', Kecamatan '.$dpByNik['dp_kecamatan'].', Kabupaten '.$dpByNik['dp_kabupaten'] .', Provinsi '.$dpByNik['dp_provinsi'] .' menerangkan yang sebenarnya bahwa :',0,1);

        $pdf->Cell(190,7,'',0,1,'C');

        $pdf->setX(30);$pdf->Cell(60,6,'Nama Lengkap',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_nama'],0,1);

        $pdf->setX(30);$pdf->Cell(60,6,'NIK / No KTP',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_nik'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'No KK',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_no_kk'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'Tempat / Tanggal Lahir',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_tempat_lahir'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'Jenis Kelamin',0,0);
        $pdf->Cell(20,6,': ',0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'Alamat',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_alamat'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'Agama',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_agama'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'Status',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_status_perkawinan'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'Pekerjaan',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_pekerjaan'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'Kewarganegaraan',0,0);
        $pdf->Cell(20,6,': '.$dpByNik['dp_kewarganegaraan'],0,1);
        $pdf->setX(30);$pdf->Cell(60,6,'Keperluan',0,0);
        $pdf->Cell(20,6,': ',0,1);

        $pdf->Ln();
        $pdf->MultiCell(190,5,'         Orang tersebut adalah benar-benar warga Kelurahan '. $dpByNik['dp_kelurahan'] .' dengan data seperti di atas',0,1);
        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->MultiCell(190,5,'         Demikian surat keterangan ini dibuat, untuk dipergunakan sebagaimana mestinya.',0,1);

        $pdf->setY(225);
        // $pdf->setX(30);
        $pdf->Cell(90,6,'',0,0,'C');$pdf->Cell(90,6,$is['is_desa'].', '.date('d-m-Y'),0,1,'C');
        // $pdf->setX(30);
        $pdf->Cell(90,6,'',0,0,'C');$pdf->Cell(90,6,'Kepala Desa ' . $is['is_desa'],0,1,'C');

        $pdf->Cell(190,20,'',0,1,'C');
        // $pdf->setX(30);
        $pdf->Cell(90,6,'',0,0,'C');$pdf->Cell(90,6,$is['is_kepala_desa'],0,1,'C');

        $pdf->setY(270);
        $pdf->SetFont('Arial','I',8);

        $pdf->Cell(90,6,'Surat ini dicetak dengan Aplikasi Surat Desa || '. $staff ,0,0,'C');

        $pdf->Output();
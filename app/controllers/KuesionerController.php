<?php

class KuesionerController extends BaseController {

	// Bikin filter buat redirect user tanpa authentication
	// format array ( 'URI yang mau di redirect' => 'Redirect ke URI')
    public function __construct()
    {
        $this->beforeFilter('auth', array('kuesioner' => 'login'));
    }

	public function getIndex()
	{
		$kuesioners = Kuesioner::all();
		return View::make('kuesioner.index')->with('kuesioners', $kuesioners);
	}

	public function getNew()
	{
		return View::make('kuesioner.create');
	}

	public function postNew()
	{
		$kuesioner = new Kuesioner;
		$kuesioner->fill(Input::all());

		$kuesioner->user = Auth::user()->username;

	    $pmodall = $kuesioner->modall / ($kuesioner->modala + $kuesioner->modals + $kuesioner->modall);

	    if ($pmodall = 1) {$kuesioner->pmodal = '1';}
	    elseif ($pmodall <= 0.75) {$kuesioner->pmodal = '2';}
	    elseif ($pmodall <= 0.5) {$kuesioner->pmodal = '3';}
	    elseif ($pmodall <= 0.25) {$kuesioner->pmodal = '4';}
	    elseif ($pmodall = 0) {$kuesioner->pmodal = '5';}

	    $rlaba = $kuesioner->sales - $kuesioner->expense;
	    $prlaba = $rlaba / $kuesioner->sales;

	    if ($rlaba <= 10000000) {$kuesioner->laba = '1';}
	    elseif ($rlaba <= 20000000) {$kuesioner->laba = '2';}
	    elseif ($rlaba <= 50000000) {$kuesioner->laba = '3';}
	    elseif ($rlaba <= 100000000) {$kuesioner->laba = '4';}
	    elseif ($rlaba > 100000000) {$kuesioner->laba = '5';}

	    if ($prlaba <= 0.05) {$kuesioner->plaba = '1';}
	    elseif ($prlaba <= 0.1) {$kuesioner->plaba = '2';}
	    elseif ($prlaba <= 0.15) {$kuesioner->plaba = '3';}
	    elseif ($prlaba <= 0.25) {$kuesioner->plaba = '4';}
	    elseif ($prlaba > 0.25) {$kuesioner->plaba = '5';}

		$liq = ($kuesioner->kas + $kuesioner->ar + $kuesioner->inv) / ($kuesioner->ca + $kuesioner->std);
		$sol = ($kuesioner->kas + $kuesioner->ar + $kuesioner->inv + $kuesioner->ld + $kuesioner->bd + $kuesioner->me + $kuesioner->vc + $kuesioner->oa) / ($kuesioner->ltd + $kuesioner->std);
		$prf = ($kuesioner->sales - $kuesioner->expense) / ($kuesioner->modals + $kuesioner->modall);

		$ramen = ($kuesioner->surat + $kuesioner->sistem + $kuesioner->sertifikasi + $kuesioner->struktur + $kuesioner->mutu + $kuesioner->tugas) / 6;
		$rapeng = ($kuesioner->pmodal + $kuesioner->laba + $kuesioner->plaba + $kuesioner->bank) / 4;

		if ($liq >= 2 and $sol >= 2 and $prf >= 1.5) { $kepkeu = 3; $saran = 'Tetap Pertahankan Likuiditas, Solvabilitas dan Profitabilitas perusahaan Anda'; }
		elseif ($liq >= 2 and $sol >= 2 and $prf < 1.5) { $kepkeu = 2; $saran = 'Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=0.15 dan anda dapat melaksanakan go publik'; }
		elseif ($liq >= 2 and $sol < 2 and $prf >= 1.5) { $kepkeu = 3; $saran = 'Anda harus menambah kas,piutang,persediaan barang,tanah,bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik'; }
		elseif ($liq >= 2 and $sol < 2 and $prf < 1.5) { $kepkeu = 2; $saran = 'Anda harus menambah kas,piutang,persediaan barang,tanah,bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik'; }
		elseif ($liq < 2 and $sol >= 2 and $prf >= 1.5) { $kepkeu = 2; $saran = 'Anda harus menambah kas,piutang,persediaan barang,tanah,bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik'; }
		elseif ($liq < 2 and $sol >= 2 and $prf < 1.5) { $kepkeu = 1; $saran = 'Anda harus menambah kas,piutang,atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik'; }
		elseif ($liq < 2 and $sol < 2 and $prf >= 1.5) { $kepkeu = 2; $saran = 'Anda harus menambah kas,piutang,atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus menambah asset tanah,bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik'; }
		elseif ($liq < 2 and $sol < 2 and $prf < 1.5) { $kepkeu = 1; $saran = 'Anda harus menambah kas,piutang,atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus menambah asset tanah,bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik'; }

		if ($ramen >= 4 and $rapeng >= 4) { $kepman = 3; }
		elseif ($ramen >= 4 and $rapeng < 4) { $kepman = 2; }
		elseif ($ramen < 4 and $rapeng >= 4) { $kepman = 2; }
		elseif ($ramen < 4 and $rapeng < 4) { $kepman = 1; }

		if ($kuesioner->go) { $kepakh = 'Anda Sudah Go Public'; }
		elseif (!$kuesioner->go and $kepkeu = 3 and $kepman = 3) { $kepakh = 'Emiten dan Invest (Go Publik)'; }
		elseif (!$kuesioner->go and $kepkeu = 3 and $kepman = 3) { $kepakh = 'Emiten dan Invest (Go Publik)'; }
		elseif (!$kuesioner->go and $kepkeu = 3 and $kepman <= 2) { $kepakh = 'Invest'; }
		elseif (!$kuesioner->go and $kepkeu = 2 and $kepman >= 1) { $kepakh = 'Invest'; }
		elseif (!$kuesioner->go and $kepkeu = 2 and $kepman = 1) { $kepakh = 'Tidak Go Publik dan Invest'; }
		elseif (!$kuesioner->go and $kepkeu = 1) { $kepakh = 'Tidak Go Publik dan Invest'; }

		$kuesioner->liq = $liq;
		$kuesioner->sol = $sol;
		$kuesioner->prf = $prf;
		$kuesioner->kepakh = $kepakh;
		$kuesioner->saran = $saran;

		$kuesioner->save();
		return Redirect::to('kuesioner.index');
	}

	public function getDetail($id)
	{
    $kuesioner = Kuesioner::find($id);
		return View::make('kuesioner.view')->with('kuesioner', $kuesioner);
	}

	public function getEdit($id)
	{
		$kuesioner = Kuesioner::find($id);
		return View::make('kuesioner.edit')->with('kuesioner', $kuesioner);
	}

	public function putEdit($id)
	{
		$kuesioner = Kuesioner::find($id);
		$kuesioner->fill(Input::all());

	    $pmodall = $kuesioner->modall / ($kuesioner->modala + $kuesioner->modals + $kuesioner->modall);

	    if ($pmodall <= 0.15) {$kuesioner->pmodal = '5';}
	    elseif ($pmodall <= 0.25) {$kuesioner->pmodal = '4';}
	    elseif ($pmodall <= 0.5) {$kuesioner->pmodal = '3';}
	    elseif ($pmodall <= 0.75) {$kuesioner->pmodal = '2';}
	    elseif ($pmodall <= 1) {$kuesioner->pmodal = '1';}

	    $rlaba = $kuesioner->sales - $kuesioner->expense;
	    $prlaba = $rlaba / $kuesioner->sales;

	    if ($rlaba <= 10000000) {$kuesioner->laba = '1';}
	    elseif ($rlaba <= 20000000) {$kuesioner->laba = '2';}
	    elseif ($rlaba <= 50000000) {$kuesioner->laba = '3';}
	    elseif ($rlaba <= 100000000) {$kuesioner->laba = '4';}
	    elseif ($rlaba > 100000000) {$kuesioner->laba = '5';}

	    if ($prlaba <= 0.05) {$kuesioner->plaba = '1';}
	    elseif ($prlaba <= 0.1) {$kuesioner->plaba = '2';}
	    elseif ($prlaba <= 0.15) {$kuesioner->plaba = '3';}
	    elseif ($prlaba <= 0.25) {$kuesioner->plaba = '4';}
	    elseif ($prlaba > 0.25) {$kuesioner->plaba = '5';}

		$liq = ($kuesioner->kas + $kuesioner->ar + $kuesioner->inv) / ($kuesioner->ca + $kuesioner->std);
		$sol = ($kuesioner->kas + $kuesioner->ar + $kuesioner->inv + $kuesioner->ld + $kuesioner->bd + $kuesioner->me + $kuesioner->vc + $kuesioner->oa) / ($kuesioner->ltd + $kuesioner->std);
		$prf = ($kuesioner->sales - $kuesioner->expense) / ($kuesioner->modals + $kuesioner->modall);

		$ramen = ($kuesioner->surat + $kuesioner->sistem + $kuesioner->sertifikasi + $kuesioner->struktur + $kuesioner->mutu + $kuesioner->tugas) / 6;
		$rapeng = ($kuesioner->pmodal + $kuesioner->laba + $kuesioner->plaba + $kuesioner->bank) / 4;

		if ($liq >= 2 and $sol >= 2 and $prf >= 1.5) { $kepkeu = 3; $saran = 'Tetap Pertahankan Likuiditas, Solvabilitas dan Profitabilitas perusahaan Anda'; }
		elseif ($liq >= 2 and $sol >= 2 and $prf < 1.5) { $kepkeu = 2; $saran = 'Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik'; }
		elseif ($liq >= 2 and $sol < 2 and $prf >= 1.5) { $kepkeu = 3; $saran = 'Anda harus menambah kas,piutang,persediaan barang,tanah,bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik'; }
		elseif ($liq >= 2 and $sol < 2 and $prf < 1.5) { $kepkeu = 2; $saran = 'Anda harus menambah kas,piutang,persediaan barang,tanah,bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik'; }
		elseif ($liq < 2 and $sol >= 2 and $prf >= 1.5) { $kepkeu = 2; $saran = 'Anda harus menambah kas,piutang,persediaan barang,tanah,bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik'; }
		elseif ($liq < 2 and $sol >= 2 and $prf < 1.5) { $kepkeu = 1; $saran = 'Anda harus menambah kas,piutang,atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik'; }
		elseif ($liq < 2 and $sol < 2 and $prf >= 1.5) { $kepkeu = 2; $saran = 'Anda harus menambah kas,piutang,atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus menambah asset tanah,bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan anda dapat melaksanakan go publik'; }
		elseif ($liq < 2 and $sol < 2 and $prf < 1.5) { $kepkeu = 1; $saran = 'Anda harus menambah kas,piutang,atau persediaan barang anda dan mengurangi hutang anda baik hutang lancar ataupun hutang jangka pendek agar likuditas anda >= 2 selain itu Anda harus menambah asset tanah,bangunan dan mesin-mesin anda dan mengurangi hutang anda baik hutang jangka panjang ataupun hutang jangka pendek agar solvabilitas anda >= 2 dan Anda harus meningkatkan penjualan atau mengurangi cost (biaya) agar profitabilitas anda >=1.5 dan anda dapat melaksanakan go publik'; }

		if ($ramen >= 4 and $rapeng >= 4) { $kepman = 3; }
		elseif ($ramen >= 4 and $rapeng < 4) { $kepman = 2; }
		elseif ($ramen < 4 and $rapeng >= 4) { $kepman = 2; }
		elseif ($ramen < 4 and $rapeng < 4) { $kepman = 1; }

		if ($kuesioner->go) { $kepakh = 'Anda Sudah Go Public'; }
		elseif (!$kuesioner->go and $kepkeu = 3 and $kepman = 3) { $kepakh = 'Emiten dan Invest (Go Publik)'; }
		elseif (!$kuesioner->go and $kepkeu = 3 and $kepman = 3) { $kepakh = 'Emiten dan Invest (Go Publik)'; }
		elseif (!$kuesioner->go and $kepkeu = 3 and $kepman <= 2) { $kepakh = 'Invest'; }
		elseif (!$kuesioner->go and $kepkeu = 2 and $kepman >= 1) { $kepakh = 'Invest'; }
		elseif (!$kuesioner->go and $kepkeu = 2 and $kepman = 1) { $kepakh = 'Tidak Go Publik dan Invest'; }
		elseif (!$kuesioner->go and $kepkeu = 1) { $kepakh = 'Tidak Go Publik dan Invest'; }

		$kuesioner->liq = $liq;
		$kuesioner->sol = $sol;
		$kuesioner->prf = $prf;
		$kuesioner->kepakh = $kepakh;
		$kuesioner->saran = $saran;

		$kuesioner->save();
		return Redirect::to('kuesioner/detail/'.$id);
	}

	public function getDelete($id)
	{
		$kuesioner = Kuesioner::find($id);
		$kuesioner->delete();
		return Redirect::to('kuesioner.index');
	}

  // TODO - EDIT PDF
  public function getPrint($id)
  {
    $kuesioner = Kuesioner::find($id);
    $fpdf = new Fpdf();
    $fpdf->AddPage('P', '', 'A4');

    // header
    $fpdf->SetFont('Arial','B',16); $fpdf->Cell(50,10,'Kuesioner #' . $kuesioner->id ,0,0,'');
    $fpdf->Image('img/logo.png',130,10,75);
    $fpdf->Ln(20);

    // body
    $fpdf->SetFont('Arial','B',14); $fpdf->Cell( 95, 10, 'Data Umum'); $fpdf->Cell( 95, 10, 'Aspek Keuangan'); $fpdf->Ln();
    $fpdf->SetFont('Arial','B',12); $fpdf->Cell( 95, 8, 'Kontak Perusahaan'); $fpdf->Cell( 95, 8, 'Likuiditas : ' . round($kuesioner->liq,2) ); $fpdf->Ln(8);
    $fpdf->SetFont('Arial','',12);
    $fpdf->Cell( 95, 8, 'Nama Perusahaan : ' . $kuesioner->nama); $fpdf->Cell( 95, 8, 'Kas dan Setara Kas : ' . 'Rp ' . number_format($kuesioner->kas, 0, ',', '.')); $fpdf->Ln(8);
    $fpdf->Cell( 95, 8, 'Alamat : ' . $kuesioner->alamat); $fpdf->Cell( 95, 8, 'Piutang : ' . 'Rp ' . number_format($kuesioner->ar, 0, ',', '.')); $fpdf->Ln(8);
    $fpdf->Cell( 95, 8, 'Kota : ' . $kuesioner->kota); $fpdf->Cell( 95, 8, 'Persediaan : ' . 'Rp ' . number_format($kuesioner->inv, 0, ',', '.')); $fpdf->Ln(8);
    $fpdf->Cell( 95, 8, 'Telepon : ' . $kuesioner->telp); $fpdf->Cell( 95, 8, 'Hutang Lancar : ' . 'Rp ' . number_format($kuesioner->ca, 0, ',', '.')); $fpdf->Ln(8);
    $fpdf->Cell( 95, 8, 'Fax : ' . $kuesioner->fax); $fpdf->Cell( 95, 8, 'Hutang Jangka Pendek : ' . 'Rp ' . number_format($kuesioner->ltd, 0, ',', '.')); $fpdf->Ln(8);
    $fpdf->Cell( 95, 8, 'Handphone : ' . $kuesioner->hp);
    $fpdf->SetFont('Arial','B',12); $fpdf->Cell( 95, 8, 'Solvabilitas : ' . round($kuesioner->sol,2)); $fpdf->Ln(8);
    $fpdf->SetFont('Arial','',12); $fpdf->Cell( 95, 8, 'Website : ' . $kuesioner->web); $fpdf->Cell( 95, 8, 'Tanah : ' . 'Rp ' . number_format($kuesioner->ld, 0, ',', '.')); $fpdf->Ln(8);
    $fpdf->SetFont('Arial','B',12); $fpdf->Cell( 95, 8, 'Status Perusahaan');
    $fpdf->SetFont('Arial','',12); $fpdf->Cell( 95, 8, 'Bangunan : ' . 'Rp ' . number_format($kuesioner->bd, 0, ',', '.'));  $fpdf->Ln(8);
    $fpdf->Cell( 95, 8, 'Tahun Berdiri : ' . $kuesioner->tahun); $fpdf->Cell( 95, 8, 'Mesin dan Peralatan : ' . 'Rp ' . number_format($kuesioner->me, 0, ',', '.')); $fpdf->Ln(8);
    $fpdf->Cell( 95, 8, 'Status Badan Usaha : ' . $kuesioner->status1); $fpdf->Cell( 95, 8, 'Kendaraan : ' . 'Rp ' . number_format($kuesioner->vc, 0, ',', '.')); $fpdf->Ln(8);
    $fpdf->Cell( 95, 8, 'Status Pemodalan : ' . $kuesioner->status2); $fpdf->Cell( 95, 8, 'Inventaris Lainnya : ' . 'Rp ' . number_format($kuesioner->oa, 0, ',', '.')); $fpdf->Ln(8);
    $fpdf->Cell( 95, 8, 'Penanggung Jawab : ' . $kuesioner->pj); $fpdf->Cell( 95, 8, 'Hutang Jangka Panjang : ' . 'Rp ' . number_format($kuesioner->ltd, 0, ',', '.')); $fpdf->Ln(8);
    $fpdf->Cell( 95, 8, 'Jumlah Manajer : ' . $kuesioner->manager);
    $fpdf->SetFont('Arial','B',12); $fpdf->Cell( 95, 8, 'Profitabilitas : ' . round($kuesioner->prf,2)); $fpdf->Ln(8);
    $fpdf->SetFont('Arial','',12); $fpdf->Cell( 95, 8, 'Jumlah Karyawan : ' . $kuesioner->karyawan); $fpdf->Cell( 95, 8, 'Total Pemasukan : ' . 'Rp ' . number_format($kuesioner->sales, 0, ',', '.')); $fpdf->Ln(8);
    $fpdf->Cell( 95, 8, ''); $fpdf->Cell( 95, 8, 'Total Pengeluaran : ' . 'Rp ' . number_format($kuesioner->expense, 0, ',', '.')); $fpdf->Ln(15);
    $fpdf->SetFont('Arial','B',14); $fpdf->Cell( 95, 10, 'Hasil Kuesioner'); $fpdf->Ln();
    $fpdf->SetFont('Arial','B',12); $fpdf->Cell( 95, 10, 'Keputusan'); $fpdf->Ln();
    $fpdf->SetFont('Arial','',12); $fpdf->Write( 8, $kuesioner->kepakh); $fpdf->Ln();
    $fpdf->SetFont('Arial','B',12); $fpdf->Cell( 95, 10, 'Saran'); $fpdf->Ln();
    $fpdf->SetFont('Arial','',12); $fpdf->Write( 8, $kuesioner->saran);

    $fpdf->Output();
    exit;
  }

}

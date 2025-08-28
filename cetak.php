<?php
require('fpdf/fpdf.php');
include 'config/colokan.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "SELECT * FROM siswa WHERE id_siswa = $id";
    $result = mysqli_query($colok, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        class PDF extends FPDF {
            function Header() {
                // Add a header to the PDF (optional)
                $this->SetFont('Arial', 'B', 12);
                
                $this->Cell(0, 10, 'BUKTI FORMULIR PENDAFTARAN SISWA BARU', 0, 1, 'C');
                $this->Cell(0, 10, '-------------------------------------------------------------------------------------------------------------------', 0, 1, 'C');
                $this->Ln(10);
            }

            function Footer() {
                // Add a footer to the PDF (optional)
                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'C');
            }
        }

        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'A. DATA SISWA', 0, 1);
        $pdf->SetFont('Arial', '', 12);

        $pdf->Cell(50, 10, 'ID Pendaftaran ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['id_siswa'], 0, 1);

        $pdf->Cell(50, 10, 'Nama Lengkap ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['nm_siswa'], 0, 1);

        $pdf->Cell(50, 10, 'Jenis Kelamin ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['jk'], 0, 1);

        $pdf->Cell(50, 10, 'Tempat Lahir ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['tmp_lahir'], 0, 1);

        $pdf->Cell(50, 10, 'Tanggal Lahir ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['tgl_lahir'], 0, 1);

        $pdf->Cell(50, 10, 'Agama ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['agama'], 0, 1);

        $pdf->Cell(50, 10, 'Anak ke ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['anak_ke'], 0, 1);

        $pdf->Cell(50, 10, 'Jumlah Saudara ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['jml_sdr'], 0, 1);

        $pdf->Cell(50, 10, 'Alamat ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['alamat'], 0, 1);

        $pdf->Cell(50, 10, 'RT ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['rt'], 0, 1);

        $pdf->Cell(50, 10, 'RW ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['rw'], 0, 1);

        $pdf->Cell(50, 10, 'Kelurahan ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['kelurahan'], 0, 1);

        $pdf->Cell(50, 10, 'Kecamatan ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['kecamatan'], 0, 1);

        $pdf->Cell(50, 10, 'Kabupaten ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['kabupaten'], 0, 1);

        $pdf->Cell(50, 10, 'Kode Pos ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['kodepos'], 0, 1);

        $pdf->Cell(50, 10, 'No HP ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['hp'], 0, 1);

        $pdf->Cell(50, 10, 'Tempat Tinggal ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['tmp_tinggal'], 0, 1);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'B. ASAL SEKOLAH', 0, 1);
        $pdf->SetFont('Arial', '', 12);

        $pdf->Cell(50, 10, 'Nama Sekolah ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['nm_sekolah'], 0, 1);

        $pdf->Cell(50, 10, 'Alamat Sekolah ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['alamat_sekolah'], 0, 1);

        $pdf->Cell(50, 10, 'NISN ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 20, $row['nisn'], 0, 1);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'C. DATA AYAH', 0, 1);
        $pdf->SetFont('Arial', '', 12);

        $pdf->Cell(50, 10, 'Nama Ayah ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['nm_ayah'], 0, 1);

        $pdf->Cell(50, 10, 'Tempat Lahir ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['tmp_lahir_ayah'], 0, 1);

        $pdf->Cell(50, 10, 'Tanggal Lahir ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['tgl_lahir_ayah'], 0, 1);

        $pdf->Cell(50, 10, 'Alamat ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['alamat_ayah'], 0, 1);

        $pdf->Cell(50, 10, 'Pekerjaan ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['pekerjaan_ayah'], 0, 1);

        $pdf->Cell(50, 10, 'Penghasilan ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['penghasilan_ayah'], 0, 1);

        $pdf->Cell(50, 10, 'Pendidikan ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['pendidikan_ayah'], 0, 1);

        $pdf->Cell(50, 10, 'No HP ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['hp_ayah'], 0, 1);

        $pdf->Cell(50, 10, 'Email ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['email_ayah'], 0, 1);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'D. DATA IBU', 0, 1);
        $pdf->SetFont('Arial', '', 12);

        $pdf->Cell(50, 10, 'Nama Ibu ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['nm_ibu'], 0, 1);

        $pdf->Cell(50, 10, 'Tempat Lahir ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['tmp_lahir_ibu'], 0, 1);

        $pdf->Cell(50, 10, 'Tanggal Lahir ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['tgl_lahir_ibu'], 0, 1);

        $pdf->Cell(50, 10, 'Alamat ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['alamat_ibu'], 0, 1);

        $pdf->Cell(50, 10, 'Pekerjaan ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['pekerjaan_ibu'], 0, 1);

        $pdf->Cell(50, 10, 'Penghasilan ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['penghasilan_ibu'], 0, 1);

        $pdf->Cell(50, 10, 'Pendidikan ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['pendidikan_ibu'], 0, 1);

        $pdf->Cell(50, 10, 'No HP ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['hp_ibu'], 0, 1);

        $pdf->Cell(50, 10, 'Email ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 40, $row['email_ibu'], 0, 1);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'E. DATA WALI', 0, 1);
        $pdf->SetFont('Arial', '', 12);

        $pdf->Cell(50, 10, 'Nama Wali ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['nm_wali'], 0, 1);

        $pdf->Cell(50, 10, 'Tempat Lahir ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['tmp_lahir_wali'], 0, 1);

        $pdf->Cell(50, 10, 'Tanggal Lahir ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['tgl_lahir_wali'], 0, 1);

        $pdf->Cell(50, 10, 'Alamat ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['alamat_wali'], 0, 1);

        $pdf->Cell(50, 10, 'Pekerjaan ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['pekerjaan_wali'], 0, 1);

        $pdf->Cell(50, 10, 'Penghasilan ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['penghasilan_wali'], 0, 1);

        $pdf->Cell(50, 10, 'Pendidikan ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['pendidikan_wali'], 0, 1);

        $pdf->Cell(50, 10, 'No HP ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['hp_wali'], 0, 1);

        $pdf->Cell(50, 10, 'Email ', 0, 0);
        $pdf->Cell(10, 10, ': ', 0, 0);
        $pdf->Cell(50, 10, $row['email_wali'], 0, 1);

        $pdf->Output();
    } else {
        echo "Data not found.";
    }
} else {
    echo "No ID provided.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        table {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        table tr .text2 {
            text-align: right;
            font-size: 10px;
            font-family: Arial, "Helvetica", sans-serif;
        }

        table tr .text {
            text-align: center;
            font-size: 14px;
            font-family: Arial, "Helvetica", sans-serif;
        }

        table tr td {
            font-size: 14px;
            font-family: Arial, "Helvetica", sans-serif;

        }

        .page-break {
            page-break-after: always;
        }

    </style>
</head>

<body>
    <div>
        <center>
            <table width="90%">
                <tr class="text2">
                    <td><img src="logoMCI.png" width="10%"></td>
                </tr>
            </table>
            <table width="90%">
                <tr>
                    <td>
                        <center>
                            <font size="4"><b>JADWAL ANGSURAN</b></font><br>
                            <font size="3">RINCIAN DATA PEMBIAYAAN DEBITUR</font><br>
                        </center>
                    </td>
                </tr>
                <table width="90%">
                    <tr class="text2">
                        <td width="150">Plafond Pembiayaan</td>
                        <td width="2">:</td>
                        <td width="100" style="text-align: right;">150.0000</td>
                        <td width="2"></td>
                        <td width="100">Nama</td>
                        <td width="2">:</td>
                        <td width="200">MARIA</td>
                    </tr>
                    <tr class="text2">
                        <td width="150">Margin Efektif</td>
                        <td width="2">:</td>
                        <td width="100" style="text-align: right;">1.17%</td>
                        <td width="2"></td>
                        <td width="100">Nopen</td>
                        <td width="2">:</td>
                        <td width="200">12138748971</td>
                    </tr>
                    <tr class="text2">
                        <td width="150">Jangka Waktu (bulan)</td>
                        <td width="2">:</td>
                        <td width="100" style="text-align: right;">81</td>
                        <td width="2"></td>
                        <td width="150">Kantor Bayar Tujuan</td>
                        <td width="2">:</td>
                        <td width="200">BPRS MCI</td>
                    </tr>
                    <tr class="text2">
                        <td width="150">Angsuran per-bulan</td>
                        <td width="2">:</td>
                        <td width="100" style="text-align: right;">4.000.000</td>
                        <td width="2"></td>
                        <td width="100">Area Pelayanan</td>
                        <td width="2">:</td>
                        <td width="200">Ngawi</td>
                    </tr>
                </table>
            </table>
        </center>
    </div>
    <div style="page-break-after: always;"></div>
    <div>
        <center>
            <table width="90%">
                <tr class="text2">
                    <td><img src="<?php echo e(asset('assets/images/pdf/logoMCI.png')); ?>" width="10%"></td>
                </tr>
            </table>
            <table width="90%">
                <tr>
                    <td>
                        <center>
                            <font size="4"><b>JADWAL ANGSURAN</b></font><br>
                            <font size="3">RINCIAN DATA PEMBIAYAAN DEBITUR</font><br>
                        </center>
                    </td>
                </tr>
                <table width="90%">
                    <tr class="text2">
                        <td width="150">Plafond Pembiayaan</td>
                        <td width="2">:</td>
                        <td width="100" style="text-align: right;">150.0000</td>
                        <td width="2"></td>
                        <td width="100">Nama</td>
                        <td width="2">:</td>
                        <td width="200"><?php echo e($customer_data->nama); ?></td>
                    </tr>
                    <tr class="text2">
                        <td width="150">Margin Efektif</td>
                        <td width="2">:</td>
                        <td width="100" style="text-align: right;">1.17%</td>
                        <td width="2"></td>
                        <td width="100">Nopen</td>
                        <td width="2">:</td>
                        <td width="200"><?php echo e($customer_data->nopen); ?></td>
                    </tr>
                    <tr class="text2">
                        <td width="150">Jangka Waktu (bulan)</td>
                        <td width="2">:</td>
                        <td width="100" style="text-align: right;"><?php echo e($customer_data->tenor); ?> Bulan</td>
                        <td width="2"></td>
                        <td width="150">Kantor Bayar Tujuan</td>
                        <td width="2">:</td>
                        <td width="200">BPRS MCI</td>
                    </tr>
                    <tr class="text2">
                        <td width="150">Angsuran per-bulan</td>
                        <td width="2">:</td>
                        <td width="100" style="text-align: right;"><?php echo e($customer_data->cicilan); ?></td>
                        <td width="2"></td>
                        <td width="100">Area Pelayanan</td>
                        <td width="2">:</td>
                        <td width="200">Ngawi</td>
                    </tr>
                </table>
            </table>
        </center>
    </div>
    <div style="page-break-after: always;"></div>
    <div>
        <center>
            <table width=90%>
                <tr>
                    <td>
                        <center>
                            <img src="<?php echo e(asset('assets/images/pdf/bismillah.png')); ?>" width="10%"><br>
                            <font size="1"><i>Dengan menyebut nama Allah yang Maha Pengsaih lagi Maha Penyayang</i>
                            </font><br>
                            <br>
                            <font size="2"><b>SURAT KUASA UNTUK MEMINDAHKAN HAK</b></font><br>
                        </center>
                    </td>
                </tr>
            </table>
            <table width="90%">
                <tr class="text2" style="text-align: justify;">
                    <td>
                        <font size="2">
                            Yang bertanda tangan dibawah ini: <?php echo e($customer_data->nama); ?> beralamat di
                            <?php echo e($customer_data->alamat_jalan); ?>

                            <?php echo e($customer_data->alamat_kec); ?>, <?php echo e($customer_data->alamat_kotakab); ?>

                            <?php echo e($customer_data->alamat_propinsi); ?>

                            bertindak untuk dan atas nama diri sendiri selanjutnya disebut penjamin. Dengan ini memberi
                            kuasa yang tidak dapat ditarik kembali
                            meskipun dengan alasan yang tercantum dalam pasal 1813 KUH Perdata, kepada PT. BPRS Mitra
                            Cahaya Indonesia (yang dalam surat kuasa
                            ini disebut BANK) untuk menjual, menarik, mencairkan dan memindahkan tangan dengan harga
                            dipandang patut oleh Bank, atas titipan berupa
                        </font>
                    </td>
                </tr>
            </table>
            <table width="85%">
                <tr class="text2">
                    <td width="2">A.</td>
                    <td widht="100">Anggunan antara lain :</td>
                </tr>
                <tr>
                    <td></td>
                    <td> - Surat Keputusan Pensiun Asli Nomer :09090290139</td>
                </tr>
                <tr class="text2">
                    <td width="2">B.</td>
                    <td widht="100">Titipan berupa :</td>
                </tr>
                <tr>
                    <td></td>
                    <td> - </td>
                </tr>
                <tr class="text2">
                    <td width="2">C.</td>
                    <td widht="100">Hal - hal sesuai kesepakatan bersama antara lain :</td>
                </tr>
                <tr class="text2">
                    <td></td>
                    <td>- Sesaui bunyi pasal 3 ayat 4 dan</td>
                </tr>
                <tr class="text2">
                    <td></td>
                    <td>- Sesaui bunyi pasal 4 ayat 6</td>
                </tr>
            </table>
            <br>
            <table width="90%">
                <tr class="text2">
                    <td style="text-align:justify ;">
                        <font size="2"> Yang diserahkan kepada BANK sebagai titipan dari pembiayaan berdasarkan
                            perjanjian pembiayaan MBAK.. ./V1102021 tanggal <?php echo e($customer_data->tanggal_keputusan); ?>

                            dan atau
                            berdasarkan apapun,
                            apabila BANK menganggap NASABAH tersebut diatas, termasuk pembayaran profit dan ongkos
                            ongkos lainnya akan ditentukan BANK
                        </font>
                        <br><br>
                        <font size="2"> Semua hasil-hasil penjualan menarik, mencairkan barang-barang tersebut setelah
                            dikurangi ongkosongkos supaya diperhitungkan untuk melunasi pembiayaan
                        </font>
                        <br>
                        <font size="2"> Sdr. MARIA ARLENTINA SUTINI kepada BANK
                        </font>
                        <br><br>
                        <font size="2"> Khusus apabila yang kami serahkan tersebut diatas merupakan rumah bangunan, maka
                            kami harus mengkosongkan selambat-lambatnya 1 (satu) bulan setelah pemberitahuan pertama dan
                            BANK dengan tidak perlu dibuktikan untuk itu.
                        </font>
                        <br><br>
                        <font size="2"> Terhitung semenjak Surat Kuasa ini BANK berhak dan berwenang untuk mengurus,
                            menandatangani surat-surat sehubungan dengan titipan titipan tersebut
                            baik terhadap yang berwajib maupun terhadap pihak lain, selanjutnya kepada BANK dikuasakan
                            untuk membuat dan menandatangani surat jual bell proses verbal lelang umum, memberi kwitansi
                            untuk semua tindakan yang berhubungan dengan pemindahan hak / penjualan barang tersebut.
                            Dengan ini pula yang bertanda tangan dibawah ini mengikat diri untuk mematuhi / memenuhi
                            segala keputusan BANK mengenai barang barang tersebut
                        </font>
                        <br><br>
                        <font size="2">Dengan ini pula yang bertanda tangan dibawah ini mengikat diri untuk memenuhi /
                            memenuhi segala keputusan BANK mengenai
                            barang - barang tersebut.
                        </font>
                    </td>
                </tr>
            </table>
            <br>
            <table width="90%" style="text-align: center;">
                <tr class="text2">
                    <td width="45%"></td>
                    <td>Yogyakarta, 30-08-2020</td><br>
                </tr>
                <tr class="text2">
                    <td width="250"></td>
                    <td>NASABAH</td>
                </tr>
            </table>
            <table width="90%">
                <tr class="text2">
                    <td width="250">PT. BPRS Mitra Cahaya Indoneisa<br>
                        Direktur Utama,<br>
                        <br><br><br><br><br><br><br><br>
                        MARIA
                        <hr>
                    </td>
                    <td></td>
                    <td width="200" style="text-align: center;">
                        Pemohon,
                        <br><br><br><br><br><br><br><br><br><br>
                        <?php echo e($customer_data->nama); ?>

                        <hr>
                    </td>
                    <td></td>
                    <td width="200" style="text-align: center;">
                        Suami/Isteri*,
                        <br><br><br><br><br><br><br><br><br><br>
                        SUDJITO
                        <hr>
                    </td>
                </tr>
            </table>
        </center>
    </div>
    <div style="page-break-after: always;"></div>
    <div>
        <center>
            <table width=90%>
                <tr class="text2">
                    <td>
                        <center>
                            <img src="<?php echo e(asset('assets/images/pdf/logoMCI.png')); ?>" width="30%"><br>
                            <font size="2"><i>Dengan menyebut nama Allah yang Maha Pengsaih lagi Maha Penyayang</i>
                            </font><br>
                            <br>
                            <font size="3"><b>DAFTAR HADIR AKAD PEMBIAYAAN</b></font><br>
                        </center>
                    </td>
                </tr>
            </table>
            <table width="90%">
                <tr class="text2">
                    <td width="100">NASABAH</td>
                    <td width="10">:</td>
                    <td widht="200">Maria</td>
                </tr>
                <tr class="text2">
                    <td width="100">ALAMAT</td>
                    <td width="10">:</td>
                    <td widht="200">Maria</td>
                </tr>
                <tr class="text2">
                    <td width="100">PLAFON</td>
                    <td width="10">:</td>
                    <td widht="200">Maria</td>
                </tr>
                <tr class="text2">
                    <td width="100">TANGGAL</td>
                    <td width="10">:</td>
                    <td widht="200">Maria</td>
                </tr>
            </table>
            <br>
            <table width="90%">
                <tr class="text2">
                    <td width="2">1.</td>
                    <td width="250">MARIA</td>
                    <td>Ttd.</td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr class="text2">
                    <td width="2">2.</td>
                    <td width="250">SUDJIF</td>
                    <td>Ttd.</td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr class="text2">
                    <td width="2">3.</td>
                    <td width="250">SUDJIF</td>
                    <td>Ttd.</td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr class="text2">
                    <td width="2">4.</td>
                    <td width="250">SUDJIF</td>
                    <td>Ttd.</td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr class="text2">
                    <td width="2">5.</td>
                    <td width="250">SUDJIF</td>
                    <td>Ttd.</td>
                </tr>
            </table>
        </center>
    </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\bank_pembiayaan\resources\views/suratpdf/surat-bank.blade.php ENDPATH**/ ?>
<?php

namespace App\Http\Controllers;

use App\Models\Archieve;
use App\Models\NewCustomer;
use App\Models\NewData;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewCustomerController extends Controller
{

    public function index()
    {
        // $client = new Client();
        // $url = "https://si-bima.com/api/customer";


        // $response = $client->request('GET', $url, [
        //     'verify'  => false,
        // ]);

        // $responseBody = json_decode($response->getBody());
        // $customer = $responseBody->data;
        // $customers = [];
        // foreach ($customer as $api) {
        //     if (NewCustomer::where([['nik', '=', $api->nik], ['tanggal_input', '=', $api->tanggal_input]])->exists() || Archieve::where([['nik', '=', $api->nik], ['tanggal_input', '=', $api->tanggal_input]])->exists()) {
        //     } else {
        //         array_push($customers, $api);
        //     }
        // }
        // $notification = count($customers);
        $customers = NewData::all();
        foreach ($customers as $data) {
            $data->tanggal_input = Carbon::parse($data->tanggal_input)->format('d-m-Y H:i:s');
        };

        $notification = count($customers);
        $newcustomer = NewCustomer::all();

        foreach ($newcustomer as $data) {
            $data->tanggal_input = Carbon::parse($data->tanggal_input)->format('d-m-Y H:i:s');
        };
        return view('admin.newcustomer', compact('newcustomer', 'notification'));
    }

    function pdf($id)
    {

        $this->convert_customer_data_to_html($id);
        $role = Auth::user()->role;
        if ($role == "admin") {
            return redirect()->to('admin/newcustomer');
        } else if ($role == "user") {
            return redirect()->to('user/newcustomer');
        } else {
            return redirect()->to('logout');
        }
    }

    function get_customer_data($id)
    {
        $customer_data = NewCustomer::where('id', $id)->first();
        return $customer_data;
    }

    function convert_customer_data_to_html($id)
    {


        $date = Carbon::now()->locale('id');
        $namedate = $date->format('Y-m-d-His');
        $my_pdf_path_for_example = public_path('pdf/' . $namedate . '.pdf');
        $data = NewCustomer::where('id', $id)->first();
        // $url = 'https://bank.si-bima.com/pdf/' . $namedate . '.pdf';
        $data->url_pdf = 'https://bank.seovdetech.com/pdf/' . $namedate . '.pdf';
        $data->save();
        $customer_data = $this->get_customer_data($id);
        $dom = PDF::loadHTML('<!DOCTYPE html>
        <html lang="en">

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <style type="text/css">

            height: 842px;
            width: 595px;
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
            
            @page Section1 {
                size: 8.27in 11.69in; 
                margin: .5in .5in .5in .5in; 
                mso-header-margin: .5in; 
                mso-footer-margin: .5in; 
                mso-paper-source: 0;
            }
            
            div.Section1 {
                page: Section1;
            } 
            
            table {
                border-style: double;
                border-width: 3px;
                border-color: white;
            }
            table tr .text2 {
                text-align: right;
                font-size: 12px;
                font-family: Arial, "Helvetica", sans-serif;
            }
            table tr .text {
                text-align: center;
                font-size: 12px;
                font-family: Arial, "Helvetica", sans-serif;
            }
            table tr td {
                font-size: 12px;
                font-family: Arial, "Helvetica", sans-serif;
                vertical-align: top; 
                text-align: left;
                text-align: justify;
            
            }
            
            .page-break {
                page-break-after: always;
            }

            .grid-container {
                display: grid;
                width: 100%;
                grid-template-columns: auto auto auto auto;
                grid-gap: 10px;
                border-color: black;
                border: 2px;
                padding: 10px;
                
            }
    
                .grid-container > div {
                width: 100%;
                text-align: center;
                padding: 10px 0;
                font-size: 30px;
                border-color: black;
                
            }
            

            </style>
        </head>

        <body>
            <div>
                <center>
                    <table width="100%">
                        <tr class="text2">
                            <td><img src="' . public_path('assets/images/pdf/logoMCI.png') . '" width="30%"></td>
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
                            <td><img src="' . public_path('assets/images/pdf/logoMCI.png') . '" width="30%"></td>
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
                                <td width="200">' . $customer_data->nama . '</td>
                            </tr>
                            <tr class="text2">
                                <td width="150">Margin Efektif</td>
                                <td width="2">:</td>
                                <td width="100" style="text-align: right;">1.17%</td>
                                <td width="2"></td>
                                <td width="100">Nopen</td>
                                <td width="2">:</td>
                                <td width="200">' . $customer_data->nopen . '</td>
                            </tr>
                            <tr class="text2">
                                <td width="150">Jangka Waktu (bulan)</td>
                                <td width="2">:</td>
                                <td width="100" style="text-align: right;">' . $customer_data->tenor . ' Bulan</td>
                                <td width="2"></td>
                                <td width="150">Kantor Bayar Tujuan</td>
                                <td width="2">:</td>
                                <td width="200">BPRS MCI</td>
                            </tr>
                            <tr class="text2">
                                <td width="150">Angsuran per-bulan</td>
                                <td width="2">:</td>
                                <td width="100" style="text-align: right;">' . $customer_data->cicilan . '</td>
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
                    <table width=100%>
                        <tr>
                            <td>
                            <center>
                                <img src="' . public_path('assets/images/pdf/bismillah.png') . '" width="30%"><br>
                                <font size="2"><i>Dengan menyebut nama Allah yang Maha Pengsaih lagi Maha Penyayang</i></font><br>
                                <br>
                                <font size="3"><b>SURAT KUASA UNTUK MEMINDAHKAN HAK</b></font><br>
                            </center>
                            </td>
                        </tr>
                    <table width="100%">
                        <tr class="text2" style="text-align: justify;">
                            <td>
                                <font size="2">
                                Yang bertanda tangan dibawah ini: MARIA ARLENTINA SUTINI beralamat di GADUNG RT 001 RW 003 NGOMPRO PANGKUR, NGAWI JAWA TIMUR 
                                bertindak untuk dan atas nama diri sendiri selanjutnya disebut penjamin. Dengan ini memberi kuasa yang tidak dapat ditarik kembali 
                                meskipun dengan alasan yang tercantum dalam pasal 1813 KUH Perdata, kepada PT. BPRS Mitra Cahaya Indonesia (yang dalam surat kuasa
                                ini disebut BANK) untuk menjual, menarik, mencairkan dan memindahkan tangan dengan harga dipandang patut oleh Bank, atas titipan berupa
                                </font>
                            </td>
                        </tr>
                    </table>
                    </table>
                    <table width="100%" style="margin-left: 30px;">
                        <tr style="font: size 2px;">
                            <td width="2">A.</td>
                            <td widht="100">Anggunan antara lain :</td>  
                        </tr>
                        <tr style="font: size 2px;">
                            <td></td>
                            <td> -  Surat Keputusan Pensiun Asli Nomer :09090290139</td>
                        </tr>
                        <tr style="font: size 2px;">
                            <td width="2">B.</td>
                            <td widht="100">Titipan berupa :</td>  
                        </tr>
                        <tr style="font: size 2px;">
                            <td></td>
                            <td> - </td>
                        </tr>
                        <tr style="font: size 2px;">
                            <td width="2">C.</td>
                            <td widht="100">Hal - hal sesuai kesepakatan bersama antara lain :</td>  
                        </tr>
                        <tr style="font: size 2px;">
                            <td></td>
                            <td>- Sesaui bunyi pasal 3 ayat 4 dan</td>
                        </tr>
                        <tr style="font: size 2px;">
                            <td></td>
                            <td>- Sesaui bunyi pasal 4 ayat 6</td>
                        </tr>
                    </table>
                    <br>
                        <table width="100%">
                            <tr>
                            <td style="text-align:justify ;">
                                <font size="2"> Yang diserahkan kepada BANK sebagai titipan dari pembiayaan berdasarkan perjanjian pembiayaan MBAK.. ./V1102021 tanggal 30-08-2021 dan atau berdasarkan apapun, 
                                    apabila BANK menganggap NASABAH tersebut diatas, termasuk pembayaran profit dan ongkos ongkos lainnya akan ditentukan BANK
                                </font>
                                <br><br>
                                <font size="2"> Semua hasil-hasil penjualan menarik, mencairkan barang-barang tersebut setelah dikurangi ongkosongkos supaya diperhitungkan untuk melunasi pembiayaan
                                </font>
                                <br>
                                <font size="2"> Sdr. MARIA ARLENTINA SUTINI kepada BANK
                                </font>
                                <br><br>
                                <font size="2"> Khusus apabila yang kami serahkan tersebut diatas merupakan rumah bangunan, maka kami harus mengkosongkan selambat-lambatnya 1 (satu) bulan setelah pemberitahuan pertama dan BANK dengan tidak perlu dibuktikan untuk itu.
                                </font>
                                <br><br>
                                <font size="2"> Terhitung semenjak Surat Kuasa ini BANK berhak dan berwenang untuk mengurus, menandatangani surat-surat sehubungan dengan titipan titipan tersebut 
                                    baik terhadap yang berwajib maupun terhadap pihak lain, selanjutnya kepada BANK dikuasakan untuk membuat dan menandatangani surat jual bell proses verbal lelang umum, memberi kwitansi untuk semua tindakan yang berhubungan dengan pemindahan hak / penjualan barang tersebut. Dengan ini pula yang bertanda tangan dibawah ini mengikat diri untuk mematuhi / memenuhi segala keputusan BANK mengenai barang barang tersebut
                                </font>
                                <br><br>
                                <font size="2">Dengan ini pula yang bertanda tangan dibawah ini mengikat diri untuk memenuhi / memenuhi segala keputusan BANK mengenai
                                    barang - barang tersebut.
                                </font>
                            </td>
                            </tr>
                    </table>
                    <br>
                    <table width="100%">
                        <tr>
                            <td width="30%"></td>
                            <td></td>
                            <td colspan="3" style="text-align: center;">Yogyakarta, 30-08-2020<br>NASABAH</td>
                        </tr>
                        <tr>
                            <td>PT. BPRS Mitra Cahaya Indoneisa<br>
                                Direktur Utama,<br>
                                <br><br><br><br><br><br><br><br>
                                MARIA
                                <hr></td>
                            <td></td>
                            <td style="text-align: center;"> Pemohon,
                                <br><br><br><br><br><br><br><br><br><br>
                                MARIA
                                <hr></td>
                            <td></td>
                            <td style="text-align: center;"> Suami/Isteri*,
                                <br><br><br><br><br><br><br><br><br><br>
                            SUDJITO
                                <hr></td>
                        </tr>
                    </table>
                </center>
            </div>
            <div style="page-break-after: always;"></div>
            <div>
                <center>
                    <table width=100%>
                        <tr class="text2">
                            <td>
                            <center>
                                <img src="' . public_path('assets/images/pdf/bismillah.png') . '" width="30%"><br>
                                <font size="2"><i>Dengan menyebut nama Allah yang Maha Pengsaih lagi Maha Penyayang</i></font><br>
                                <br>
                                <font size="3"><b>DAFTAR HADIR AKAD PEMBIAYAAN</b></font><br>
                            </center>
                            </td>
                        </tr>
                    </table>
                    <table width="100%">
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
                    <table width="100%">
                        <tr class="text2">
                            <td width="2">1.</td>
                            <td width="250">MARIA</td>
                            <td>Ttd.</td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr class="text2">
                            <td width="2">2.</td>
                            <td width="250">SUDJIF</td>
                            <td>Ttd.</td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr class="text2">
                            <td width="2">3.</td>
                            <td width="250">SUDJIF</td>
                            <td>Ttd.</td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr class="text2">
                            <td width="2">4.</td>
                            <td width="250">SUDJIF</td>
                            <td>Ttd.</td>
                        </tr>
                        <tr><td><br></td></tr>
                        <tr class="text2">
                            <td width="2">5.</td>
                            <td width="250">SUDJIF</td>
                            <td>Ttd.</td>
                        </tr>
                    </table>
                </center>
            </div>
            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width="100%">
                    <tr class="text2">
                        <td width="10%"><img src="logo.png" width="50px" ></td>
                        <td style="text-align: center; font-size: 20px;"><b>PT. Bank Pembiayaan Rakyat Syari&#39;ah<br>MITRA CAHAYA INDONESIA</b><hr></td>
                        <td width="10%"><img src="logo.png" width="50px" ></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td>Yogyakarta, 30-08-2020</td>
                    </tr>
                <br>
                </table>
                <table width="100%">
                    <tr class="text2" >
                        <td width="150">No</td>
                        <td width="2">:</td>
                        <td></td>
                    </tr>
                    <tr class="text2">
                        <td width="150">Hal</td>
                        <td width="2">:</td>
                        <td>Persetujuan Fasilitas Pembiayaan Murabahah</td>
                    </tr>
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td>Kepada Yth.</td>
                    </tr>
                    <table width="80%">
                        <tr>
                            <td>MARIA</td>
                        </tr>
                        <tr>
                            <td>GEDUNG</td>
                        </tr>
                    </table>
                    <br>
                    <table width="100%">
                        <tr>
                            <td><i>Assalamua&#39;laikum Wr Wb,</i></td>
                        </tr>
                        <tr>
                            <td style="text-align: justify;">
                                <font size="2">
                                    Sesuai dengan permohonan bapak/ibu nomor MBAK........../V11/2021 maka bersama ini kami sampaikan bahwa PT BPRS Mitra Cahaya Indonesia dapat menyetujui pemberian Fasilitas Pembiayaan murabahah kepada bapak/ibu dengan ketentuan dan persyaratan sebagai berikut :
                                </font>
                            </td>
                        </tr>
                    </table>
                </table>
                <table width="100%">
                    <tr class="text2">
                        <td width="20"><b>I.</b></td>
                        <td><b>FASILITAS PEMBIAYAAN</b></td>
                    </tr>
                    <table width="85%">
                        <tr>
                            <td>Tujuan Penggunaan</td>
                        </tr>
                        <tr>
                            <td width="200">Pembiayaan PT. BPRS MCI</td>
                            <td width="2">:</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td width="200">Margin Bank</td>
                            <td>:</td>
                            <td>Rp. 150.000.000</td>
                        </tr>
                        <tr>
                            <td width="200">Collection Fee</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="200">Harga Jual Bank</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="200">Jangka Waktu Pembiayaan</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="200">Angsuran</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="200">Biaya Tabungan dan Meterai</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="200">Biaya Mutasi dan Lainnya</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="200">Asuransi</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="200">Jenis Akad</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="200">Akad Pembiayaan Dibuat</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                    </table> 
                </table>
                <table width="100%">
                    <tr>
                        <td>
                            Denda (<b>ta&#39;zir</b>)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Dalam hal NASABAH terlambat membayar kewajiban dari jadual yang telah ditetapkan sebagaimana ditetapkan dalam Akad ini, maka BANK membebankan
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="2">1.</td>
                        <td>Biaya riil baik biaya personil maupun biaya materi yang telah dikeluarkan pihak bank untuk melakukan penagihan penagihan setoran
                            nasabah selama setoran nasabah tidak tepat waktu sebagaimana yang telah diperjanjikan.
                        </td>
                    </tr>
                    <tr>
                        <td width="2">2.</td>
                        <td>Denda pada point tersebut diatas dikenakan kepada nasabah apabila :
                        </td>
                    </tr>
                    <table width="100%" style="margin-left: 20px;">
                        <tr>
                            <td>a.</td>
                            <td>Nasabah memiliki kemampuan tetapi tidak segera memenuhi menyelesaikan kewajiban pembayarannya kepada Bank.</td>
                        </tr>
                        <tr>
                            <td>b.</td>
                            <td>Nasabah menunda-nunda pembayaran dengan sengaja atau tidak mempunyai kemauan dan itikad baik untuk membayar
                                kewajibannya.</td>
                        </tr>
                        <tr>
                            <td>c.</td>
                            <td>Apabila ada keterlambatan pembayaran nasabah dikenakan denda dengan ketentuan sebagai berikut :</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                            <ul>
                                <li>Apabila keterlambatan 1-30 hari, maka denda 10% dari tunggakan angsuran (Pokok, Margin dan Coll Fee).</li>
                                <li>Apabila keterlambatan 30-60 hari, maka dikenakan denda 20% dari komulatif tunggakan angsuran (Pokok, Margin dan Coll Fee)
                                    + denda sebelumnya. </li>
                                <li>Apabila keterlambatan 60-90 hari, maka dikenakan denda 30% dari komulatif tunggakan angsuran (Pokok, Margin dan Coll Fee)
                                    + denda sebelumnya. </li>
                            </ul>
                            </td>
                        </tr>
                    </table>
                </table>
                <table width="100%" >
                    <tr>
                        <td width="2">3.</td>
                        <td>Dana dari denda atas keterlambatan yang diterima oleh BANK akan diperuntukkan sebagai dana social (Infaq dan Shadaqah).</td>
                    </tr>
                    <tr>
                        <td width="2">4.</td>
                        <td>BANK akan mengenakan Ta&#39;wid (ganti rugi operasional) yang nil yang diakibatkan oleh kelalaian NASABAH dalam membayar
                            kewajibannya.</td>
                    </tr>
                </table>
            </center>
            </div>
            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width="100%">
                    <tr class="text2">
                        <td width="20"><b>II.</b></td>
                        <td><b>JAMINAN</b></td>
                    </tr>
                    <table width="100%" style="margin-left: 30px;">
                        <tr class="text2">
                            <td width="20">1.</td>
                            <td>Menyerahkan atas pembiayaan : </td>
                        </tr>
                        <tr class="text2">
                            <td width="20"></td>
                            <td>- Surat Keputusan Pensiun Asli Nomor: 00096/KEP/CV/6523/2008</td>
                        </tr>
                        <tr class="text2">
                            <td width="20">2.</td>
                            <td>Titipan Berupa : </td>
                        </tr>
                        <tr class="text2">
                            <td width="20"></td>
                            <td>- </td>
                        </tr>
                    </table>
                </table>
                <table width="100%">
                    <tr class="text2">
                        <td width="20"><b>III.</b></td>
                        <td><b>SYARAT PENANDATANGANAN AKAD</b></td>
                    </tr>
                    <table width="100%" style="margin-left: 30px;">
                        <tr class="text2">
                            <td width="20">1.</td>
                            <td>Nasabah telah menyetujui dan menandatangani Surat pemberitahuan Persetujuan Fasilitas Pembiayaan</td>
                        </tr>
                        <tr class="text2">
                            <td width="20">2.</td>
                            <td> Akad Pembiayaan di waarmerking (register) oleh notaris</td>
                        </tr>
                        <tr class="text2">
                            <td width="20">3.</td>
                            <td >Nasabah wajib membuka rekening tabungan di Bank PT BPRS Mitra Cahaya Indonesia sebagai sarana pembayaran angsuran</td>
                        </tr>
                    </table>
                </table>
                <table width="100%">
                    <tr class="text2">
                        <td width="20"><b>IV.</b></td>
                        <td><b>SYARAT PENCAIRAN PEMBIAYAAN</b></td>
                    </tr>
                    <table width="100%" style="margin-left: 30px;">
                        <tr class="text2">
                            <td width="20">1.</td>
                            <td>Nasabah harus menandatangani perjanjian pembiayaan dan kelengkapan dokumen terkait.</td>
                        </tr>
                        <tr class="text2">
                            <td width="20">2.</td>
                            <td>Nasabah telah membayar tunai biaya-biaya yang terkait dengan proses pembiayaan.</td>
                        </tr>
                        <tr class="text2">
                            <td width="20">3.</td>
                            <td >Wajib di cover Asuransi Jiwa dan ketidakmampuan Pengembalian Pembiayaan (KPP) selama masa pembiayaan.</td>
                        </tr>
                        <tr class="text2">
                            <td width="20">4.</td>
                            <td >Selama masa pembiayaan, nasabah tidak diperkenankan meminjam pembiayaan dari bank lain tanpa seijin Bank Syariah Mitra
                                Cahaya Indonesia.</td>
                        </tr>
                        <tr class="text2">
                            <td width="20">5.</td>
                            <td >Apabila selama 3 (tiga) bulan berturut-turut, nasabah tidak memenuhi kewajiban angsuran tanpa alasan yang dapat
                                dipertanggungjawabkan, maka segala sesuatu yang berhubungan antara nasabah dengan Bank akan dilimpahkan ke bagian hukum
                                guna eksekusi titipan.</td>
                        </tr>
                        <tr class="text2">
                            <td width="20">6.</td>
                            <td >Segala kesepakatan yang terjadi antara Bank dengan nasabah, setelah ditandatangani surat penawaran ini harus dilakukan secara
                                tertulis dan disepakati kedua belah pihak.</td>
                        </tr>
                        <tr class="text2">
                            <td width="20">7.</td>
                            <td >Nasabah SETUJU untuk memberikan SPECIMEN tandatangan sebagai persetujuan atas akad pembiayaan dengan Bank.</td>
                        </tr>
                        <tr class="text2">
                            <td width="20">8.</td>
                            <td >SPECIMEN tandatangan akan digunakan dalam seluruh berkas pembiayaan nasabah.</td>
                        </tr>
                        <tr class="text2">
                            <td width="20">9.</td>
                            <td >Pencairan bisa dilakukan apabila Agunan, SPECIMEN DAN SP3 sudah diterima BANK.</td>
                        </tr>
                        <tr class="text2">
                            <td width="20">10.</td>
                            <td >Realisasi akan dilakukan melalui transfer ke rekening pendamping</td>
                        </tr>
                    </table>
                </table>
                <table width="100%">
                    <tr class="text2">
                        <td width="20"><b>V.</b></td>
                        <td><b>SYARAT LAIN-LAIN</b></td>
                    </tr>
                    <table width="100%">
                        <tr class="text2">
                            <td>
                                <ul>
                                    <li>
                                        Menyerahkan bukti penggunaan dana kwitansi pembelian sejumlah nilai pembiayaan paling lambat 10 hari setelah realisasi
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </table>
                <table width="100%" >
                    <tr>
                        <td style="text-align: justify;">
                            <font size="2">Demikian sebagai persetujuan saudara atas syarat-syarat dan kondisi diatas Kiranya salinan surat dapat ditandatangani dan 
                                dikembalikan pada kami selambat lambatnya 3 (tiga) hari setelah tanggal surat ini. Surat persetujuan ini merupakan bagian yang tidak 
                                terpisahkan dari akad pembiayaan Murabahah yang ditandatangani.
                            </font>
                            <br><br>
                            <font size="2"><i>Wassalamu&#39;alaikum Wr. Wb.</i></font>
                        </td>
                    </tr>
                </table>
                <table  width="100%" style="text-align: center;">
                    <tr>
                        <td width="65%"></td>
                        <td>Menyetujui,</td><br>
                    </tr>
                </table>
                <table  width="100%">
                    <tr class="text2">
                        <td width="30%" style="text-align: center;">PT. BPRS Mitra Cahaya Indoneisa
                            <br><br><br><br><br><br><br><br><br><br>
                            MARIA
                            <hr>
                            Direktur Utama
                        </td>
                        <td></td>
                        <td width="30%" style="text-align: center;">
                            
                            <br><br><br><br><br><br><br><br><br><br>
                            MARIA
                            <hr>
                            Nasabah
                        </td>
                        <td></td>
                        <td width="30%" style="text-align: center;">
                        
                            <br><br><br><br><br><br><br><br><br><br>
                        SUDJITO
                            <hr>
                            Suami/Isteri*
                        </td>
                    </tr>
                </table>
            </center>
            </div>
            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width=100%>
                    <tr>
                        <td>
                        <center>
                            <font size="3"><b>SURAT KUASA</b></font><br>
                        </center>
                        </td>
                    </tr>
                </table>

                <table width="100%">
                    <td>Yang Bertanda Tangan di bawah ini :</td>
                </table>
                <table width="85%">
                    <tr class="text2">
                        <td width="150">Nama</td>
                        <td width="10">:</td>
                        <td widht="200">Maria</td>  
                    </tr>
                    <tr class="text2">
                        <td width="150">Tempat, Tgl. Lahir</td>
                        <td width="10">:</td>
                        <td widht="200">Maria</td>  
                    </tr>
                    <tr class="text2">
                        <td width="150">No. KTP</td>
                        <td width="10">:</td>
                        <td widht="200">Maria</td>  
                    </tr>
                    <tr class="text2">
                        <td width="150">Pekerjaan</td>
                        <td width="10">:</td>
                        <td widht="200">Maria</td>  
                    </tr>
                    <tr class="text2">
                        <td width="150">Alamt</td>
                        <td width="10">:</td>
                        <td widht="200">Maria</td>  
                    </tr>
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td style="text-align: justify;">
                            <font size="2">Dengan ini memberi kuasa kepada PT BPRS Mitra Cahaya Indonesia Jl. Kaliurang km 10 Ngaglik Yogyakarta, untuk melakukan pendebetan/ Auto Debet Rekening Tabungan
                                ___________________________Atas nama MARIA ARLENTINA SUTINI pada PT BPRS Mitra Cahaya Indonesia guna: </font>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="2">1.</td>
                        <td>Membayar biaya biaya Administrasi atas fasilitas pembiayaan.</td>
                    </tr>
                    <tr>
                        <td 2idth="2">2.</td>
                        <td>Membayar seluruh kewajiban Bank lainnya.</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align: justify;">
                            Demikian surat kuasa ini saya buat dengan penuh kesadaran dan tanggung jawab untuk dapat dipergunakan sebagaimana mestinya.
                        </td>
                    </tr>
                </table>
                <br><br>
                <table width="100%">
                    <tr class="text2">
                        <td width="50%" style="text-align: center;">
                            Yang Memberi Kuasa,
                            <br><br><br><br><br><br><br><br><br><br>
                            MARIA
                            <hr width="200">
                            Nasabah
                        </td>
                        <td width="50%" style="text-align: center;">
                            Yang Diberi Kuasa,<br>
                            PT. BPRS MITRA CAHAYA INDONESIA
                            <br><br><br><br><br><br><br><br><br><br>
                        Indra Wisaksono, SE, MM
                            <hr width="200">
                        Direktur Utama
                        </td>
                    </tr>
                </table>
            </center>
            </div>
            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width=100%>
                    <tr>
                        <td width="25%">
                            <img src="' . public_path('assets/images/pdf/logoMCI.png') . '" width="100%" >
                        </td>
                        <td>
                        <center>
                            <img src="' . public_path('assets/images/pdf/bismillah.png') . '" width="30%"><br>
                            <img src="' . public_path('assets/images/pdf/maidahayat1.png') . '" width="200px"><br>
                            <font size="2"><i>"Hai orang-orang yang beriman, penuhilah perjanjian-perjanjian itu <br>
                                (Q.S Al-Maidah : 1)"</i></font><br>
                            <br>
                            <font size="3"><b>PERJANJIAN MURABAHAH <br> NOMOR: MBAK.............../VII/2021</b></font><br>
                        </center>
                        </td>
                        <td width="25%"></td>
                    </tr>
                <table width="100%">
                    <tr class="text2" style="text-align: justify;">
                        <td>
                            <font size="2">
                            Perjanjian Murabahah ini dibuat dan ditanda-tangani pada hari <b>Senin</b> tanggal <b>30-08-2021</b> oleh dan antara:
                            </font>
                        </td>
                    </tr>
                </table>
                </table>
                <table  width="100%">
                    <tr class="text2">
                        <td width="20"><b>I.</b></td>
                        <td width="200"><b>Nama</b></td>
                        <td width="20"><b>:</b></td>
                        <td><b>Indra Wisaksono, SE, MM</b></td>
                    </tr>
                    <tr class="text2">
                        <td width="20"><b></b></td>
                        <td width="200"><b>Jabtan</b></td>
                        <td width="20"><b>:</b></td>
                        <td><b>Direktur Utama PT. BPR. Syariah Mitra Cahaya Indonesia</b></td>
                    </tr>
                </table>
                <table width="100%" style="margin-left: 30px;">
                    <tr>
                        <td style="text-align: justify;">
                            <font>
                                Dalam hal ini bertindak dalam jabatannya tersebut untuk dan atas nama PT. Bank Pembiayaan Rakyat Syariah Mitra Cahaya Indonesia berkedudukan di JL Kaliurang Km 10 No 28 Kecamatan Ngaglik Sleman, 
                                Propinsi Daerah Istimewa Yogyakarta, berdasarkan Anggaran Dasarnya dimuat dalam Akta Pendirian Nomor 17 tertanggal 11 januari 2008 (11-01-2008) dihadapan notaris Wahyu Wiryono, SH dan telah mendapat 
                                pengesahan dari Menteri Hukum dan Hak Asasi Manusia Republik Indonesia dengan Surat Keputusannya tertanggal 18 Maret 2008 (18-02-2008) Nomor AHU-13544.AH.01.01 tahun 2008. Dan telah mengalami perubahan 
                                terakhir dengan akta Nomor 06 tanggal 5 Agustus 2020 di hadapan notaris Moh Djaelani Asad, Sh dengan bukti Penerimaan Pemberitahuan Perubahan Data Perseroan Menteri Hukum dan Hak Asasi Kemanusiaan Republik 
                                Indonesia Nomor AHU-AH.01.03-0330862 tanggal 6 Agustus 2020, (selanjutnya disebut Bank)
                            </font>
                        </td>
                    </tr>
                </table>
                <table  width="100%">
                    <tr class="text2">
                        <td width="20">II.</td>
                        <td width="200">Nama</td>
                        <td width="20">:</td>
                        <td>MARIA</td>
                    </tr>
                    <tr class="text2">
                        <td width="20"></td>
                        <td width="200">Tempat, Tgl. Lahir</td>
                        <td width="20">:</td>
                        <td>NGAWI</td>
                    </tr>
                    <tr class="text2">
                        <td width="20"></td>
                        <td width="200">No. KTP</td>
                        <td width="20">:</td>
                        <td>012389203489</td>
                    </tr>
                    <tr class="text2">
                        <td width="20"></td>
                        <td width="200">Pekerjaan</td>
                        <td width="20">:</td>
                        <td>PETANI</td>
                    </tr>
                    <tr class="text2">
                        <td width="20"></td>
                        <td width="200">Alamat</td>
                        <td width="20">:</td>
                        <td>GADUNG RT 001</td>
                    </tr>
                </table>
                <table width="100%" style="margin-left: 30px;">
                    <tr>
                    <td>
                        Untuk melakukan tindakan hukum ini telah mendapat persetujuan dari <b>suami/istri*</b>
                    </td>
                    </tr>
                </table>
                <table width="100%" style="margin-left: 30px;" >
                    <tr class="text2">
                        <td width="20"></td>
                        <td width="200">Nama</td>
                        <td width="20">:</td>
                        <td>MARIA</td>
                    </tr>
                    <tr class="text2">
                        <td width="20"></td>
                        <td width="200">Tempat, Tgl. Lahir</td>
                        <td width="20">:</td>
                        <td>NGAWI</td>
                    </tr>
                    <tr class="text2">
                        <td width="20"></td>
                        <td width="200">No. KTP</td>
                        <td width="20">:</td>
                        <td>012389203489</td>
                    </tr>
                    <tr class="text2">
                        <td width="20"></td>
                        <td width="200">Pekerjaan</td>
                        <td width="20">:</td>
                        <td>PETANI</td>
                    </tr>
                    <tr class="text2">
                        <td width="20"></td>
                        <td width="200">Alamat</td>
                        <td width="20">:</td>
                        <td>GADUNG RT 001</td>
                    </tr>
                </table>
                <table width="100%" style="margin-left: 30px;">
                    <tr>
                    <td>
                    (selanjutnya disebut Penerima Piutang Murabahah / NASABAH)
                    </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                    <td style="text-align: justify;">
                        Berdasarkan hal-hal tersebut di atas, BANK dan NASABAH sepakat mengikatkan diri untuk mengadakan Perjanjian Piutang Murabahah (selanjutnya disebut perjanjian) dengan ketentuan-ketentuan dan syarat-syarat sebagai berikut:
                    </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td style="text-align: center;"><b><i>Pasal 1</i> <br> PIUTANG MURABAHAH DAN PENGGUNAANNYA</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">1.</td>
                        <td style="text-align: justify;">BANK dengan ini menjual kepada NASABAH dan NASABAH membeli dari BANK berupa Pembelian - yaitu Pembiayaan dari PT. BPRS
                            Mitra Cahaya Indonesia sebesar Rp 150 000.000,- (Seratus Lima Puluh Juta Rupiah) oleh karenanya NASABAH dengan ini mengakui dengan sebenarnya dan secara sah menerima Piutang Murabahah dari BANK, sejumlah Harga pokok Rp 150.000.000,- (Seratus Lima Puluh Juta Rupiah) ditambah keuntungan margin sebesar Rp. 161.813 442,- (Seratus Enam Puluh Satu Juta Delapan Ratus Tiga Belas Ribu Empat Ratus Empat Puluh Dua Rupiah) dan ditambah Collection Fee tagihan sebesar Rp. 20.063.457,- (Juta Enam Puluh Tiga Ribu Empat Ratus Lima Puluh Tujuh Rupiah) sehingga harga jual BANK kepada NASABAH Rp. 291.749.985,- (Dua Ratus Sembilan Puluh Satu Juta Tujuh Ratus Empat Puluh Sembilan Ribu Sembilan Ratus Delapan Puluh Lima Rupiah).</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">2.</td>
                        <td style="text-align: justify;">Piutang Murabahah ini semata-mata akan dipergunakan oleh NASABAH hanya untuk pembelian barang berupa Pembelian dari sumber yang telah dipilih dan ditunjuk oleh NASABAH, dan BANK dengan ini memberi kuasa kepada NASABAH untuk membeli barang-barang tersebut untuk kepentingan dan atas nama BANK Barang-barang tersebut untuk saat yang sama dibeli oleh NASABAH dan BANK karenanya NASABAH dengan ini menyatakan secara sah memperoleh pembiayaan dan BANK, sejumlah yang terdiri dan jumlah pokok plutang Murabahan yang diterima, ditambah margin keuntungan jual beli yang ditetapkan oleh BANK.</td>
                    </tr>
                </table>
                <table  width="100%">
                    <tr style="text-align: center;">
                        <td style="text-align: center;"><b><i>Pasal 2</i><br> JANGKA WAKTU, ANGSURAN DAN BIAYA ADMINISTRASI</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">1.</td>
                        <td style="text-align: justify;">Fasilitas Piutang Murabahah ini diberikan untuk jangka waktu 81 (Detapan Puluh Satu) bulan, terhitung sejak tanggal 30-08-2021 sampai dengan tanggal 30-05-2028 NASABAH sepakat bahwa angsuran didebet langsung pada bulan saat NASABAH menandatangani perjanjian ini dari rekening tabungan NASABAH NASABAH wajib melakukan pembayaran kembas kepada BANK secara angsuran dengan tertib dan teratur mulai tanggal 30-09-2021 dan terakhir tanggal 30-05-2028 dan harus lunas.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">2.</td>
                        <td style="text-align: justify;">Semua pembayaran kembalpelunasan Piutang Murabahah berikut margin keuntungan jual beli oleh NASABAH kepada BANK akan dilaksanakan melalui rekening NASABAH yang dibuka oleh dan atas nama NASABAH di BANK, dan dengan ini NASABAH memberi kuasa kepada BANK untuk mendebet rekening NASABAH guna pembayaran kembali fasilitas Piutang Murabahah berikut margin keuntungan jual beli dan Colletion Fee yaitu Rp 150.000.000,- (Seratus Lima Puluh Juta Rupiah) ditambah Rp 141.749 985,- (Seratus Empat Puluh Satu Juta Tujuh Ratus Empat Puluh Sembilan Ribu Sembilan Ratus Delapan Puluh Lima Rupiah), dengan jumlah angsuran
                            tiap bulan sebesar Rp. 3.601.852,- (Tiga Juta Enam Ratus Satu Ribu Delapan Ratus Lima Puluh Dua Rupiah). </td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">3.</td>
                        <td style="text-align: justify;">Dalam hal dipergunakan jasa-jasa Notaris, Asuransi atau jasa-jasa lainnya sehubung dengan pelaksanaan Perjanjian ini maka segala ongkos tersebut ditanggung Nasabah</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">4.</td>
                        <td style="text-align: justify;">NASABAH diwajibkan membayar Biaya Pembukaan Tabungan, Materai, Mutasi, Informasi SKSUP, dan Survei Sebesar Rp. 500.000,
                            Serta Biaya Asuransi sebesar Rp. 45.858.000,-.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">5.</td>
                        <td style="text-align: justify;">Dalam hal dipergunakan jasa-jasa Notaris, Asuransi atau jasa-jasa lainnya sehubungan dengan pelaksanaan Perjanjian ini maka segala ongkos tersebut harus ditanggung NASABAH.</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td style="text-align: center;"><b><i>Pasal 3</i><br> AGUNAN</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td>
                            Untuk menjamin pembayaran kembali pembiayaan NASABAH kepada BANK, maka dengan ini NASABAH menyatakan bahwa:
                        </td>
                    </tr>
                </table>
                <table  width="100%">
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">A.</td>
                        <td style="text-align: justify;">NASABAH menyerahkan kepada BANK sebagai jaminan pembiayaan yang diterimanya. </td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">B.</td>
                        <td style="text-align: justify;">NASABAH menyerahkan kepada BANK berupa: </td>
                    </tr>
                    <table width="84%">
                        <tr>
                            <td width="20">A.</td>
                            <td>Agunan antara lain:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>- Surat Keputusan Penisun Asli Nomor. 00096/KEP/CV/2008</td>
                        </tr>
                        <tr>
                            <td width="20">B.</td>
                            <td>Titipan Berupa:</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>-</td>
                        </tr>
                    </table>
                </table>
                <table width="100%">
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">C.</td>
                        <td style="text-align: justify;">Semua pembayaran kembali fasilitas Piutang Murabahah oleh NASABAH kepada BANK akan dilaksanakan melalui rekening NASABAH
                            pada BANK dengan sistem pembayaran setiap bulan. NASABAH memberi kuasa kepada BANK untuk mendebet rekening NASABAH
                            pada BANK guna pembayaran kembali fasilitas Piutang Murabahah.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">D.</td>
                        <td style="text-align: justify;">Apabila peraturan pemerintah merubah/mengganti pembayaran pensiun ataupun ada pemberhentian pembayaran pensiun dari pemerintah, maka sebagai NASABAH, tetap akan melunasi kewajiban kepada pihak BANK dari harta miliknya.</td>
                    </tr>
                </table>
                <table  width="100%">
                    <tr style="text-align: center;">
                        <td style="text-align: center;"><b><i>Pasal 4</i><br>PENGALIHAN HAK DAN KEWAJIBAN</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">1.</td>
                        <td style="text-align: justify;">Akad tersebut berlaku dan mengikat terhadap BANK dan NASABAH maupun para penerima dan penerus hak dan kewajiban dalam akad
                            tersebut meliputi pula: para ahli waris, pengelola, pelaksana, penggantinya dan pihak yang menerima serta pengganti yang berkepentingan), dengan ketentuan bahwa NASABAH tidak dapat mengalihkan atau melepaskan hak dan/atau kewajibannya berdasarkan
                            Akad tersebut kepada pihak lain tanpa persetujuan tertulis terlebih dahulu dari BANK</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">2.</td>
                        <td style="text-align: justify;">NASABAH setuju bahwa apabila dianggap perlu oleh BANK berdasar pertimbangannya sendiri BANK mempunyai hak untuk
                            mengalihkan, baik seluruh atau sebagian hak-hak yang timbulsehubungan dengan pelaksanaan Akad tersebut (berikut setiap perubahan, penambahan atau perpanjangannya) 
                            kepada pihak lainnya dan NASABAH setuju bahwa penerima pengalihan hak yang bersangkutan akan mendapat manfaat yang sama dengan yang diberikan kepada BANK berdasarkan akad ini.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">3.</td>
                        <td style="text-align: justify;">Dalam hal BANK mengalihkan hak dan kewajibannya baik sebagian atau seluruhnya, NASABAH tetap terikat dan tunduk pada syaratsyarat dan ketentuan-ketentuan dalam Akad tersebut (berikut setiap perubahan, penambahan atau 
                            perpanjangannya) serta perjanjianperjanjian/akad-akad lainnya yang berhubungan dengan pelaksanaan Akad ini.</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td style="text-align: center;"><b><i>Pasal 5</i><br>PERISTIWA CIDERA JANJI</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td>
                            Apabila terjadi hal-hal di bawah ini, setiap kejadian demikian, sebelum dan sesudah ini masing-masing secara tersendiri atau secara bersamasama disebut sebagai Peristiwa Cidera Janji" yaitu: 
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">1.</td>
                        <td style="text-align: justify;">Kelalaian NASABAH untuk melaksanakan kewajibannya menurut perjanjian ini yaitu membayar angsuran fasilitas Piutang Murabahah
                            berikut margin keuntungan jual beli tepat pada waktunya, dalam hal ini lewat waktunya saja telah memberi bukti bahwa NASABAH telah melalaikan kewajiban. Untuk hal ini BANK dan NASABAH sepakat untuk mengenyampingkan pasal 1238 Kitab Undang-Undang Hukum
                            Perdata.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">2.</td>
                        <td style="text-align: justify;">Apabila terdapat suatu janji, pemyataan, titipan atau kesepakatan dari NASABAH menurut perjanjian ini ternyata tidak benar, tidak tepat
                            atau menyesatkan.</td>
                    </tr>
                    <table width="84%">
                        <tr style="vertical-align: top; text-align: left;">
                            <td width="20">i.</td>
                            <td>Apabila NASABAH mengajukan permohonan resmi kepada Pengadilan Negeri untuk dinyatakan pailit.</td>
                        </tr>
                        <tr style="vertical-align: top; text-align: left;">
                            <td width="20">ii.</td>
                            <td style="text-align: justify;">Terhadapnya dilancarkan suatu tindakan yang apabila didalam waktu 60 (Enam puluh) hari takwim tidak dicabut, akan menjurus
                                kepada suatu pailit dari NASABAH.</td>
                        </tr>
                    </table>
                </table>
                <table width="100%">
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">3.</td>
                        <td style="text-align: justify;">Jikalau atas barang milik NASABAH dan/atau penjamin baik sebagian maupun seluruhnya dilakukan sita titipan atau sita eksekusi.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">4.</td>
                        <td style="text-align: justify;">Jikalau kekayaan NASABAH serta nilai barang-barang dan lain-lain yang menjadi tanggungan nanti menurut penilaian BANK secara seketika 
                            dan sekaligus dan BANK tindakan apapun yang dianggapnya perlu sehubungan dengan perjanjian ini untuk menjamin pelunasan kembali pembiayaan.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">5.</td>
                        <td style="text-align: justify;">Bahwa apabila dalam periode masa pinjaman, NASABAH meninggal dunia ataupun oleh sebab apapun yang mengakibatkan NASABAH tidak lagi bekerja lagi 
                            dan / atau wanprestasi, maka semua kewajiban Nasabah pada PT. BPRS Mitra Cahaya Indonesia akan didahulukan pembayarannya, dari dana luang Nasabah yang bersumber dari : uang pesangon, 
                            dana asuransi jiwa, penjualan sumber-sumber lainnya dan sisa kewajiban sepenuhnya menjadi tanggung jawab NASABAH dan / atau ahli waris NASABAH untuk melunasi / menyelesaikan pada BANK</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td style="text-align: center;"><b><i>Pasal 6</i><br>ASURANSI</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align: justify;">
                            NASABAH berjanji dengan ini mengikatkan diri untuk atas bebannya menutup asuransi berdasar syariah terhadap jiwa nasabah selama perjanjian ini dibuat dan berlaku, pada perusahaan asuransi 
                            yang ditunjuk oleh BANK, dan dengan serta merta menunjuk dan menetapkan BANK sebagai pihak yang berhak menerima pembayaran klaim atas asuransi tersebut (banker&#39;s clause).
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td style="text-align: center;"><b><i>Pasal 7</i><br>HUKUM YANG MENGATUR</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align: justify;">
                            Perjanjian ini diatur oleh dan ditafsirkan sesuai dengan ketentuan Hukum di Indonesia.
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td style="text-align: center;"><b><i>Pasal 8</i><br>PENYELESAIAN SENGKETA</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align: justify;">
                            Sesuatu sengketa yang timbul dari dan atau dengan cara apapun yang ada hubungannya dengan perjanjian ini yang tidak dapat diselesaikan secara musyarakah, akan diselesaikan melalui Pengadilan Agama. Putusan Pengadilan Agama adalah bersifat final dan mengikat dan dapat diberlakukan di Pengadilan yang mempunyai wewenang hukum atasnya. 
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: justify;">
                            Pasal 263 KUH Pidana Barang siapa membuat surat palsu atau memalsukan surat yang dapat menimbulkan sesuatu hak, perikatan atau pembebasan hutang, atau yang diperuntukkan sebagai bukti daripada sesuatu hal dengan maksud untuk memakai atau menyuruh orang lain memakai surat tersebut seolah-olah isinya benar dan tidak dipalsu, diancam, jika pemakaian tersebut dapat menimbulkan kerugian, karena pemalsuan surat, dengan pidana penjara paling lama 6 (enam tahun)
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td style="text-align: center;"><b><i>Pasal 9</i><br>KETENTUAN TAMBAHAN</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align: justify;">
                            Hal-hal yang belum cukup diatur dalam Perjanjian ini, akan diatur berdasarkan kedua belah pihak ke dalam surat/akta yang merupakan satu kesatuan dengan perjanjian ini.
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: justify;">
                        <b>" PERJANJIAN INI TELAH DISESUAIKAN DENGAN KETENTUAN PERATURAN PERUNDANG-UNDANGAN TERMASUK KETENTUAN PERATURAN OTORITAS JASA KEUANGAN ". </b>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: justify;">
                            Demikian perjanjian ini dibuat dan ditandatangani pada hari dan tanggal sebagaimana dicantumkan di atas.
                        </td>
                    </tr>
                </table>
                <br><br>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td width="40%"></td>
                        <td>Yogyakarta, 30-06-2021 <br> NASABAH</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="30%">PT. BPRS Mitra Cahaya Indonesia <br> Direktur Utama
                        <br><br><br><br><br><br>
                        Indra Wisaksono, SE, MM
                        <hr>
                        </td>
                        <td width="5%"></td>
                        <td width="30%" style="text-align: center;">Pemohon
                            <br><br><br><br><br><br><br>
                            MARIA ARELANTA SUTINI
                            <hr>
                        </td>
                        <td width="5%"></td>
                        <td width="30%"style="text-align: center;">Suami/isteri*
                            <br><br><br><br><br><br><br>
                            SUDJITO
                            <hr>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align: center;">Saksi - Saksi,</td>
                    </tr>
                </table>
                <br><br><br><br><br>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td width="30%"><hr></td>
                        <td width="5%"></td>
                        <td width="30%"><hr></td>
                        <td width="5%"></td>
                        <td width="30%"><hr></td>
                    </tr>
                </table>
            </center>
            </div>
            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width=100%>
                    <tr>
                        <td width="25%">
                            <img src="' . public_path('assets/images/pdf/logoMCI.png') . '" width="100%">
                        </td>
                        <td>
                        <center>
                            <img src="' . public_path('assets/images/pdf/bismillah.png') . '" width="30%"><br>
                            <img src="' . public_path('assets/images/pdf/maidahayat1.png') . '" width="200px"><br>
                            <font size="2"><i>"Hai orang-orang yang beriman, penuhilah perjanjian-perjanjian itu <br>
                                (Q.S Al-Maidah : 1)"</i></font><br>
                            <br>
                        </center>
                        </td>
                        <td width="25%"></td>
                        <table>
                            <font size="3"><b>AKAD WAKALAH</b><br>Tentang<br>PEMBELIAN BARANG DALAM RANGKA PIUTANG MURABAH<br><b>NOMOR: MBAK.............../VII/2021</b></font><br>
                        </table>
                    </tr>
                </table>
                <table width="100%">
                    <tr class="text2" style="text-align: justify;">
                        <td>
                            <font size="2">
                            Perjanjian Murabahah ini dibuat dan ditanda-tangani pada hari <b>Senin</b> tanggal <b>30-08-2021</b> oleh dan antara:
                            </font>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr class="text2">
                        <td width="20"><b>I.</b></td>
                        <td width="200"><b>Nama</b></td>
                        <td width="20"><b>:</b></td>
                        <td><b>Indra Wisaksono, SE, MM</b></td>
                    </tr>
                    <tr class="text2">
                        <td width="20"><b></b></td>
                        <td width="200"><b>Jabtan</b></td>
                        <td width="20"><b>:</b></td>
                        <td><b>Direktur Utama PT. BPR. Syariah Mitra Cahaya Indonesia</b></td>
                    </tr>
                </table>
                <table width="100%" style="margin-left: 30px;">
                    <tr>
                        <td style="text-align: justify;">
                            <font>
                                Dalam hal ini bertindak dalam jabatannya tersebut untuk dan atas nama PT. Bank Pembiayaan Rakyat Syariah Mitra Cahaya Indonesia berkedudukan di JL Kaliurang Km 10 No 28 Kecamatan Ngaglik Sleman, 
                                Propinsi Daerah Istimewa Yogyakarta, berdasarkan Anggaran Dasarnya dimuat dalam Akta Pendirian Nomor 17 tertanggal 11 januari 2008 (11-01-2008) dihadapan notaris Wahyu Wiryono, SH dan telah mendapat 
                                pengesahan dari Menteri Hukum dan Hak Asasi Manusia Republik Indonesia dengan Surat Keputusannya tertanggal 18 Maret 2008 (18-02-2008) Nomor AHU-13544.AH.01.01 tahun 2008. Dan telah mengalami perubahan 
                                terakhir dengan akta Nomor 06 tanggal 5 Agustus 2020 di hadapan notaris Moh Djaelani Asad, Sh dengan bukti Penerimaan Pemberitahuan Perubahan Data Perseroan Menteri Hukum dan Hak Asasi Kemanusiaan Republik 
                                Indonesia Nomor AHU-AH.01.03-0330862 tanggal 6 Agustus 2020, (selanjutnya disebut Bank)
                            </font>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr class="text2">
                        <td width="20">II.</td>
                        <td width="200">Nama</td>
                        <td width="20">:</td>
                        <td>MARIA</td>
                    </tr>
                    <tr class="text2">
                        <td width="20"></td>
                        <td width="200">Tempat, Tgl. Lahir</td>
                        <td width="20">:</td>
                        <td>NGAWI</td>
                    </tr>
                    <tr class="text2">
                        <td width="20"></td>
                        <td width="200">No. KTP</td>
                        <td width="20">:</td>
                        <td>012389203489</td>
                    </tr>
                    <tr class="text2">
                        <td width="20"></td>
                        <td width="200">Pekerjaan</td>
                        <td width="20">:</td>
                        <td>PETANI</td>
                    </tr>
                    <tr class="text2">
                        <td width="20"></td>
                        <td width="200">Alamat</td>
                        <td width="20">:</td>
                        <td>GADUNG RT 001</td>
                    </tr>
                </table>
                <table width="100%" style="margin-left: 30px;">
                    <tr>
                    <td>
                    Dalam hal ini bertindak sebagi Wakil (Penerima Kuasa) selanjutnya di sebut NASABAH.
                    </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                    <td style="text-align: justify;">
                    Selanjutnya baik BANK dan NASABAH bersama-sama atau sendiri dalam kedudukan tersebut di atas terlebih dahulu menerangkan hal-hal sebagai berikut:
                    </td>
                    </tr>
                </table>
                <table width="100%" style="margin-left: 20px;">
                    <tr>
                      
                        <td>1.</td>
                        <td>BANK secara prinsip membeli dari Penjual berdasarkan Pesanan NASABAH.</td>
                    </tr>
                    <tr>
                       
                        <td>2.</td>
                        <td>BANK dengan Akad ini memberi kuasa kepada NASABAH untuk membeli dan menerima Pembelian -</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                       
                        <td>3.</td>
                        <td style="text-align: justify;">NASABAH dengan Akad ini menyerahkan barang berikut Dokumen-dokumen terkait kepada BANK dan BANK secara Prinsip
                            menerima barang berikut dokumen-dokumen dimaksud.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                      
                        <td style="text-align: justify;">4.</td>
                        <td>Akad ini sebagai bukti BANK secara Prinsip telah menerima Barang berikut dokumen-dokumen yang terkait dari NASABAH.</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align: justify;">Berdasarkan hal-hal tersebut di atas, BANK dan NASABAH dengan ini sepakat untuk mengikatkan diri satu dengan lainnya dengan syaratsyarat dan ketentuan-ketentuan sebagaimana yang tercantum dalam Pasal-pasal berikut ini.</td>
                    </tr>
                </table>
                <table  width="100%">
                    <tr style="text-align: center;">
                        <td style="text-align: center;"><b><i>Pasal 1</i> <br> DEFINISI</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td>Dalam Akad ini, yang dimaksud dengan</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">1.</td>
                        <td style="text-align: justify;">Dokumen adalah akta-akta, surat-surat bukti kepemilikan dan surat lainnya yang merupakan bukti hak atas barang berikut surat-surat lain
                            yang merupakan satu kesatuan.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">2.</td>
                        <td style="text-align: justify;">Piutang barang adalah Piutang kepemilikan barang berdasarkan prinsip Murabahah yang diberikan oleh BANK dan NASABAH untuk
                            digunakan membeli barang guna dimiliki dan/atau dipergunakan sendiri.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">3.</td>
                        <td style="text-align: justify;">Wakalah adalah Pemberian Kuasa oleh BANK kepada NASABAH untuk membeli dan menerima barang dari Penjual.</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td style="text-align: center;"><b><i>Pasal 2</i> <br> OBYEK WAKALH</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td>Obyek Wakalah meliputi hal-hal sebagai berikut:</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="200">Pembiayaan Dan Bprs MCI</td>
                        <td width="10">:</td>
                        <td style="text-align: justify;">Dokumen adalah akta-akta, surat-surat bukti kepemilikan dan surat lainnya yang merupakan bukti hak atas barang berikut surat-surat lain
                            yang merupakan satu kesatuan.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="200">Jenis Barang</td>
                        <td width="10">:</td>
                        <td style="text-align: justify;">Pembelian -</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="200">Bukti Kepemilikan</td>
                        <td width="10">:</td>
                        <td style="text-align: justify;">Kwitansi</td>
                    </tr>
                </table>
                <table  width="100%">
                    <tr style="text-align: center;">
                        <td style="text-align: center;"><b><i>Pasal 3</i> <br>KETENTUAN BAGI BANK</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">1.</td>
                        <td style="text-align: justify;">BANK memberikan hak kepada NASABAH untuk menandatangani Kesepakatan Jual beli untuk dan atas nama NASABAH dengan
                            Penjual.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">2.</td>
                        <td style="text-align: justify;">BANK akan melakukan pembayaran atas harga beli barang kepada Penjual, setelah NASABAH menandatangani Akad Piutang
                            Murabahah.</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td style="text-align: center;"><b><i>Pasal 4</i> <br>KETENTUAN BAGI NASABAH</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">1.</td>
                        <td style="text-align: justify;">Akad ini sebagai dasar NASABAH untuk menanda tangani Akad Piutang Murabahah, sebagai suatu pengakuan kewajiban mengenal jumlah uang yang wajib dan harus dibayar oleh NASABAH kepada BANK dan penyerahan dokumen-dokumen yang terkait sehubungan
                            dengan akad ini. </td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">2.</td>
                        <td style="text-align: justify;">NASABAH akan menyerahkan bukti Pembelian Barang kepada Pemberi kuasa/BANK.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">3.</td>
                        <td style="text-align: justify;">NASABAH menjamin akan melaksanakan kuasa yang diberikan BANK dengan Amanah.</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td style="text-align: center;"><b><i>Pasal 5</i> <br>PENUTUP</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">1.</td>
                        <td style="text-align: justify;">Seluruh uraian dan Pasal dalam Akad ini telah dibaca, dimengerti dan difahami serta disetujui oleh BANK dan NASABAH.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">2.</td>
                        <td style="text-align: justify;">Hal-hal yang belum di atur dalam Akad ini akan ditetapkan berdasarkan kesepakatan bersama BANK dan NASABAH dan merupakan
                            bagian yang tidak terpisahkan dari Akad ini.</td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">3.</td>
                        <td style="text-align: justify;">Akad Wakalah ini merupakan satu kesatuan yang tak terpisahkan dengan Akad Piutang Murabahah. </td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="20">4.</td>
                        <td style="text-align: justify;">Akad ini mulai berlaku sejak tanggal di tanda tangani BANK dan NASABAH dan berakhirnya bilamana segala hak dan kewajiban para
                            pihak dilaksanakan seluruhnya atau pada saat di tanda tangani Akad Piutang Murabahah oleh BANK dan NASABAH.</td>
                    </tr>
                </table>
                <br><br>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td width="40%"></td>
                        <td>Yogyakarta, 30-06-2021 <br> NASABAH</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="35%">PT. BPRS Mitra Cahaya Indonesia <br> Direktur Utama
                        <br><br><br><br><br><br>
                        Indra Wisaksono, SE, MM
                        <hr>
                        </td>
                        <td width="10"></td>
                        <td style="text-align: center;">Pemohon
                            <br><br><br><br><br><br><br>
                            MARIA ARELANTA SUTINI
                            <hr>
                        </td>
                        <td width="10"></td>
                        <td width="30%"style="text-align: center;">Suami/isteri*
                            <br><br><br><br><br><br><br>
                            SUDJITO
                            <hr>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align: center;">Saksi - Saksi,</td>
                    </tr>
                </table>
                <br><br><br><br><br>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td width="30%"><hr></td>
                        <td width="5%"></td>
                        <td width="30%"><hr></td>
                        <td width="5%"></td>
                        <td width="30%"><hr></td>
                    </tr>
                </table>
            </center>
            </div>



            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
            <table width="100%">
                <tr class="text2">
                    <td><img src="' . public_path('assets/images/pdf/logoMCI.png') . '" width="30%" ></td>
                   
                </tr>
            </table>
            <table  width="100%">
                <tr>
                    <td>
                    <center>
                        <font size="4"><b>TANDA TERIMA PENYERAHAN JAMINAN</b></font><br>
                    </center>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;">
                        <font size="4"><b>DEBITUR</b></font><br>
                    </td>
                </tr>
            </table>
            <table align="left"  cellpadding="1" cellspacing="0">
                <tbody>
                    <tr class="text2">
                        <td>Nama</td>
                        <td>:</td>
                        <td>Maria</td>
                    </tr>
                    <tr class="text2">
                        <td >NIP / Nopen</td>
                        <td >:</td>
                        <td>213242342</td>
                    </tr>
                    <tr class="text2">
                        <td>Instansi</td>
                        <td>:</td>
                        <td>TASPEN</td>
                    </tr>
                    <tr class="text2">
                        <td>Loket Bayar</td>
                        <td>:</td>
                        <td>BRPS MCI</td>
                    </tr>
                    <tr class="text2">
                        <td>Alamat</td>
                        <td>:</td>
                        <td>GEDUNG</td>
                    </tr>
                </tbody>
            </table>
            <table align="right" border="1" cellpadding="1" cellspacing="0">
                <tbody>
                <tr>
                    <td>Surat Keputusan Pensiun Asli&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                        0096/KEP/CV/6523/2008<br>
                        Tertanggal, 2008-04-04<br>
                        Atas nama :<br>
                        MARIA AREL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                </tbody>
            </table>
            <br>
            <table width="100%">
                <tr>
                    <td>Diserahkan Tanggal,</td>
                </tr>
            </table>
        </center>
            <table border="1" width=30% style="margin-left: 5%;">
                <tr>
                    <td style="text-align: center;" width="250">DEBITUR
                        <br><br><br><br><br>
                        MARIA ARNE</td>
                    <td style="text-align: center;" width="250">MARKETING
                        <br><br><br><br><br>
                    </td>
                </tr>
            </table>
            <br>
            <center>
                <table width="100%">
                    <tr>
                        <td>Diserahkan Tanggal,</td>
                    </tr>
                </table>
            </center>
            <table border="1" width=60% style="margin-left: 5%;">
                <tr>
                    <td style="text-align: center;" width="250">DEBITUR
                        <br><br><br><br><br>
                        MARIA ARNE</td>
                    <td style="text-align: center;" width="250">MARKETING
                        <br><br><br><br><br>
                    </td>
                </tr>
            </table>
            <br>
            <center>
                <img src="' . public_path('assets/images/pdf/cut.png') . '" width="150" height="40">
            </center>
            <center>
                <table  width="100%">
                    <tr class="text2">
                        <td><img src="' . public_path('assets/images/pdf/logoMCI.png') . '" width="30%" ></td>
                    
                    </tr>
                </table>
                <table  width="100%">
                    <tr>
                        <td>
                        <center>
                            <font size="4"><b>TANDA TERIMA PENYERAHAN JAMINAN</b></font><br>
                        </center>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">
                            <font size="4"><b>DEBITUR</b></font><br>
                        </td>
                    </tr>
                </table>
                <div class="grid-container">
                    <div>
                        <table width="100%">
                            <tr class="text2">
                                <td width="100">Nama</td>
                                <td width="10">:</td>
                                <td>Maria</td>
                            </tr>
                            <tr class="text2">
                                <td width="100">NIP / Nopen</td>
                                <td width="10">:</td>
                                <td>213242342</td>
                            </tr>
                            <tr class="text2">
                                <td width="100">Instansi</td>
                                <td width="10">:</td>
                                <td>TASPEN</td>
                            </tr>
                            <tr class="text2">
                                <td width="100">Loket Bayar</td>
                                <td width="10">:</td>
                                <td>BRPS MCI</td>
                            </tr>
                            <tr class="text2">
                                <td width="100">Alamat</td>
                                <td width="10">:</td>
                                <td>GEDUNG</td>
                            </tr>
                        </table>

                    </div>
                    <a></a>
                    <a></a>
                    <div>
                        <table border="3"  >
                            <tr>
                                <td>Surat Keputusan Pensiun Asli<br>
                                0096/KEP/CV/6523/2008<br>
                                Tertanggal, 2008-04-04<br>
                                Atas nama :<br>
                                MARIA AREL</td>
                            </tr>
                        </table>

                    </div>
                </div>
            
                <table width="100%">
                    <tr>
                        <td>Diserahkan Tanggal,</td>
                    </tr>
                </table>
            </center>
            <table border="1" width=60% style="margin-left: 5%;">
                <tr>
                    <td style="text-align: center;" width="250">DEBITUR
                        <br><br><br><br><br>
                        MARIA ARNE</td>
                    <td style="text-align: center;" width="250">MARKETING
                        <br><br><br><br><br>
                    </td>
                </tr>
            </table>
            <br>
            <center>
                <table width="100%">
                    <tr>
                        <td>Diserahkan Tanggal,</td>
                    </tr>
                </table>
            </center>
            <table border="1" width=60% style="margin-left: 5%;">
                <tr>
                    <td style="text-align: center;" width="250">DEBITUR
                        <br><br><br><br><br>
                        MARIA ARNE</td>
                    <td style="text-align: center;" width="250">MARKETING
                        <br><br><br><br><br>
                    </td>
                </tr>
            </table>
            </div>


            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width="100%">
                    <tr>
                        <td style="text-align: center;">
                            <font size="4">
                                <b>SURAT PERMOHONAN<br>REALISASI PIUTANG MURABAHAH</b>
                            </font>
                        </td>
                    </tr>
                </table>
                <br><br>
                <table width="100%">
                    <tr class="text2">
                        <td width="100">Tanggal</td>
                        <td width="10">:</td>
                        <td>30-08-2021</td>
                    </tr>
                    <tr class="text2">
                        <td width="100">Kepada</td>
                        <td width="10">:</td>
                        <td>BPRS MCI YOGYAKARTA</td>
                    </tr>
                    <tr class="text2">
                        <td width="100">Dari</td>
                        <td width="10">:</td>
                        <td>MARIA AT</td>
                    </tr>
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td>
                            Bismillahirahmaanirrahiim<br>Assalaamu&#39;alaikum Warohmatullahi Wabarokatuh
                        </td>
                    </tr>
                </table>
                <br>
                <br>
                <table width="100%">
                    <tr>
                        <td style="text-align: justify;">
                            Sehubungan dengan penunjukkan Saya sebagai kuasa dari dan oleh karena itu bertindak untuk dan atas nama BPRS MCI YOGYAKARTA (selanjutnya disebut BANK) untuk melakukan pembelian barang sebagaimana tercantum dalam Perjanjian Piutang Murabahah No: MBAK..............M14/2021 pasal 1 ayat 2, agar BANK membayar kepada Saya uang sejumlah Rp.150.000.000,00 (Seratus Lima Puluh Juta Rupiah) Pada saat yang sama, barang tersebut dijual oleh BANK kepada Saya dengan harga jual sejumlah Rp.291.749.985,00 (Dua Ratus Sembilan Puluh Satu Juta Tujuh Ratus Empat Puluh Sembilan Ribu Sembilan Ratus Delapan Puluh Lima Rupiah). Saya membayar uang muka (urbun) atas pembelian barang tersebut sebesar Rp. ----) sehingga Sisa Harga Jual menjadi Rp.291.749.985,00 (Dua Ratus Sembilan Puluh Satu Juta Tujuh Ratus Empat Puluh Sembilan Ribu Sembilan Ratus Delapan Puluh Lima Rupiah) dengan demikian Saya menyatakan bahwa:
                        </td>
                    </tr>
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td width="20">1.</td>
                        <td style="text-align: justify;"">
                            Membebaskan BANK dari segala tuntutan pihak ketiga manapun yang dirugikan baik secara langsung sehubungan dengan keberadaan barang
                            barang tersebut. </td>
                    </tr>
                    <tr>
                        <td width="20">2.</td>
                        <td style="text-align: justify;">
                            Saya bertanggung jawab untuk membayar harga pembelian barang kepada BANK sekalipun jual beli antara Saya dengan Supplier/Dealer tidak
                            dilaksanakan. Bersama ini pula Saya menerangkan dan menjamin bahwa Saya sudah memenuhi semua syarat-syarat dan ketentuan-ketentuan dalam Perjanjian Piutang Murabahah.</td>
                    </tr>
                </table>
                <br><br>
                <table width="100%">
                    <tr>
                        <td>Wassalamu&#39;alaikum Warohmatullahi Wabarokatuh</td>
                    </tr>
                </table>
                <br><br>

                <table width="100%">
                    <tr class="">
                        <td><b>Penerima Pembiayaan Murabahah</b><br>
                            <br><br><br><br><br><br><br>
                            <b><u>MARIA TH</u></b>
                        </td>
                    </tr>
                </table>
            </center>
            </div>
            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width="100%">
                    <tr>
                        <td>
                        <center>
                            <font size="4"><b>SURAT PERNYATAAN DEBITUR</b></font><br>
                        </center>
                        </td>
                    </tr>
                </table>
                <br><br><br>
                <table width="100%">
                    <tr>
                        <td>Yang bertanda tangan dibawah ini:</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="10">a.</td>
                        <td width="200">Nama PNS/ Pensiun</td>
                        <td width="10">:</td>
                        <td>MARIA</td>
                    </tr>
                    <tr>
                        <td width="10">b.</td>
                        <td width="200">TUK/NRP/NIP/NOTAS</td>
                        <td width="10">:</td>
                        <td>123456789</td>
                    </tr>
                    <tr>
                        <td width="10">c.</td>
                        <td width="200">Tempat dan Tanggal Lahir</td>
                        <td width="10">:</td>
                        <td>MARIA</td>
                    </tr>
                    <tr>
                        <td width="10">d.</td>
                        <td width="200">Alamat Lengkap</td>
                        <td width="10">:</td>
                        <td>MARIA</td>
                    </tr>
                    <tr>
                        <td width="10"></td>
                        <td width="200">Kelurahan</td>
                        <td width="10">:</td>
                        <td>MARIA</td>
                    </tr>
                    <tr>
                        <td width="10"></td>
                        <td width="200">Kecamatan</td>
                        <td width="10">:</td>
                        <td>MARIA</td>
                    </tr>
                    <tr>
                        <td width="10"></td>
                        <td width="200">Kabupaten/Kota</td>
                        <td width="10">:</td>
                        <td>MARIA</td>
                    </tr>
                    <tr>
                        <td width="10"></td>
                        <td width="200">Propinsi</td>
                        <td width="10">:</td>
                        <td>MARIA</td>
                    </tr>
                    <tr>
                        <td width="10">e.</td>
                        <td width="200">No. Telepon</td>
                        <td width="10">:</td>
                        <td>MARIA</td>
                    </tr>
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td style="text-align: justify;">
                            Sehubungan dengan saya mengambil fasilitas kredit pada BPRS MCI YOGYAKARTA dengan perjanjian kredit nomor MBAK...............NII/2021 yang pembayaran gaji Pensiunnya dibayarkan di PT POS INDONESIA (PERSERO), Kantorpos BRPS MCI maka dengan ini saya menyatakan:
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="20">1.</td>
                        <td style="text-align: justify;">
                            Pada saat penerimaan pembayaran Manfaat Tabungan Hari Tua (THT) dan/atau Pensiun saya setiap bulan dari PT TASPEN
                            (PERSEROYPT ASABRI (PERSERO), agar dibayarkan melalui rekening saya nomor 7102864268 atas Nama: MARIA ARLENTINA
                            SUTINI Pada PT POS INDONESIA (PERSERO), Kantor POS BRPS MCI sampai dengan kredit saya lunas.
                        </td>
                    </tr>
                    <tr>
                        <td width="20">2.</td>
                        <td style="text-align: justify;">
                            Memberi kuasa kepada PT POS INDONESIA (PERSERO), untuk melakukan Flagging data saya pada *PT TASPEN
                            (PERSERO)/PT ASABRI (PERSERO) selama jangka waktu kredit yang telah disetujui yaitu tanggal . bulan. tahun. sampai dengan
                            tanggal. bulan. tahun.
                        </td>
                    </tr>
                    <tr>
                        <td width="20">3.</td>
                        <td style="text-align: justify;">
                            Pada saat dana Pensiun saya sudah masuk ke rekening PT POS INDONESIA (PERSERO), dengan ini saya memberi kuasa kepada
                            PT POS INDONESIA (PERSERO), Kantorpos BRPS MCI untuk melakukan pemotongan dana pensiun saya untuk pembayaran angsuran sebesar Rp. 3.601.852 dan disetorkan ke BANK BSM an BPRS Mitra Cahaya Indonesia PT dengan nomor rekening
                            1408197011
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align: justify;">
                            Demikian surat pernyataan dan kuasa ini saya buat, untuk dipergunakan sebagaimana mestinya.
                        </td>
                    </tr>
                </table>
                <br><br><br><br>
                <table width="100%">
                    <tr>
                        <td width="65%"></td>
                        <td style="text-align: center;">NGAWI, 30-08-2021<br> Yang Menyatakan
                        <br><br><br><br><br><br>
                        MARIA   </td>
                    </tr>
                </table>
                <br><br><br>
                <table width="100%">
                    <tr>
                        <td>Catatan:</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="20">1.</td>
                        <td>Lembar 1 untuk PT TASPEN (PERSERO) PT ASABRI (PERSERO)</td>
                    </tr>
                    <tr>
                        <td width="20">2.</td>
                        <td>Lembar 2 untuk PT POS INDONESIA(PERSERO)</td>
                    </tr>
                    <tr>
                        <td width="20">3.</td>
                        <td>Lembar 3 untuk Direktur</td>
                    </tr>
                    <tr>
                        <td width="20">4.</td>
                        <td>Lembar 4 untuk arsip</td>
                    </tr>
                </table>
            </center>
            </div>
            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width=100%>
                    <tr>
                        <td>
                        <center>
                            <img src="' . public_path('assets/images/pdf/bismillah.png') . '" width="30%"><br>
                            <font size="2"><i>Dengan menyebut nama Allah yang Maha Pengsaih lagi Maha Penyayang</i></font><br>
                            <br>
                            <font size="3"><b>PERNYATAAN DAN KUASA</b></font><br>
                        </center>
                        </td>
                    </tr>
                <table width="100%">
                    <tr class="text2" style="text-align: justify;">
                        <td>
                            <font size="2">
                                Sehubungan dengan telah direalisasikannya Akad Pembiayaan Murabahah PT BPRS Mitra Cahaya Indonesia 
                                pada tanggal 30-08-2021 dengan ini saya/NASABAH MARIA ARLENTINA SUTINI yang beralamat di GADUNG RT 001 RW 003 NGOMPRO, PANGKUR, NGAWI JAWA TIMUR bertindak untuk dan atas nama pribadi, menyatakan hal-hal sebagai berikut:
                            </font>
                        </td>
                    </tr>
                </table>
                </table>

                <table width="100%">
                    <tr class="text2">
                        <td width="20">1.</td>
                        <td widht="100" style="text-align: justify;">Menyetujui untuk menggunakan fasilitas pembiayaan yang disediakan oleh PT BPRS Mitra Cahaya Indonesia sesuai ketentuan yang
                            berlaku.</td>  
                    </tr>
                    <tr class="text2">
                        <td width="20">2.</td>
                        <td widht="100" style="text-align: justify;">Menjamin bahwa pembiayaan yang diperoleh dari PT BPRS Mitra Cahaya Indonesia akan benar-benar disalurkan seluruhnya dalam
                            usaha prinsip syariah yaitu untuk Pembelian -.</td>  
                    </tr>
                    <tr class="text2">
                        <td width="20" >3.</td>
                        <td widht="100" style="text-align: justify;">Melakukan pembayaran atas seluruh kewajiban yang timbul akibat pembiayaan dari PT BPRS Mitra Cahaya Indonesia, sampai dengan
                            pembiayaan tersebut lunas. </td>  
                    </tr>
                    <tr class="text2">
                        <td width="20">4.</td>
                        <td widht="100" style="text-align: justify;">Menjamin kelancaran pembayaran kewajiban atas fasilitas pembiayaan yang diterima oleh saya/NASABAH sampai dengan
                            pembiayaan/hutang tersebut dinyatakan lunas/selesai oleh BPRS Mitra Cahaya Indonesia.</td>  
                    </tr>
                    <tr class="text2">
                        <td width="20">5.</td>
                        <td widht="100" style="text-align: justify;">Melakukan segala sesuatu yang dianggap perlu guna menjaga kepentingan BPRS Mitra Cahaya Indonesia. </td>  
                    </tr>
                    <tr class="text2">
                        <td width="20">6.</td>
                        <td widht="100" style="text-align: justify;">
                            Memerintahkan dan memberi kuasa kepada PT BPRS Mitra Cahaya Indonesia untuk mendebat rekening tabungan di PT. BPRS Mitra
                            Cahaya Indoneisa, Atas Nama MARIA ARTLSAKADSDLA, sejumlah yang diperlukan untuk kepentingan pembayaran pokok, marjin, serta kewajiban
                            lainnya yang terikat dengan pembiayaan
                        </td>  
                    </tr>
                </table>
                <table width="100%" style="margin-left:30px;">
                    <tr>
                        <td width="100">Nomor</td>
                        <td width="20">:</td>
                        <td><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                    <tr>
                        <td width="100">Atas Nama</td>
                        <td width="20">:</td>
                        <td>MARIA ATSDHAJ</td>
                    </tr>
                    <tr>
                        <td width="100">Pada Bank</td>
                        <td width="20">:</td>
                        <td><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="20"></td>
                        <td style="text-align: justify;">Sejumlah yang diperlukan untuk kepentingan biaya prarealisasi, pembayaran pokok pembiayaan dan pembayaran Marjin serta kewajiban
                            lain yang terkait dengan pembiayaan yang telah kami terima. </td>
                    </tr>
                    <tr>
                        <td width="20">7.</td>
                        <td style="text-align: justify;">Tidak akan memberikan hadiah langsung / tidak langsung kepada Direksi dan Karyawan PT BPRS Mitra Cahaya Indonesia.  </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                    <td style="text-align:justify ;">
                        <font size="2">
                            Demikian pernyataan dan kuasa ini dibuat dengan kesadaran tanpa paksaan serta untuk digunakan sebagaimana mestinya
                        </font>
                    </td>
                    </tr>
                </table>
                <br>
                <br>
                <br>
                <table width="100%">
                    <tr>
                        <td width="65%"></td>
                        <td style="text-align: center;">Yogyakarta, 30-08-2021<br>NASABAH
                        <br><br><br><br><br><br><br><br><br><br>
                        <u>MARIASD ASDASKDAKSMDKA</u></td>
                    </tr>
                </table>
            </center>
            </div>
            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width=100%>
                    <tr>
                        <td>
                        <center>
                            <br>
                            <font size="3"><b>OPINI<br>DEWAN PENGAWAS<br>
                            PT. BPR SYARIAH MITRA CAHAYA INDONESIA</b><br><br>
                            <i>Bismillahirahmaanirrahiim</i></font><br>
                        </center>
                        </td>
                    </tr>
                <table width="100%">
                    <tr class="text2">
                        <td style="text-align: justify;">
                            <font size="2">
                                Dengan ini Dewan Pengawas Syariah PT. BPR Syariah MITRA CAHAYA INDONESIA 
                                beropini penggunaan akad Murabahah MBAK............/VI/2021 kepada nasabah 
                                atas nama MARIA ARLENTINA SUTINI di GADUNG RT 001 RW 003. NGOMPRO, PANGKUR. 
                                NGAWI JAWA TIMUR Hal ini berdasarkan pada data yang diterima oleh bagian 
                                pembiayaan yang kemudian dilakukan pengecekan ke lapangan oleh M. Mufid 
                                Faturahman sebagai account officer dan kemudian disampaikan oleh Direksi 
                                kepada Dewan Pengawas Syariah, bahwa dana pembiayaan tersebut akan digunakan
                                untuk:
                            </font><br>
                            <font size="2">- (sesuai dengan Surat Permohonan Murabahah).</font><br><br>
                            <font size="2">
                                Sehingga Dewan Pengawas Syariah menyampaikan bahwa penggunaan akad Murabahah dalam membiayai kebutuhan nasabah seperti dijelaskan pada rencana penggunaan dana.
                            </font><br><br>
                            <font size="2">
                                Demikian opini ini kami buat dan kami sampaikan kepada Direksi PT. BPR Syariah MITRA CAHAYA INDONESIA agar supaya dipergunakan sebagaimana mestinya.
                            </font>
                        </td>
                    </tr>
                </table>
                </table>
                <br>
                <br>
                <br>
                <table width="100%">
                    <tr>
                        <td width="65%"></td>
                        <td>Sleman, 30-08-2021<br>Dewan Pengawas Syariah<br>
                        PT. BPRS MITRA CAHAYA INDONESIA
                        <br><br><br><br><br><br><br><br><br><br>
                        Drs. H. M. Hajar Dewantoro, M. Ag.
                    </td>
                    </tr>
                </table>
            </center>
            </div>
            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width="100%">
                    <tr class="text2">
                        <td><img src="' . public_path('assets/images/pdf/logoMCI.png') . '" width="30%" ></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td>
                        <center>
                            <font size="4"><b>BUKTI PENCAIRAN PEMBAYARAN</b></font><br>
                        </center>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align: right;"><b>DEBITUR</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="300">Nama</td>
                        <td width="20">:</td>
                        <td>MARIA SDAAS</td>
                    </tr>
                    <tr>
                        <td width="300">No. Pensiun</td>
                        <td width="20">:</td>
                        <td>182902944959</td>
                    </tr>
                    <tr>
                        <td width="300">Kantor Bayar Pensiun</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td>
                            <b><u>RINCIAN PENERIMAAN PEMBAYARAN</u></b>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="300">Pokok Pembiayaan</td>
                        <td width="20">:</td>
                        <td>MARIA SDAAS</td>
                    </tr>
                    <tr>
                        <td width="300">Biaya Administrasi</td>
                        <td width="20">:</td>
                        <td>182902944959</td>
                    </tr>
                    <tr>
                        <td width="300">Biaya Asuransi</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300">Biaa Tabungan dan Materai</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300">Biaya Mutasi dan Lainnya</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300">Nominal Take Over</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300">Penerimaan Bersih</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300"></td>
                        <td width="20"></td>
                        <td><b><i>(Dua Puluh Dua Juta Sembilan Puluh Enam Ribu)</i></b></td>
                    </tr>
                    <tr>
                        <td width="300">Margin</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300">Jangka Waktu Pembiayaan</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300">Total Angsuran</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                </table>
                <br>
                <table width=100%>
                    <tr>
                        <td>
                            Menyatakan telah menerima fasilitas Pembiayaan BPRS HIK MCI YOGYAKARTA sebesar tersebut di atas melalui BANK Transfer ke rekening Debitur.
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="100">Dibuat di</td>
                        <td width="20">:</td>
                        <td>NGAWI</td>
                    </tr>
                    <tr>
                        <td width="100">Tanggal</td>
                        <td width="20">:</td>
                        <td>30-08-2021</td>
                    </tr>
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td>Diterima oleh,
                            <br><br><br><br><br><br>
                            <u><b>MARIA AREL</b></u>
                            <br>
                            Debitur
                        </td>
                    </tr>
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td width="30%">Diproses Oleh,
                            <br><br><br><br><br><br>
                            <hr size="2">
                            Marketing  
                        </td>
                        <td width="10%"></td>
                        <td width="30%">Diperiksa Oleh,
                            <br><br><br><br><br><br><br>
                        </td>
                        <td width="30%">Diotoritasi Oleh,
                            <br><br><br><br><br><br><br>
                        </td>
                    </tr>
                </table>
            </center>
            </div>
            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width="100%">
                    <tr class="text2">
                        <td><img src="' . public_path('assets/images/pdf/logoMCI.png') . '" width="30%" ></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td>
                        <center>
                            <font size="4"><b>BUKTI PENCAIRAN PEMBAYARAN</b></font><br>
                        </center>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align: right;"><b>BPRS</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="300">Nama</td>
                        <td width="20">:</td>
                        <td>MARIA SDAAS</td>
                    </tr>
                    <tr>
                        <td width="300">No. Pensiun</td>
                        <td width="20">:</td>
                        <td>182902944959</td>
                    </tr>
                    <tr>
                        <td width="300">Kantor Bayar Pensiun</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td>
                            <b><u>RINCIAN PENERIMAAN PEMBAYARAN</u></b>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="300">Pokok Pembiayaan</td>
                        <td width="20">:</td>
                        <td>MARIA SDAAS</td>
                    </tr>
                    <tr>
                        <td width="300">Biaya Administrasi</td>
                        <td width="20">:</td>
                        <td>182902944959</td>
                    </tr>
                    <tr>
                        <td width="300">Biaya Asuransi</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300">Biaa Tabungan dan Materai</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300">Biaya Mutasi dan Lainnya</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300">Nominal Take Over</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300">Penerimaan Bersih</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300"></td>
                        <td width="20"></td>
                        <td><b><i>(Dua Puluh Dua Juta Sembilan Puluh Enam Ribu)</i></b></td>
                    </tr>
                    <tr>
                        <td width="300">Margin</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300">Jangka Waktu Pembiayaan</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300">Total Angsuran</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                </table>
                <br>
                <table width=100%>
                    <tr>
                        <td>
                            Menyatakan telah menerima fasilitas Pembiayaan BPRS HIK MCI YOGYAKARTA sebesar tersebut di atas melalui BANK Transfer ke rekening Debitur.
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="100">Dibuat di</td>
                        <td width="20">:</td>
                        <td>NGAWI</td>
                    </tr>
                    <tr>
                        <td width="100">Tanggal</td>
                        <td width="20">:</td>
                        <td>30-08-2021</td>
                    </tr>
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td>Diterima oleh,
                            <br><br><br><br><br><br>
                            <u><b>MARIA AREL</b></u>
                            <br>
                            Debitur
                        </td>
                    </tr>
                </table>
                <br>
                <table width="100%">
                    <tr>
                        <td width="30%">Diproses Oleh,
                            <br><br><br><br><br><br>
                            <hr size="2">
                            Marketing  
                        </td>
                        <td width="10%"></td>
                        <td width="30%">Diperiksa Oleh,
                            <br><br><br><br><br><br><br>
                        </td>
                        <td width="30%">Diotoritasi Oleh,
                            <br><br><br><br><br><br><br>
                        </td>
                    </tr>
                </table>
            </center>
            </div>
            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width="100%">
                    <tr>
                        <td>
                        <center>
                            <font size="4"><b>BUKTI PENCAIRAN PEMBAYARAN</b></font><br>
                        </center>
                        </td>
                    </tr>
                </table>
                <br><br><br>
                <table width="100%">
                    <tr>
                        <td>
                            Yang bertanda tangan dibawah ini,
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="300">Nama</td>
                        <td width="20">:</td>
                        <td>MARIA SDAAS</td>
                    </tr>
                    <tr>
                        <td width="300">Nopen</td>
                        <td width="20">:</td>
                        <td>182902944959</td>
                    </tr>
                    <tr>
                        <td width="300">No. KTP</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                    <tr>
                        <td width="300">Alamat</td>
                        <td width="20">:</td>
                        <td>BPRS MCI</td>
                    </tr>
                </table>
                <br>
                <table width=100%>
                    <tr>
                        <td>
                            Sehubungan saya memerlukan dana yang cukup besar, dengan ini saya menyatakan :
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="20">1.</td>
                        <td>Bersedia membayar angsuran pembiayaan BANK diatas 70% gaji pensiun yang saya terima setiap bulan, karena: </td>
                    </tr>
                </table>
                <table width="100%" style="margin-left: 30px;">
                    <tr>
                        <td width="20">a.</td>
                        <td>Saya memiliki penghasilan tetap dari usaha diluar gaji pensiun.*) </td>
                    </tr>
                    <tr>
                        <td width="20">b.</td>
                        <td>Saya mendapat tunjangan dari keluarga (anak-anak) setiap bulan yang jumlahnya dapat menutupi kekurangan
                            jika sisa gaji pensiun tidak mencukupi untuk kebutuhan sehari-hari.*)</td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="20">2.</td>
                        <td>Saya bertanggungjawab atas pengambilan sisa gaji saya setiap bulannya di Kantor Bayar Gaji yang ditunjuk oleh BPRS MCI
                            YOGYAKARTA.</td>
                    </tr>
                </table>
                <br>
                <table width=100%>
                    <tr>
                        <td>
                            Demikian surat pemyataan ini dibuat dengan sebenarnya dengan dilandasi itikad baik tanpa paksaan dari siapapun dan pihak manapun.
                        </td>
                    </tr>
                </table>
                <br><br>
                <table width="100%">
                    <tr>
                        <td>NGAWI, 27-08-2021
                            <br><br><br><br><br><br>
                            <u><b>MARIA AREL</b></u>
                            <br>
                        Yang membuat pernyataan
                        </td>
                    </tr>
                </table>
                <br>
            </center>
            </div>
            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width="100%">
                    <tr class="text2">
                        <td><img src="' . public_path('assets/images/pdf/logoMCI.png') . '" width="30%" ></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align: right;"><b>CENTRAL GLOBAL SOLUTION</b></td>
                    </tr>
                </table>
            </center>
                <table border="2" style="margin-left: 5%;" width="50%">
                    <tr>
                        <td width="180" style="text-align: center;"><b>NGAWI</b></td>
                        <td style="text-align: center;"><b>PLATINUM</b></td>
                    </tr>
                    <tr>
                    <td>Nama Debiutur</td>
                    <td>MARIA</td>
                    </tr>
                    <tr>
                    <td>NO. SK PENSIUN</td>
                    <td>MARIA</td>
                </tr>
                <tr>
                    <td>PEMBIAYAAN</td>
                    <td>MARIA</td>
                </tr>
                <tr>
                    <td>ANGSURAN</td>
                    <td>MARIA</td>
                </tr>
                <tr>
                    <td>JANGKA WAKTU</td>
                    <td>MARIA</td>
                </tr>
                <tr>
                    <td>STATUS PEMBIAYAAN</td>
                    <td>MARIA</td>
                </tr>
                </table>
                <br>
            <center>
                <table width="100%">
                <tr>
                    <td style="text-align: center;">
                        <b>CHECKLIST KELENGKAPAN DOKUMEN<br>
                            PEMBIAYAAN PENSIUNAN</b>
                    </td>
                </tr>
                </table>
                <table border="4" style="border-style: solid;" width="100%">
                    <tr style="text-align: center;">
                    <td width="25"><b>No.</b></td>
                    <td width="300"><b>DOKUMEN PERSYARATAN PEMBIAYAAN</b></td>
                    <td width="100"><b>CHECK <br> MARKETING</b></td>
                    <td width="20"><b>Lbr</b></td>
                    <td width="100"><b>CHECK <br> MITRA PUSAT</b></td>
                    <td width="20"><b>Lbr</b></td>
                    <td width="100"><b>CHECK <BR> BPRS</b></td>
                    <td width="20"><b>Lbr</b></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr style="text-align: center;">
                        <td width="25"><b></b></td>
                        <td width="300"><b></b></td>
                        <td width="50">Asli</td>
                        <td width="50">Fc</td>
                        <td width="20"><b></b></td>
                        <td width="50">Asli</td>
                        <td width="50">Fc</td>
                        <td width="20"><b></b></td>
                        <td width="50">Asli</td>
                        <td width="50">Fc</td>
                        <td width="20"><b></b></td>
                    </tr>
                </table>
                <table border="1" width="100%">
                    <tr >
                        <td width="25">1.</td>
                        <td width="300">KTP Pemohon</td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                    </tr>
                    <tr >
                        <td width="25">2.</td>
                        <td width="300">KTP Suami/Isteri*</td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                    </tr>
                    <tr >
                        <td width="25">3.</td>
                        <td width="300">Kartu Keluarga Pemohon</td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                    </tr>
                    <tr >
                        <td width="25">4.</td>
                        <td width="300">NPWP (untuk pembiayaan > Rp. 50 Jt)</td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                    </tr>
                    <tr >
                        <td width="25">5.</td>
                        <td width="300">KARIP/Buku ASABRI</td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                    </tr>
                    <tr >
                        <td width="25">6.</td>
                        <td width="300">Slip Gaji/Rekening Bank 3 Bln Terakhir</td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                    </tr>
                    <tr >
                        <td width="25">7.</td>
                        <td width="300">Analisa Pembiayaan</td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                    </tr>
                    <tr >
                        <td width="25">8.</td>
                        <td width="300">Formulir Permohonan Pembiayaan Pensiun</td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                    </tr>
                    <tr >
                        <td width="25">9.</td>
                        <td width="300">Surat Keterangan Sisa Uang Pensiun</td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                    </tr>
                    <tr style="vertical-align: top; text-align: left;">
                        <td width="25">10.</td>
                        <td width="300">Surat Keterangan dan Pernyataan Kesehatan dan Domisili Pemohon</td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                    </tr>
                    <tr >
                        <td width="25">11.</td>
                        <td width="300">Surat Keterangan / Pernyataan Lainnya</td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                    </tr>
                    <tr >
                        <td width="25">12.</td>
                        <td width="300">Kwitansi Pembayaran</td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                        <td width="50"></td>
                        <td width="50"></td>
                        <td width="20"></td>
                    </tr>
                </table>
                <br>
                <table width=100%>
                    <tr>
                        <td>
                        Keterangan:
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="50"></td>
                        <td>
                            Isi dengan tanda (v)<br>
                            Coret yang tidak perlu<br>
                            Seluruh dokumen menggunakan kertas A4 70 gram
                        </td>
                    </tr>
                </table>
            </center>
            </div>
            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width="100%">
                    <tr class="text2">
                        <td><img src="' . public_path('assets/images/pdf/logoMCI.png') . '" width="30%" ></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td style="text-align: right;"><b>BPRS MCI YOGYAKARTA</b></td>
                    </tr>
                </table>
            </center>
                <table border="2" style="margin-left: 5%;" width="50%">
                    <tr>
                        <td width="180" style="text-align: center;"><b>NGAWI</b></td>
                        <td style="text-align: center;"><b>PLATINUM</b></td>
                    </tr>
                    <tr>
                    <td>Nama Debiutur</td>
                    <td>MARIA</td>
                    </tr>
                    <tr>
                    <td>NO. SK PENSIUN</td>
                    <td>MARIA</td>
                </tr>
                <tr>
                    <td>PEMBIAYAAN</td>
                    <td>MARIA</td>
                </tr>
                <tr>
                    <td>ANGSURAN</td>
                    <td>MARIA</td>
                </tr>
                <tr>
                    <td>JANGKA WAKTU</td>
                    <td>MARIA</td>
                </tr>
                <tr>
                    <td>STATUS PEMBIAYAAN</td>
                    <td>MARIA</td>
                </tr>
                </table>
                <br>
            <center>
                <table width="100%">
                <tr>
                    <td style="text-align: center;">
                        <b>CHECKLIST KELENGKAPAN DOKUMEN<br>
                            PEMBIAYAAN PENSIUNAN</b>
                    </td>
                </tr>
                </table>
                <table border="4" style="border-style: solid;" width="100%">
                    <tr style="text-align: center;">
                    <td width="25" style="text-align: center;" ><b>No.</b></td>
                    <td width="300" style="text-align: center;"><b>DISKRIPSI DOKUMEN</b></td>
                    <td width="50" style="text-align: center;"><b>Asli/copy</b></td>
                    <td width="350" style="text-align: center;"><b>CHECKLIST</b></td>
                    </tr>
                </table>
                <table border="4" style="border-style: solid;" width="100%">
                <tr style="text-align: center;">
                    <td width="25"><b></b></td>
                    <td width="300"><b></b></td>
                    <td width="60"><b></b></td>
                    <td width="110" style="text-align: center;"><b>MARKETING</b></td>
                    <td width="110" style="text-align: center;"><b>MITRA PUSAT</b></td>
                    <td width="115" style="text-align: center;"><b>BPRS</b></td>
                </tr>
            </table>
            <table border="4" style="border-style: solid;" width="100%">
                <tr>
                <td width="25">1.</td>
                <td width="300">SURAT KEPUTUSAN PENSIUN</td>
                <td width="60" style="text-align: center;">asli</td>
                <td width="110"></td>
                <td width="110"></td>
                <td width="115"></td>
                </tr>
                <tr>
                <td width="25">2.</td>
                <td width="300">AKAD MURABAHAH</td>
                <td width="60" style="text-align: center;">asli</td>
                <td width="110"></td>
                <td width="110"></td>
                <td width="115"></td>
                </tr>
                <tr>
                <td width="25">3.</td>
                <td width="300">AKAD WAKALAH</td>
                <td width="60" style="text-align: center;">asli</td>
                <td width="110"></td>
                <td width="110"></td>
                <td width="115"></td>
                </tr>
                <tr>
                <td width="25">4.</td>
                <td width="300">SURAT PERMOHONAN REALISASI PIUTANG MURABAHAH</td>
                <td width="60" style="text-align: center;">asli</td>
                <td width="110"></td>
                <td width="110"></td>
                <td width="115"></td>
                </tr>
                <tr>
                <td width="25">5.</td>
                <td width="300">DATA PEMBELIAN BARANG</td>
                <td width="60" style="text-align: center;">asli</td>
                <td width="110"></td>
                <td width="110"></td>
                <td width="115"></td>
                </tr>
                <tr>
                <td width="25">6.</td>
                <td width="300">JADWAL ANGSURAN (REPAYMENT SCHEDULE)</td>
                <td width="60" style="text-align: center;">asli</td>
                <td width="110"></td>
                <td width="110"></td>
                <td width="115"></td>
                </tr>
                <tr>
                <td width="25">7.</td>
                <td width="300">BUKTI PENCAIRAN PEMBIAYAAN</td>
                <td width="60" style="text-align: center;">asli</td>
                <td width="110"></td>
                <td width="110"></td>
                <td width="115"></td>
                </tr>
                <tr>
                <td width="25">8.</td>
                <td width="300">TANDA TERIMA PENYERAHAN JAMINAN</td>
                <td width="60" style="text-align: center;">asli</td>
                <td width="110"></td>
                <td width="110"></td>
                <td width="115"></td>
                </tr>
                <tr>
                <td width="25">9.</td>
                <td width="300">SURAT PERNYATAAN PEMOTONG GAJI > 70%</td>
                <td width="60" style="text-align: center;">asli</td>
                <td width="110"></td>
                <td width="110"></td>
                <td width="115"></td>
                </tr>
            </table>
            </center>
            </div>



            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width="100%">
                    <tr>
                        <td class="text3">
                        <b>Dokumen Checklist</b>
                        </td>
                    </tr>
                </table>
                <br><br>
                <table border="1" width="100%"> 
                    <tr>
                    <td colspan="6" style="text-align: center;">SEKAT 1</td>
                    </tr>
                    <tr>
                    <td style="text-align: center;" width="30">No.</td>
                    <td style="text-align: center;" width="300">DESKRIPSI DOKUMEN</td>
                    <td style="text-align: center;" width="60">Asli/copy</td>
                    <td style="text-align: center;" width="200" colspan="3">CHECKLIST</td>
                    </tr>
                    <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td style="text-align: center;">MARKETING</td>
                    <td style="text-align: center;">MITRA PUSAT</td>
                    <td style="text-align: center;" width="100">BPRS</td>
                    </tr>
                    <tr>
                    <td>1.</td>
                    <td>KTP PEMOHON</td>
                    <td style="text-align: center;">copy</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
                    <td>2.</td>
                    <td>KTP SUAMI/ISTERI*</td>
                    <td style="text-align: center;">copy</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td>3.</td>
                    <td>KARTU KELUARGA PEMOHON</td>
                    <td style="text-align: center;">copy</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
                    <td>4.</td>
                    <td>NPWP</td>
                    <td style="text-align: center;">copy</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
                    <td>5.</td>
                    <td>KARIP / BUKU ASABRI</td>
                    <td style="text-align: center;">copy</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
                    <td>6.</td>
                    <td>SLIP GAJI / REKENING BANK 3 BLN TERAKHIR</td>
                    <td style="text-align: center;">Asli</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                </table>
                <br>
                <br>
                <table border="1" width="100%"> 
                    <tr>
                    <td colspan="6" style="text-align: center;">SEKAT 2</td>
                    </tr>
                    <tr>
                    <td style="text-align: center;" width="30">No.</td>
                    <td style="text-align: center;" width="300">DESKRIPSI DOKUMEN</td>
                    <td style="text-align: center;" width="60">Asli/copy</td>
                    <td style="text-align: center;" width="200" colspan="3">CHECKLIST</td>
                    </tr>
                    <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td style="text-align: center;">MARKETING</td>
                    <td style="text-align: center;">MITRA PUSAT</td>
                    <td style="text-align: center;" width="100">BPRS</td>
                    </tr>
                    <tr>
                    <td>1.</td>
                    <td>ANALISA PEMBIAYAAN</td>
                    <td style="text-align: center;">Asli</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
                    <td>2.</td>
                    <td>FORM PERMOHONAN PEMBIAYAAN PENSIUN</td>
                    <td style="text-align: center;">Asli</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>

                    <tr>
                    <td>3.</td>
                    <td>SURAT KETERANGAN SISA UANG PENSIUN</td>
                    <td style="text-align: center;">Asli</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
                    <td>4.</td>
                    <td>SURAT PERNYATAAN DAN KETERANGAN KESEHATAN DAN DOMISILI PEMOHON</td>
                    <td style="text-align: center;">Asli</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
                    <td>5.</td>
                    <td>SURAT KETERANGAN / PERNYATAAN LAINNYA</td>
                    <td style="text-align: center;">Asli</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                    <tr>
                    <td>6.</td>
                    <td>KWITANSI PEMBAYARAN </td>
                    <td style="text-align: center;">Asli</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>
                </table>
                <br><br>
                <table width="100%">
                    <tr>
                    <td width="40%">
                        Telah diperiksa Lengkap/ Tidak*<br>
                    Yang menyerahkan,
                    <br><br><br><br><br><br><br><br><br>
                    <hr><br>
                    PETUGAS PELAYANAN MITRA BPRS
                    </td>
                    <td width="20%"></td>
                    <td width="40%">
                        Telah diperiksa Lengkap/ Tidak*<br>
                    Yang menerima dan mmeriksa
                    <br><br><br><br><br><br><br><br><br>
                    <hr><br>
                    ADM FILLING 
                    </td>
                    </tr>
                </table>
            </center>
            </div>

            <div style="page-break-after: always;"></div>
            <div class="section1">
            <center>
                <table width="100%">
                <tr>
                    <td width="100">No.</td>
                    <td width="20">:</td>
                    <td width="200">&nbsp<hr></td>
                    <td></td>
                </tr>
                <tr>
                    <td width="100">Perihal</td>
                    <td width="20">:</td>
                    <td width="200"><b>Permohonan Pencairan
                    </b></td>
                    <td></td>
                </tr>
                </table>
                <br>
                <table width="100%">
                <tr>
                    <td>
                        Kepada Yth <br>
                        <b>Direktur utama<br>
                        PT BANK Syariah MCI Yogyakarta<br>
                        Bapak Indra Wicaksono</b><br>
                        Di tempat
                    </td>
                </tr>
                </table>
                <br>
                <br>
                <table width="100%">
                <tr>
                    <td><i>Assalamu&#39;alaikum Wr. Wb</i><br>
                        Dengan Hormat,</td>
                </tr>
                <tr>
                    <td style="text-align: justify;">
                        Bersama surat ini kami ajukan permohonan pencairan dan pemindahbukuan atas pengajuan yang sudah disetujui oleh komite Bank, dengan data sebagai berikut,
                    </td>
                </tr>
                <table width="100%" style="margin-left: 50px;">
                    <tr>
                        <td width="20">1.</td>
                        <td width="200">Nama Debitur</td>
                        <td>:</td>
                        <td>MARIA ARELAN</td>
                    </tr>
                    <tr>
                        <td width="20">2.</td>
                        <td width="200">Plafon pembiayaan</td>
                        <td>:</td>
                        <td>MARIA ARELAN</td>
                    </tr>
                    <tr>
                        <td width="20">3.</td>
                        <td width="200">No. Rek. Debitur</td>
                        <td>:</td>
                        <td>MARIA ARELAN</td>
                    </tr>
                    <tr>
                        <td width="20">4.</td>
                        <td width="200">Nama Bank</td>
                        <td>:</td>
                        <td>BSI</td>
                    </tr>
                </table>
                </table>
                <table width="100%">
                <tr>
                    <td style="text-align: justify;">
                        Demikian disampaikan dan atas perhatian serta kerjasamanya kamu ucapkan terima kasih<br>
                        <i>Wassalamu&#39;alaikum Wr. Wb.</i>
                    </td>
                </tr>
                </table>
                <br><br>
                <table width="100%">
                <tr>
                    <td><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>, 
                        30-08-2021<br>
                        CENTRAL GLOBAL SOLUTION<br>
                        <br><br><br><br><br><br><br>
                        <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><br>
                        Direktur Utama</td>
    
                </tr>
                </table>
            </center>
            </div>

                
        
            
        </body>

        </html>
        ');
        // $paper_orientation = 'landscape';
        // $customPaper = array(0, 0, 950, 950);
        // Setting ukuran dan orientasi kertas
        $dom->setPaper('A4', 'potrait');
        $dom->save($my_pdf_path_for_example);
    }

    public function acc($id)
    {
        $date = Carbon::now()->locale('id');
        $data = NewCustomer::where('id', $id)->first();
        $data->tanggal_keputusan = $date->toDateTimeString();
        $data->keputusan_bank = 1;
        $data->save();
        return redirect()->back();
    }

    public function cancel($id)
    {
        $date = Carbon::now()->locale('id');
        $data = NewCustomer::where('id', $id)->first();
        $data->tanggal_keputusan = $date->toDateTimeString();
        $data->keputusan_bank = 2;
        $data->save();
        return redirect()->back();
    }
}

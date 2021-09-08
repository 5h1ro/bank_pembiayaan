<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\NewCustomer;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ExportController extends Controller
{
    function index($id)
    {
        $customer_data = $this->get_customer_data($id);
        dd($customer_data);
        return view('admin.export')->with('customer_data', $customer_data);
    }
    function get_customer_data($id)
    {
        $customer_data = NewCustomer::where('id', $id)->first();
        return $customer_data;
    }

    function pdf($id)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html($id));
        return $pdf->stream();
    }
    function convert_customer_data_to_html($id)
    {
        $customer_data = $this->get_customer_data($id);
        $date = Carbon::now()->locale('id');
        //Get date and time
        // $day = Carbon::parse($date)->format('l');
        $output = '
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>

        <body>
            <div style="margin-left: 15pt; margin-right: 15pt;">
                <div>
                    <P style="text-align: center; padding-top: 20pt;">SURAT PERJANJIAN PINJAMAN UANG</P>
                </div>
                <div style="padding-top: 1.5pt;">
                    <p style="text-align: justify; ">Pada hari ini ' . $date->isoFormat('dddd') . ' tanggal ' . $date->isoFormat('DD') . ' bulan ' . $date->isoFormat('MMMM') . ' tahun ' . $date->isoFormat('YYYY') . ', kami yang bertanda tangan di bawah ini: </p>
                    <table>
                        <tr>
                            <td style="width: 10px;">
                                1.
                            </td>
                            <td style="width: 100px;">
                                Nama
                            </td>
                            <td>
                                : ' . $customer_data->name . '
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 10px;">

                            </td>
                            <td style="width: 100px;">
                                Umur
                            </td>
                            <td>
                                : ' . $customer_data->age . ' Tahun
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 10px;">

                            </td>
                            <td style="width: 100px;">
                                Pekerjaan
                            </td>
                            <td>
                                : ' . $customer_data->jobs . '
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 10px;">

                            </td>
                            <td style="width: 100px;">
                                Alamat
                            </td>
                            <td>
                                : ' . $customer_data->address . '
                            </td>
                        </tr>
                    </table>
                </div>
                <div style="padding-top: 1.5pt;">
                    <p style="text-align: justify; ">Bertindak untuk dan atas nama diri sendiri dan untuk selanjutnya disebut PIHAK PERTAMA</p>
                    <table>
                        <tr>
                            <td style="width: 10px;">
                                2.
                            </td>
                            <td style="width: 100px;">
                                Nama
                            </td>
                            <td>
                                : Nurhakiki
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 10px;">

                            </td>
                            <td style="width: 100px;">
                                Umur
                            </td>
                            <td>
                                : 20 Tahun
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 10px;">

                            </td>
                            <td style="width: 100px;">
                                Pekerjaan
                            </td>
                            <td>
                                : Backend Web Developer
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 10px;">

                            </td>
                            <td style="width: 100px;">
                                Alamat
                            </td>
                            <td>
                                : Madiun
                            </td>
                        </tr>
                    </table>
                </div>
                <div style="padding-top: 1.5pt">
                    <p style="text-align: justify; ">Bertindak untuk dan atas nama diri sendiri dan untuk selanjutnya disebut PIHAK KEDUA</p>
                    <table>
                        <tr>
                            <td style="width: 10px; vertical-align: top;">
                                a.
                            </td>
                            <td style="width: 500pt; vertical-align: top;">
                                Dengan ini menyatakan, bahwa PIHAK PERTAMA telah dengan sah dan benar mempunyai utang uang karena peminjaman kepada PIHAK KEDUA, sebesar []
                            </td>
                        </tr>
                    </table>
                    <table style="padding-top: 1pt;">
                        <tr>
                            <td style="width: 10px; vertical-align: top;">
                                b.
                            </td>
                            <td style="width: 500pt; vertical-align: top;">
                                PIHAK PERTAMA mengakui telah menerima jumlah uang tersebut secara lengkap dari PIHAK KEDUA sebelum penandatanganan Surat Perjanjian ini, sehingga Surat Perjanjian ini diakui oleh kedua belah pihak dan berlaku sebagai tanda penerimaan yang sah.
                            </td>
                        </tr>
                    </table>
                    <table style="padding-top: 1pt;">
                        <tr>
                            <td style="width: 10px; vertical-align: top;">
                                c.
                            </td>
                            <td style="width: 500pt; vertical-align: top;">
                                PIHAK KEDUA dengan ini menyatakan telah menerima pengakuan berhutang dari PIHAK PERTAMA tersebut di atas.
                            </td>
                        </tr>
                    </table>
                    <table style="padding-top: 1pt;">
                        <tr>
                            <td style="width: 10px; vertical-align: top;">
                                d.
                            </td>
                            <td style="width: 500pt; vertical-align: top;">
                                Kedua belah pihak telah bersepakat untuk mengadakan serta mengikatkan diri terhadap syarat-syarat serta ketetapan-ketetapan dalam perjanjian ini yang diatur dalam 8 (delapan) pasal
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </body>

        </html>';
        return $output;
    }
}

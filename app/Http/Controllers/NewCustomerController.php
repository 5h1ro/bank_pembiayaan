<?php

namespace App\Http\Controllers;

use App\Models\Archieve;
use App\Models\NewCustomer;
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
        $client = new Client();
        $url = "https://si-bima.com/api/customer";


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());
        $customer = $responseBody->data;
        $customers = [];
        foreach ($customer as $api) {
            if (NewCustomer::where([['nik', '=', $api->nik], ['tanggal_input', '=', $api->tanggal_input]])->exists() || Archieve::where([['nik', '=', $api->nik], ['tanggal_input', '=', $api->tanggal_input]])->exists()) {
            } else {
                array_push($customers, $api);
            }
        }
        $notification = count($customers);
        $newcustomer = NewCustomer::all();
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
        $my_pdf_path_for_example = public_path('pdf/' . $date->format('Y-m-d-His') . '.pdf');
        $data = NewCustomer::where('id', $id)->first();
        $data->url_pdf = $my_pdf_path_for_example;
        $data->save();
        $customer_data = $this->get_customer_data($id);
        PDF::loadHTML('
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
                                : ' . $customer_data->nama . '
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 10px;">

                            </td>
                            <td style="width: 100px;">
                                nik
                            </td>
                            <td>
                                : ' . $customer_data->nik . '
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 10px;">

                            </td>
                            <td style="width: 100px;">
                                telepon
                            </td>
                            <td>
                                : ' . $customer_data->telepon . '
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 10px;">

                            </td>
                            <td style="width: 100px;">
                                Alamat
                            </td>
                            <td>
                                : Jln. ' . $customer_data->alamat_jalan . ', Kec. ' . $customer_data->alamat_kec . ' - ' . $customer_data->alamat_kotakab . '
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

        </html>')->save($my_pdf_path_for_example);
    }

    public function acc($id)
    {
        $date = Carbon::now()->locale('id');
        $data = NewCustomer::where('id', $id)->first();
        $data->tanggal_keputusan = $date->toDateTimeString();
        $data->keputusan = 1;
        $data->save();
        return redirect()->to('user/newcustomer');
    }

    public function cancel($id)
    {
        $date = Carbon::now()->locale('id');
        $data = NewCustomer::where('id', $id)->first();
        $data->tanggal_keputusan = $date->toDateTimeString();
        $data->keputusan = 2;
        $data->save();
        return redirect()->to('user/newcustomer');
    }
}

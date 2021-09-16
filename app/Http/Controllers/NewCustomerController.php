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
        PDF::loadHTML('
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>contoh surat pengunguman</title>
                <style type="text/css">

                    table {
                        border-style: double;
                        border-width: 3px;
                        border-color: white;
                    }
                    table tr .text2 {
                        text-align: right;
                        font-size: 14px;
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

                </style>
            </head>
            <body>
                <center>
                    <table width="625">
                        <tr class="text2">
                            <td><img src="logoAsuransi.jpeg" width="70" ></td>
                            <td width="572"><b>PT. ASURANSI</b></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                            <center>
                                <font size="4"><b>COVER NOTE PA PRIMA SIRAMA</b></font><br>
                                <font size="4"><b>KOPERASI MANDIRI PRIMA</b></font><br>
                                <font size="4"><b>NOMOR :001/PA PRIMA SIRAMA/V/2020/ABB-JKT 1</b></font><br>
                            </center>
                            </td>
                        </tr>
                        <tr>
                            <td><hr width="625"></td>
                        </tr>
                    <table width="625">
                        <tr class="text2" style="text-align: justify;">
                            <td>
                                Kami yang bertandatangan dibawah ini PT. ASURANSI BHAKTI BAHAYANGKARA selanjutnya disebut
                                sebagai Penanggung dengan ini memberikan Jaminan Asuransi PA PRIMA SIRMA kepada tertanggung
                                yang disebut dibawah ini :
                            </td>
                        </tr>
                    </table>
                    </table>

                    <table width="625">
                        <tr class="text2">
                            <td width="200"><b>TYPE OF INSURANCE</b></td>
                            <td>:</td>
                            <td><b> PA PRIMA SIRAMA REGULER + PLATINUM</b></td>
                        </tr>
                        <tr>
                            <td width="200"><b>PEMEGANG POLIS</b></td>
                            <td>:</td>
                            <td><b> KOPERASI MADNIRI PRIMA</b></td>
                        </tr>
                        <tr>
                            <td width="200"><b>TERTANGGUNG</b></td>
                            <td width="2">:</td>
                            <td style="text-align: justify;" &nbsp;>1.' . $customer_data->nama . ' <br> 2.B</td>
                        </tr>
                        <tr>
                            <td width="200"><b>JENIS KREDIT</b></td>
                            <td width="2">:</td>
                            <td><b></b></td>
                        </tr>
                        <tr>
                            <td width="200"><b>JENIS RESIKO DICOVER</b></td>
                            <td width="2">:</td>
                            <td><b></b></td>
                        </tr>
                        <tr>
                            <td width="200"><b>JENIS ASURANSI</b></td>
                            <td width="2">:</td>
                            <td><b></b></td>
                        </tr>
                        <tr>
                            <td width="200"><b>MANFAAT ASURANSI</b></td>
                            <td width="2">:</td>
                            <td><b></b></td>
                        </tr>
                        <tr>
                            <td width="200"><b>MASA ASURANSI</b></td>
                            <td width="2">:</td>
                            <td><b></b></td>
                        </tr>
                        <tr>
                            <td width="200"><b>UANG PERTANGGUNGAN</b></td>
                            <td width="2">:</td>
                            <td><b></b></td>
                        </tr>
                        <tr>
                            <td width="200"><b>SECURITY</b></td>
                            <td width="2">:</td>
                            <td><b></b></td>
                        </tr>
                    </table>
                    <br>

                    <table width="625">
                        <tr>
                        <td style="text-align:justify ;">
                            <font size="2"> Pertanggungan ini berlakusesuai dengan syarat dan ketentuan yang tercantum dalam Polis
                                Asuransi PA PRIMA SIRAMA. Cover Note ini merupakan satu kesatuan yang tidak dapat dipisahkan dengan
                                Polis Asuransi PA PRIMA SIRAMA.
                            </font>
                        </td>
                        </tr>
                    </table>
                    <table width="625">
                        <tr>
                        <td>
                            <font size="2"> Cover Note ini berlaku sementara sampai dengan Polis Asli diterbitkan.
                            </font>
                        </td>
                        </tr>
                    </table>
                    <br>
                    <table width="625">
                        <tr class="">
                            <td width="250"><br><br><br><br></td>
                            <td>Jakarta, Mei 11 2020<br>
                                Signed for and on behalf of <br>
                                <b>PT. ASURANSI BHAKTI BAHAYANGKARA</b>
                            </td>
                        </tr>
                    </table>
                </center>
            </body>
        </html>')->save($my_pdf_path_for_example);
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

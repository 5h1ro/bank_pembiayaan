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
                table {
                    border-style: double;
                    border-width: 3px;
                    border-color: white;
                }

                table tr .text2 {
                    text-align: right;
                    font-size: 10spx;
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
                            <td><img src="logoMCI.png" width="30%"></td>
                        </tr>
                    </table>
                    <table>
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
            <div class="page-break"></div>
            <div>
                <center>
                    <table width="90%">
                        <tr class="text2">
                            <td><img src="logoMCI.png" width="30%"></td>
                        </tr>
                    </table>
                    <table>
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
        </body>

        </html>');
        // $paper_orientation = 'landscape';
        // $customPaper = array(0, 0, 950, 950);
        // $dom->setPaper($customPaper, $paper_orientation);
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

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
        $pdf = PDF::loadView('suratpdf.surat-asuransi', $data)->save($my_pdf_path_for_example);
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

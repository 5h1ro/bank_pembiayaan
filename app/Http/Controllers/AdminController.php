<?php

namespace App\Http\Controllers;

use App\Models\Archieve;
use App\Models\NewCustomer;
use App\Models\NewData;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $customers = NewData::all();
        foreach ($customers as $data) {
            $data->tanggal_input = Carbon::parse($data->tanggal_input)->format('d-m-Y H:i:s');
        };

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

        $notification = count($customers);
        return view('admin.index', compact('customers', 'notification'));
    }


    public function create($id)
    {
        $client = new Client();
        $url = "https://si-bima.com/api/customer";


        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());
        $customer = $responseBody->data;

        $date = Carbon::now()->locale('id');
        foreach ($customer as $api) {
            if ($api->id == $id) {
                $newcustomer = new NewCustomer;
                $newcustomer->tanggal_input = $api->tanggal_input;
                $newcustomer->nik = $api->nik;
                $newcustomer->nopen = $api->nopen;
                $newcustomer->nama = $api->nama;
                $newcustomer->alamat_jalan = $api->alamat_jalan;
                $newcustomer->alamat_kec = $api->alamat_kec;
                $newcustomer->alamat_kotakab = $api->alamat_kotakab;
                $newcustomer->alamat_propinsi = $api->alamat_propinsi;
                $newcustomer->telepon = $api->telepon;
                $newcustomer->pembiayaan = $api->pembiayaan;
                $newcustomer->tenor = $api->tenor;
                $newcustomer->cicilan = $api->cicilan;
                $newcustomer->status = $api->status;
                $newcustomer->url_ktp = $api->url_ktp;
                $newcustomer->url_kk = $api->url_kk;
                $newcustomer->url_karip = $api->url_karip;
                $newcustomer->url_sk_pensiun = $api->url_sk_pensiun;
                $newcustomer->url_video_interview = $api->url_video_interview;
                $newcustomer->url_video_kesehatan = $api->url_video_kesehatan;
                $newcustomer->save();
                return redirect()->to('admin/newcustomer');
            } else {
            }
        }
    }

    public function detail($id)
    {
        $customers = NewData::all();
        foreach ($customers as $data) {
            $data->tanggal_input = Carbon::parse($data->tanggal_input)->format('d-m-Y H:i:s');
        };

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

        $notification = count($customers);

        $data = NewCustomer::where('id', $id)->first();
        $data->tanggal_input = Carbon::parse($data->tanggal_input)->format('d-m-Y H:i:s');
        $data->tanggal_keputusan = Carbon::parse($data->tanggal_keputusan)->format('d-m-Y H:i:s');
        return view('admin.detaildata', compact('data', 'notification'));
    }
}

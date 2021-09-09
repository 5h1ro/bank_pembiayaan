<?php

namespace App\Http\Controllers;

use App\Models\Archieve;
use App\Models\NewCustomer;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ArchieveController extends Controller
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
            if (NewCustomer::where([['nik', '=', $api->nik], ['tanggal_input', '=', $api->tanggal_input]])->exists()) {
            } else {
                array_push($customers, $api);
            }
        }
        $notification = count($customers);
        $archieve = Archieve::all();
        return view('admin.archieve', compact('archieve', 'notification'));
    }

    public function create($id)
    {
        $date = Carbon::now()->locale('id');
        $data = NewCustomer::where('id', $id)->first();
        $newcustomer = new Archieve;
        $newcustomer->tanggal_input = $data->tanggal_input;
        $newcustomer->nik = $data->nik;
        $newcustomer->nopen = $data->nopen;
        $newcustomer->nama = $data->nama;
        $newcustomer->alamat_jalan = $data->alamat_jalan;
        $newcustomer->alamat_kec = $data->alamat_kec;
        $newcustomer->alamat_kotakab = $data->alamat_kotakab;
        $newcustomer->alamat_propinsi = $data->alamat_propinsi;
        $newcustomer->telepon = $data->telepon;
        $newcustomer->pembiayaan = $data->pembiayaan;
        $newcustomer->tenor = $data->tenor;
        $newcustomer->cicilan = $data->cicilan;
        $newcustomer->status = $data->status;
        $newcustomer->url_ktp = $data->url_ktp;
        $newcustomer->url_kk = $data->url_kk;
        $newcustomer->url_karip = $data->url_karip;
        $newcustomer->url_sk_pensiun = $data->url_sk_pensiun;
        $newcustomer->url_video_interview = $data->url_video_interview;
        $newcustomer->url_video_kesehatan = $data->url_video_kesehatan;
        $newcustomer->tanggal_keputusan = $data->tanggal_keputusan;
        $newcustomer->keputusan = $data->keputusan;
        $newcustomer->tanggal_archieve = $date->toDateTimeString();
        $newcustomer->save();

        $delete = NewCustomer::where('id', $id)->delete();
        return redirect()->to('admin/archieve');
    }
}

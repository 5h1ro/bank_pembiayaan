<?php

namespace App\Http\Controllers;

use App\Models\Archieve;
use App\Models\NewCustomer;
use App\Models\NewData;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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


    public function create($nik)
    {
        $response = Http::withBasicAuth('mci_server', 'mc1_s3rv3r')->post('http://103.121.122.213:80/get_data_customer', [
            "nik" => $nik
        ]);
        // $client = new Client();
        // $url = "http://103.121.122.213:3000/get_data_customer";
        // $response = $client->post($url, [
        //     'auth' => [
        //         'mci_server',
        //         'mc1_s3rv3r'
        //     ],
        //     'json' => [
        //         "nik" => $nik
        //     ],
        // ]);
        $responseBody = json_decode($response->getBody());
        $customer = $responseBody->data;

        $date = Carbon::now()->locale('id');
        $newcustomer = new NewCustomer;
        $newcustomer->tanggal_input = $date;
        $newcustomer->nik = $customer->nik;
        $newcustomer->nopen = $customer->nopen;
        $newcustomer->nama = $customer->nama;
        $newcustomer->tanggal_lahir = $customer->tanggal_lahir;
        $newcustomer->alamat_jalan = $customer->alamat_jalan;
        $newcustomer->alamat_kec = $customer->alamat_kec;
        $newcustomer->alamat_kotakab = $customer->alamat_kotakab;
        $newcustomer->alamat_propinsi = $customer->alamat_propinsi;
        $newcustomer->telepon = $customer->telepon;
        $newcustomer->pembiayaan = $customer->pembiayaan;
        $newcustomer->tenor = $customer->tenor;
        $newcustomer->cicilan = $customer->cicilan;
        $newcustomer->gaji_pokok = $customer->gaji_pokok;
        $newcustomer->status = $customer->status;
        $newcustomer->url_ktp = $customer->url_ktp;
        $newcustomer->url_kk = $customer->url_kk;
        $newcustomer->url_karip = $customer->url_karip;
        $newcustomer->url_sk_pensiun = $customer->url_sk_pensiun;
        $newcustomer->url_video_interview = $customer->url_video_interview;
        $newcustomer->url_video_kesehatan = $customer->url_video_kesehatan;
        $newcustomer->save();
        $newdata = NewData::where('nik', $nik)->first();
        $newdata->delete();
        return redirect()->to('admin/newcustomer');
        // foreach ($customer as $api) {
        //     if ($api->id == $id) {
        //         $newcustomer = new NewCustomer;
        //         $newcustomer->tanggal_input = $api->tanggal_input;
        //         $newcustomer->nik = $api->nik;
        //         $newcustomer->nopen = $api->nopen;
        //         $newcustomer->nama = $api->nama;
        //         $newcustomer->alamat_jalan = $api->alamat_jalan;
        //         $newcustomer->alamat_kec = $api->alamat_kec;
        //         $newcustomer->alamat_kotakab = $api->alamat_kotakab;
        //         $newcustomer->alamat_propinsi = $api->alamat_propinsi;
        //         $newcustomer->telepon = $api->telepon;
        //         $newcustomer->pembiayaan = $api->pembiayaan;
        //         $newcustomer->tenor = $api->tenor;
        //         $newcustomer->cicilan = $api->cicilan;
        //         $newcustomer->status = $api->status;
        //         $newcustomer->url_ktp = $api->url_ktp;
        //         $newcustomer->url_kk = $api->url_kk;
        //         $newcustomer->url_karip = $api->url_karip;
        //         $newcustomer->url_sk_pensiun = $api->url_sk_pensiun;
        //         $newcustomer->url_video_interview = $api->url_video_interview;
        //         $newcustomer->url_video_kesehatan = $api->url_video_kesehatan;
        //         $newcustomer->save();
        //         return redirect()->to('admin/newcustomer');
        //     } else {
        //     }
        // }
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
        Carbon::setLocale('id');
        $data = NewCustomer::where('id', $id)->first();
        $data->tanggal_input = Carbon::parse($data->tanggal_input)->format('d-m-Y H:i:s');
        $data->tanggal_keputusan = Carbon::parse($data->tanggal_keputusan)->format('d-m-Y H:i:s');
        $data->tanggal_lahir = Carbon::parse($data->tanggal_lahir)->isoFormat('d MMMM Y');
        return view('admin.detaildata', compact('data', 'notification'));
    }

    public function user()
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
        $user = User::all();
        return view('admin.user', compact('customers', 'notification', 'user'));
    }

    public function delete($id)
    {
        $user = User::where('id', $id);
        $user->delete();
        return redirect()->back();
    }
    public function add(Request $request)
    {
        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect()->back();
    }
    public function edit($id, Request $request)
    {
        $user = User::where('id', $id)->first();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect()->back();
    }
}

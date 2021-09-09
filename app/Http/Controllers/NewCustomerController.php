<?php

namespace App\Http\Controllers;

use App\Models\NewCustomer;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

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
            if (NewCustomer::where([['nik', '=', $api->nik], ['tanggal_input', '=', $api->tanggal_input]])->exists()) {
            } else {
                array_push($customers, $api);
            }
        }
        $notification = count($customers);
        $newcustomer = NewCustomer::all();
        return view('admin.newcustomer', compact('newcustomer', 'notification'));
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

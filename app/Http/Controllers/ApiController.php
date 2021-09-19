<?php

namespace App\Http\Controllers;

use App\Models\Archieve;
use App\Models\NewCustomer;
use App\Models\NewData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        $archieve = Archieve::where('nik', $request->nik)->first();
        if ($archieve->isEmpty()) {
            return Response::json(array(
                'success'   => 1,
                'message'   => 'Data Tidak Ada',
                'data'      => json_decode($archieve)
            ));
        } else {
            return Response::json(array(
                'success'   => 0,
                'message'   => 'Data Tidak Ada'
            ), 404);
        }
    }

    public function newcustomer(Request $request)
    {
        $newcustomer = NewCustomer::where('nik', $request->nik)->first();
        if ($newcustomer) {
            return Response::json(array(
                'success'   => 1,
                'message'   => 'Data Tersedia',
                'data'      => json_decode($newcustomer)
            ));
        } else {
            return Response::json(array(
                'success'   => 0,
                'message'   => 'Data Tidak Ada'
            ), 404);
        }
    }


    public function store(Request $request)
    {
        $date = Carbon::now()->locale('id');
        $newcustomer = new NewData;
        $newcustomer->tanggal_input = $date->toDateTimeString();
        $newcustomer->nik = $request->nik;
        $newcustomer->nama = $request->nama;
        $newcustomer->save();
        return Response::json(array(
            'success'   => 1,
            'message'   => 'Data berhasil di push'
        ));
    }
}

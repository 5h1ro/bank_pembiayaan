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
    public function index()
    {
        $archieve = Archieve::all();
        if ($archieve->isEmpty()) {
            return Response::json(array(
                'success'   => true,
                'message'   => '',
                'data'      => []
            ), 404);
        } else {
            return Response::json(array(
                'success'   => true,
                'message'   => '',
                'data'      => json_decode($archieve)
            ));
        }
    }

    public function newcustomer()
    {
        $newcustomer = NewCustomer::where('keputusan', '!=', 0)->get();
        if ($newcustomer->isEmpty()) {
            return Response::json(array(
                'success'   => true,
                'message'   => '',
                'data'      => []
            ), 404);
        } else {
            return Response::json(array(
                'success'   => true,
                'message'   => '',
                'data'      => json_decode($newcustomer)
            ));
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

<?php

namespace App\Http\Controllers;

use App\Models\Archieve;
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
}

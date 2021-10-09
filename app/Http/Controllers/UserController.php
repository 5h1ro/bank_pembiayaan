<?php

namespace App\Http\Controllers;

use App\Models\Archieve;
use App\Models\NewCustomer;
use App\Models\NewData;
use App\Models\NewStudents;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $student = NewStudents::where('id_user', $user->id)->first();
        $notification = 0;
        return view('admin.index', compact('user', 'notification', 'student'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\NewStudents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $student = NewStudents::all();
        foreach ($student as $data) {
            if ($data->status == 0) {
                $data->status = "Diproses";
            } elseif ($data->status == 1) {
                $data->status = "Diterima";
            } elseif ($data->status == 2) {
                $data->status = "Cadangan";
            } else {
                $data->status = "Tidak Diterima";
            }
        };

        $notification = 0;
        return view('admin.index', compact('user', 'student', 'notification'));
    }


    public function detail($id)
    {
        $notification = 0;
        $data = NewStudents::where('id', $id)->first();
        $data->birthday = Carbon::parse($data->birthday)->locale('id')->isoFormat('d MMMM Y');
        return view('admin.detaildata', compact('data', 'notification'));
    }

    public function user()
    {
        $notification = 0;
        $user = User::all();
        return view('admin.user', compact('notification', 'user'));
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

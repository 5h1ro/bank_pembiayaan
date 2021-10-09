<?php

namespace App\Http\Controllers;

use App\Models\Archieve;
use App\Models\NewData;
use App\Models\NewStudents;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewStudentController extends Controller
{

    function add(Request $request)
    {
        $user = Auth::user();
        $namaFoto = 'foto_' . time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('img'), $namaFoto);
        $namaIjazah = 'ijazah_' . time() . '.' . $request->ijazah->extension();
        $request->ijazah->move(public_path('img'), $namaIjazah);
        $namaKk = 'kk_' . time() . '.' . $request->kk->extension();
        $request->kk->move(public_path('img'), $namaKk);
        $student = new NewStudents;
        $student->name = $request->name;
        $student->birthplace = $request->birthplace;
        $student->birthday = $request->birthday;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->school = $request->school;
        $student->un = $request->un;
        $student->indo = $request->indo;
        $student->mtk = $request->mtk;
        $student->bing = $request->bing;
        $student->ipa = $request->ipa;
        $student->url_foto = 'http://127.0.0.1:8000/img/' . $namaFoto;
        $student->url_ijazah = 'http://127.0.0.1:8000/img/' . $namaIjazah;
        $student->url_kk = 'http://127.0.0.1:8000/img/' . $namaKk;
        $student->id_user = $user->id;
        $student->save();
        return redirect(route('user'));
    }

    function pdf($id)
    {
        $date = Carbon::now()->locale('id');
        $student = NewStudents::where('id_user', $id)->first();
        $student->birthday = Carbon::parse($student->birthday)->locale('id')->isoFormat('d MMMM Y');
        $date = Carbon::parse($date)->isoFormat('d MMMM Y');
        $pdf = PDF::loadview('pdf', compact('student', 'date'));
        return $pdf->download('Bukti Pendaftaran ' . $student->name);
    }


    public function acc($id)
    {
        $data = NewStudents::where('id', $id)->first();
        $data->status = 1;
        $data->save();
        return redirect()->back();
    }

    public function cadangan($id)
    {
        $data = NewStudents::where('id', $id)->first();
        $data->status = 2;
        $data->save();
        return redirect()->back();
    }

    public function cancel($id)
    {
        $data = NewStudents::where('id', $id)->first();
        $data->status = 3;
        $data->save();
        return redirect()->back();
    }
}

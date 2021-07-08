<?php

namespace App\Exports;


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
/*class UsersExport implements FromCollection
{
    
    public function collection()
    {
        return User::all();
    }
}*/


class UsersExport implements FromView
{
    public function view(): View
    {
        $id=Auth::user()->laboratory_id;
        $users=DB::table('users')->where('laboratory_id',$id)->get();
        return view('users.excel', [
            'users'=>$users
        ]);
    }
}
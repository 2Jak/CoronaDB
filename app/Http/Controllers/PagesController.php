<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function confirmedCasesAdminPanel()
    {
        $confirmedCases = DB::table('confirmed_cases')->paginate(20);
        return view('confirmed_cases_admin')->with('confirmedCases', $confirmedCases);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Refaccion;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $refaccions = Refaccion::select('refaccions.*');

            return DataTables::of($refaccions)
                ->addColumn('actions', 'refaccions.action')
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('home')->extends('layouts.theme.app')
        ->section('content');;
    }
}

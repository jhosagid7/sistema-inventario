<?php

namespace App\Http\Controllers;

use App\Models\Output;
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
        // $outputs = Output::with('user')->get();
        // dd($outputs[0]->user->name);
        if ($request->ajax()) {

            // $outputs = Output::with('users')->select('outputs.*');
            $outputs = Output::with('user')->get();
            return DataTables::of($outputs)
                ->addColumn('actions', 'refaccions.action')
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('home');
    }
}

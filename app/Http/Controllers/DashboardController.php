<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
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
    public function index()
    {
        return view('pages.dashboard');
    }

    //My auth

    // public function worker_home(){
    //     if (auth()->user()->type== 1) {return view('pages.workerdash');}
    //     return('no admin');
    // }

    public function customer(Request $request)
    {
        if ($request->ajax()) {

            $data = User::where('type', 'customer')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/View/'.$row->id.'" class="edit btn btn-primary btn-sm">View</a> &nbsp';
                    $btn .= '<a href="/Delete/'.$row->id.'"class="delete btn btn-warning btn-sm">Delete</a>';
                    return $btn;
                }) 
                ->rawColumns(['action'])
                ->make(true);

        }

        return view('adminlte_pages.table');

    }
    public function register()
    {
        return view('adminlte_pages.register');
    }

    // worker table

    public function worker(Request $request)
    {
        if ($request->ajax()) {

            $data = '';
            $data = User::where('type', 'worker')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/View/'.$row->id.'" class="edit btn btn-primary btn-sm">View</a> &nbsp';
                    $btn .= '<a href="/Delete/'.$row->id.'"class="delete btn btn-warning btn-sm">Delete</a>';
                    return $btn;

                })
                ->rawColumns(['action'])
                ->make(true);

        }

        return view('adminlte_pages.wtable');

    }
}

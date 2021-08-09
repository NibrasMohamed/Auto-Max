<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function index(){

        $projects= Project::orderby('updated_at', 'desc')->paginate(9);
        $staffs=User::where('type','worker')->get();

        return view('pages.home_page')->with('projects', $projects)->with('staffs', $staffs);
    }
    public function about(){
        return view('pages.about');
    }
    public function projects(){
        $projects= Project::orderby('created_at', 'desc')->paginate(12);


        return view('Staff_pages.projects')->with('projects', $projects);
    }
    public function on_going(){

        $projects= Project::whereIn('status', ['aproved', 'in_progress'])->paginate(9);

        // dd($projects);
        return view('Staff_pages.on_going')->with('projects', $projects);
    }
}

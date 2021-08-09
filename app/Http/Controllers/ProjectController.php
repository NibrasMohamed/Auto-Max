<?php

namespace App\Http\Controllers;

use App\Project;
use Carbon\Carbon;
use App\FileMaster;
use App\ProjectActivity;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Project::where('user_id', Auth::user()->id )->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/appointment/edit/'.$row->id.'" style="margin-left:5px;" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<a data-id="'.$row->id.'" style="margin-left:5px;" class="btn btn-warning btn-sm delete_appointments">Delete</a>';
                    $btn .= '<a href="/appointment/details/get/'.$row->id.'" style="margin-left:5px;" class="btn btn-success btn-sm">Status</a>';

                    return $btn;
                }) 
                ->rawColumns(['action'])
                ->make(true);

        }
        $data = Project::where('user_id', Auth::user()->id )->get();
        return view('customer_pages.appointments.index'); 

    }

    public function adminAppointments(Request $request)
    {
        if ($request->ajax()) {

            $data = Project::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="/appointment/edit/'.$row->id.'" style="margin-left:5px;" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<a data-id="'.$row->id.'" style="margin-left:5px;" class="btn btn-warning btn-sm delete_appointments">Delete</a>';
                    $btn .= '<a href="/appointment/details/get/'.$row->id.'" style="margin-left:5px;" class="btn btn-default btn-sm">Status</a>';

                    if($row->status == 'approval_pending'){
                        $btn .= '<a data-id="'.$row->id.'" style="margin-left:5px;" class="btn btn-success btn-sm approve_appointments">Aprove</a>';
                    }

                   
                    return $btn;
                }) 
                ->editColumn('status', function ($row) {
                    
                    $status = '';

                    if($row->status == 'approval_pending'){
                        $status = '<span class="badge badge-pill badge-danger">Pending</span>';
                    }
                    else if($row->status == 'aproved'){
                        $status = '<span class="badge badge-pill badge-primary">Aprroved</span>';
                    }
                    else if($row->status == 'in_progress'){
                        $status = '<span class="badge badge-pill badge-warning">In Progress</span>';
                    }
                    else if($row->status == 'completed'){
                        $status = '<span class="badge badge-pill badge-success">Completed</span>';
                    }

                    return $status;
                }) 
                ->rawColumns(['status','action'])
                ->make(true);

        }


        return view('customer_pages.admin_appointments.index'); 

    }

    public function adminApproveAppointments(Request $request)
    {
       
        $project = Project::find($request->id);
        $project->status = 'aproved';
        $project->save();

        return response()->json(true);
        
    }

    

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer_pages.appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image_file')) {

            if ($request->file('image_file')->isValid()) {

                $validated = $request->validate([
                    'image_file' => 'mimes:jpeg,png,jpg|max:1024',
                ]);
                $filename = auth()->user()->name . uniqid();
                $extension = $request->image_file->extension();
                $request->image_file->storeAs('/public/project_images', $filename . "." . $extension);
                $url = "/public/project_images/".$filename . "." . $extension;



            }
            if ($validated) {

                $this->validate($request, [
                    'type' => 'required',
                    'make' => 'required',
                    'model' => 'required',
                    'job_type',
                    'details' => 'required',

                ]);

                Project::create([
                    'vehicle_type' => $request->input('type'),
                    'make' => $request->input('make'),
                    'model' => $request->input('model'),
                    'is_touch_up' => (isset($request->is_touch_up) ? 1 : 0),
                    'is_fullpaint' => (isset($request->is_fullpaint) ? 1 : 0),
                    'is_cut_and_polish' => (isset($request->is_cut_and_polish) ? 1 : 0),
                    'is_maintenance' => (isset($request->is_maintenance) ? 1 : 0),
                    'is_minor_accident' => (isset($request->is_minor_accident) ? 1 : 0),
                    'is_major_accident' => (isset($request->is_major_accident) ? 1 : 0),
                    'details' => $request->input('details'),
                    'img' => $url,
                    'user_id' => auth()->user()->id,
                    'status' => 'approval_pending',
                    'progress' => 0
                ]);

                return redirect('/appointment/index');

            } else {
                return back();
            }

        }
        //  dd($request);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $project = Project::find($id);
        return view('customer_pages.appointments.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $url = false;
        
        $this->validate($request, [
            'type' => 'required',
            'make' => 'required',
            'model' => 'required',
            'job_type',
            'details' => 'required',

        ]);

        $project = Project::find($request->id);
        
        
        if ($request->hasFile('image_file')) {
           
            if ($request->file('image_file')->isValid()) {
                    
                $this->deleteFile($project->img);
                
                $validated = $request->validate([
                    'image_file' => 'mimes:jpeg,png,jpg|max:1024',
                ]);
                $filename = auth()->user()->name . uniqid();
                $extension = $request->image_file->extension();
                $request->image_file->storeAs('/public/project_images', $filename . "." . $extension);
                $url = "/public/project_images/".$filename . "." . $extension;



            }
        }

        $project->vehicle_type =  $request->input('type');
        $project->make = $request->input('make');
        $project->model = $request->input('model');
        $project->is_touch_up = (isset($request->is_touch_up) ? 1 : 0);
        $project->is_fullpaint = (isset($request->is_fullpaint) ? 1 : 0);
        $project->is_cut_and_polish = (isset($request->is_cut_and_polish) ? 1 : 0);
        $project->is_maintenance = (isset($request->is_maintenance) ? 1 : 0);
        $project->is_minor_accident = (isset($request->is_minor_accident) ? 1 : 0);
        $project->is_major_accident = (isset($request->is_major_accident) ? 1 : 0);
        $project->details =  $request->input('details');
        $project->user_id =  auth()->user()->id;
        $project->status = 'approval_pending';
        $project->progress =  0;
        if($url){
            $project->img =  $url; 
        }
        $project->save();

        

        return redirect('/appointment/index');
        
    }

    public function updateStatus(Request $request)
    {
       
        $project = Project::find($request->id);

        if($request->type == 'percentage'){
            $project->progress = $request->input('value');
        }
        else{
            $project->status = $request->input('value');
        }
           
        $project->save();

        return response()->json(true);
        
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Project::where('id', '=' , $request->id)->delete();

        return response()->json(true);
    }




    // Projects table

    public function projects(Request $request)
    {
        if ($request->ajax()) {

            $data = Project::where('user_id', Auth::user()->id )->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="#" class="edit btn btn-primary btn-sm">View</a> &nbsp';
                    $btn .= '<a href="#"class="delete btn btn-warning btn-sm">Delete</a>';
                    return $btn;
                }) 
                ->rawColumns(['action'])
                ->make(true);

        }

        return view('customer_pages.vehicles_table'); 

    }

    public function getImage(Request $request)
    {
        $project = Project::find($request->id);


        $file_path = $project->img;



        if (! Storage::exists($file_path)) {
            abort(404);
        }

       

        $file = Storage::get($file_path);
        $type = Storage::mimeType($file_path);

        $response = Response::make($file, 200);
        $response->header('Content-Type', $type);

        return $response;
    }

    public function getImageByFileMaster(Request $request)
    {
        $file_master = FileMaster::find($request->id);

        $file_path = $file_master->file_path;

        if (! Storage::exists($file_path)) {
            abort(404);
        }

       

        $file = Storage::get($file_path);
        $type = Storage::mimeType($file_path);

        $response = Response::make($file, 200);
        $response->header('Content-Type', $type);

        return $response;
    }

    public function deleteFile($file_path)
    {
        if (! Storage::exists($file_path)) {
            abort(404);
        }

        $response = Storage::delete($file_path);


        return $response;
    }

    public function getAppointmentDetails(Request $request, $project_id){
        $project = Project::find($project_id);

        $project_activities = ProjectActivity::with('files')
                                            ->join('users', 'users.id', '=' , 'project_activity.user_id')
                                            ->where('project_activity.project_id', '=', $project->id)
                                            ->select('project_activity.*', 'users.name as user_name', DB::raw("DATE_FORMAT(project_activity.created_at, '%d %b %Y') as formatted_created_at"))
                                            ->orderBy('project_activity.created_at', 'DESC')
                                            ->get();

        $project_activities = $project_activities->mapToGroups(function ($item, $key) {
            return [$item['formatted_created_at'] => $item];
        });

        if(isset($request->_t) && $request->_t == 1){
            $read_only = false;
        }
        else{
            $read_only = true;
        }

                                                
        return view('customer_pages.appointments.status', compact('project', 'project_activities', 'read_only'));
    }

    public function createAppointmentDetails(Request $request){
        $project_id = $request->project_id;
        return view('customer_pages.appointments.status-create', compact('project_id'));
    }

    public function storeAppointmentDetails(Request $request){

        $project_activity = ProjectActivity::create([
            'project_id' => $request->project_id,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ]);

        foreach($request->image_file as $image){

            $filename = auth()->user()->name . uniqid();
            $extension = $image->extension();
            $image->storeAs('/public/project_acticivity_images/'.$project_activity->id.'/', $filename . "." . $extension);
            $path = '/public/project_acticivity_images/'.$project_activity->id.'/'.$filename . "." . $extension;

            FileMaster::create([
                'folder_id' => $project_activity->id,
                'category' => 'project-activuty',
                'file_path' => $path
            ]);
        }

        return redirect('/appointment/details/get/'.$request->project_id.'?_t=1');

    }

    


}

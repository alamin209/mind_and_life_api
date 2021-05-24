<?php

namespace App\Http\Controllers\Projectmanagemnt;

use App\Http\Controllers\Controller;
use App\Libraries\WebApiResponse;
use App\Models\Client;
use App\Models\Vendor;
use App\Models\FundType;
use App\Models\Project;
use Illuminate\Http\Request;
use App\User;
use DataTables;
class ProjectManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::orderBy('name_en', 'ASC')->get();
        // $vendor = Vendor::orderBy('company_name', 'ASC')->get();
        $fundTypes = FundType::orderBy('name', 'ASC')->get();

        $title ='Project  List';


        $data    = Project::get();



        if ($request->ajax()) {


                    return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('name', function ($row) {
                        return $row->name;
                    })

                    ->addColumn('client', function ($row) {
                        return $row->client->name_en;
                    })

                    // ->addColumn('vendor', function ($row) {
                    //     return $row->vendor->post_title ?? '';
                    // })
                    ->addColumn('contact_number', function ($row) {
                        return $row->client->contact_number;
                    })
                    ->addColumn('amount', function ($row) {
                        return $row->project_value;
                    })
                    ->addColumn('project_status', function ($row) {
                        return $row->project_status;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<button type="button"   onclick="editProject('.$row->id .')"
                        class="btn btn-success waves-effect waves-light"style="margin-right:20px"   data-toggle="modal" data-target="#updateClinet">
                        <i class="bx bx-pencil  font-size-16 align-right "   ></i>
                        </button> ';
                         $btn2 = '<a href="application_details/'.$row->id.'" class="edit btn btn-primary">Project Details</a>';
                        return  $btn .''.$btn2 ;

                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }

        return view('admin/projects/projectlist',compact('title','clients', 'fundTypes'));
    }


    public function store(Request $request)
    {
        $data = $request->validate( [
            'name'               => 'required|max:255',
            'client_id'          => 'required|integer',
            // 'vendor_id'          => 'required|integer',
            'start_date'         => 'nullable|date',
            'end_date'           => 'nullable|date',
            'project_value'      => 'required|numeric',
            'project_status'     => 'required|string',
            'fund_type_id'       => 'required|integer',
            'note'               => 'nullable|string',
        ]);

        try{
            Project::create( $data );
            return redirect()->back()->with( 'success', 'Project created successfully.' );
        } catch( \Exception $e ) {
            return redirect()->back()->with( 'error', 'Failed to create new Project!' );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $project = Project::findOrFail($id);
        if ($request->ajax()) {
            return WebApiResponse::success(200, $project->toArray(), 'Data Fetched');
        }

        return $project;
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate( [
            'name'          => 'required|max:255',
            'client_id'     => 'required|integer',
            'start_date'    => 'nullable|date',
            'end_date'      => 'nullable|date',
            'project_value'      => 'required|numeric',
            'project_status'      => 'required|string',
            'fund_type_id'      => 'required|integer',
        ]);

        $project = Project::findOrFail($id);

        try{
            $project->update( $data );
            $this->successfullymessage('Project Updated successfully');
            return redirect()->back();
        } catch( \Exception $e ) {
            $this->failmessage($e->getMessage());
            return redirect()->back()->with( 'error', 'Failed to update Project!' );
        }
    }




}

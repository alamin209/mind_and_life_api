<?php

namespace App\Http\Controllers\Projectmanagemnt;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Project;
use App\Models\Vendor;
use Illuminate\Http\Request;
use PDF;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Applications';
        $applications = Application::get();
        return view('admin.application.list', compact('title', 'applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Application';
        $projects   = Project::get();
        $vendors    = Vendor::get();

        // return $vendors;

        $detailsTemplate   =   '<p>&nbsp;</p>
                                <table style="border-collapse: collapse; width: 100%; border:2px solid black !important ; height: 144px; padding: 5px;" border="1">
                                    <tbody>
                                        <tr style="border:2px solid black !important">
                                            <td style="border:2px solid black !important" >項目</td>
                                            <td style="border:2px solid black !important" >月費</td>
                                            <td style="border:2px solid black !important" >數量</td>
                                            <td style="border:2px solid black !important" >總價</td>
                                        </tr>
                                        <tr style="border:2px solid black !important" >
                                            <td style="border:2px solid black !important" >
                                            <p>網上購物平台(月費形式)(12個月)</p>
                                            <p>網頁設計:</p>
                                            <p>- 佈局和UI設計的設計、構思和概念</p>
                                            <p>- 基本庫存圖片亦會包含在內</p>
                                            <p>- 回應式設計(responsive)</p>
                                            <p>網頁功能:</p>
                                            <p>- 主頁</p>
                                            <p>- 關於我們</p>
                                            <p>- 產品</p>
                                            <p>o 資訊、價錢、簡介</p>
                                            <p>o paypal 付款</p>
                                            <p>o 評論</p>
                                            <p>o 評分</p>
                                            <p>o 比較商品</p>
                                            <p>o 購物劵折扣</p>
                                            <p>- 推廣優惠</p>
                                            <p>- 成為分銷商</p>
                                            <p>- 合作伙伴</p>
                                            <p>- 聯絡我們</p>
                                            <p>- 會員登入/註冊系統</p>
                                            <p>- 三種語言:繁中,簡中,英文</p>
                                            </td>
                                            <td style="border:2px solid black !important" >$3,800/月</td>
                                            <td style="border:2px solid black !important" >12月</td>
                                            <td style="border:2px solid black !important" >HK$45,600</td>
                                        </tr>
                                        <tr style="border:2px solid black !important" >
                                            <td style="border:2px solid black !important" >1小時培訓使用教學</td>
                                            <td style="border:2px solid black !important" >$14,00</td>
                                            <td style="border:2px solid black !important" >1</td>
                                            <td style="border:2px solid black !important">$14,00</td>
                                        </tr>
                                        <tr style="border:2px solid black !important" >
                                            <td  style="border:2px solid black !important" align="right">總數:</td>
                                            <td> </td>
                                            <td> </td>
                                            <td style="border:2px solid black !important" >HK$ 47,000</td>
                                        </tr>
                                    </tbody>
                                </table>';
        return view('admin.application.create', compact('title', 'projects', 'vendors', 'detailsTemplate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate( [
            'project_id'          => 'required|integer',
            'vendor_id'          => 'required|integer',
            'quotation_no'         => 'required|string',
            'project_details'           => 'required|string',
            'sub_total'      => 'required|numeric',
            'remarks'               => 'nullable|string',
        ]);

        try{

            Application::create( $data );
            return redirect()->route('applications.index')->with( 'success', 'Application created successfully.' );
        } catch( \Exception $e ) {
            // return $e;
            return redirect()->back()->with( 'error', 'Failed to create new Application!' );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::with('project.client', 'vendor')->findOrFail($id);
        $title = 'Application Details';
        return view('admin.application.view',compact('application','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = Application::with('project.client', 'vendor')->findOrFail($id);
        $projects   = Project::get();
        $vendors    = Vendor::get();
        $title = 'Application Details';
        return view('admin.application.edit',compact('application','title', 'projects', 'vendors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate( [
            'project_id'          => 'required|integer',
            'vendor_id'          => 'required|integer',
            'quotation_no'         => 'required|string',
            'project_details'           => 'required|string',
            'sub_total'      => 'required|numeric',
            'remarks'               => 'nullable|string',
        ]);

        $application = Application::findOrFail($id);

        try{

            $application->update( $data );
            return redirect()->route('applications.index')->with( 'success', 'Application update successfully.' );
        } catch( \Exception $e ) {
            // return $e;
            return redirect()->back()->with( 'error', 'Failed to update Application!' );
        }
    }


    public function project_base_application_list($project_id){

        $title = 'Applications List of Project';
        $applications = Application::with('project')->where('project_id',$project_id)->get();
        return view('admin.projects.application_list', compact('title', 'applications'));

    }


    /**
     * Generate PDF Quotation
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function applicationPdf($id)
    {
        $application = Application::with('project.client', 'vendor')->findOrFail($id);

        $pdf = PDF::loadView('admin.application.pdf.quotation', ['application' => $application]);
	    return $pdf->stream('document.pdf');
    }


}

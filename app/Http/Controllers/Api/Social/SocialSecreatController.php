<?php

namespace App\Http\Controllers\Api\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Libraries\WebApiResponse;
class SocialSecreatController extends Controller
{


    public function index()
    {

        // $secrrate = DB::table('oauth_clients')->where('secret', 'id')->where('id',2)->first();

        // if ($secrrate) {

        //     return WebApiResponse::success(200, $bloodGroup->toArray(), trans('messages.success_show'));
        // } else {

        //     return WebApiResponse::error(404, [], trans('messages.success_show_faild'));
        // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Secrete Token
     * @group Social Secreatetoken
     * @param  Request $request
     * @return Response
     * @response 200 {"status":"Success","message":"Login Success","code":200,"data":{"id":2,"username":"alamin12","email":"alamin20192019@gmail.com","sex":"Male","status":1,"industry_id":1,"salary_range_id":1,"referral_code":"2023","access_token":{"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNDg1Y2YzYTlkZGE0MDI4ODRmMDA4OTJhZDkyZDRmZmNiMjI0ZmFjNWVjOWQ0M2ZmZGNjMWQ5NWU3MGVkZGFkMzhjYzVjNDU0ODBiZmY3ZDUiLCJpYXQiOiIxNjE4NTA0MjIzLjI1ODk4NCIsIm5iZiI6IjE2MTg1MDQyMjMuMjU4OTg3IiwiZXhwIjoiMTYxODU5MDYyMy4xMTg5MDkiLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.heiHePCYpVEsHsq8m-B1HgX_TVvecXDGGQdPaOIHA0Rbn98pFUIg7v73tk93IF1IxIp5VGMFDzpAlenHhdqI5sIpW5iuXxcLSa_XmtqCzxHOg_5C8m5KehW--tbnDtrKmE2G2563M52hX9TscqIYt17joQndpAi3pWCs4dklea5mls1UoXg8zPDkp5DkZ_tuORXCsXpldPVXw0JjuOuGmL0D5yfMg3Xufw-KdYX-Ip0GsgU2eT2xf7sjDQcAtba2I_4kNZbgr56ta2RmNxvDIg0spfhoRktQgEsnREesezpv8hyy_SiMHfChmAucyAqTh7TOoFjUZ2BzAqPRBuyw-nLUBogRPE2Y1S9OQg0Od1-Aqgi4F4EFSrklJHrCB5koOLgqoURt_RySo2SweEjIHdudMRSQhtXCRVeBBimxeH_9zIRH_T684hmluNCCIlZeYTxgRBBkFg65i9i1GUSjLpkciUu0txlpPevsOou68A_MWwWByGifq8o4GuY1NVY1FgMYkYMuGraGduUtsmaCBhVZlTX1-tPfuTR1k3XjM7RGMTp8C-8UTqwzruLDu20cwJXsQ4Of6Jp970Rl6FI-9CzqWhlx5GIxrvcFufkV2ntAApBllt4fBVKBKkaaJCCgLo6MrTRuKGU5aI1Lzcz1hkFWHw0JjMDN3jOS5cmD9OM","token_type":"Bearer","expires_at":"2021-04-16 16:30:23"},"profile_pic":"public\/upload\/60785f80cb084_1611049331368.JPEG","created_at":"2021-04-15T15:45:04.000000Z","updated_at":"2021-04-15T15:45:04.000000Z"}}
    */

    public function show($id)
    {

        $secret = DB::table('oauth_clients')->where('secret', 'id')->where('id',2)->first();

        if ($secret) {

            return WebApiResponse::success(200, $secret->toArray(), trans('messages.success_show'));
        } else {

            return WebApiResponse::error(404, [], trans('messages.success_show_faild'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

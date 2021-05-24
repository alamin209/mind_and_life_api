<?php

namespace App\Http\Middleware;

use Closure;
use App\models\Ipaddress;

class CheckIpMiddleware
{
    //public $whiteIps = Ipaddress::where('status',1)->get()->pluck('ip_address');


    public $whiteIps = ['192.168.1.1', '127.0.0.1'];

    /**

     * Handle an incoming request.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \Closure  $next

     * @return mixed

     */


           // set IP addresses

    public $restrictIps = ['ip-addr-0', 'ip-addr-1', '127.0.0.5'];



    public function handle($request, Closure $next)

    {

        if (in_array($request->ip(), $this->restrictIps)) {

            return response()->json(['message' => "You don't valid Ip Address"]);

        }


        return $next($request);

    }


}

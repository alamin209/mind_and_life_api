<?php

namespace App\Services;

use App\Models\User;
use App\Models\LinkedSocialAccount;
use Laravel\Socialite\Two\User as ProviderUser;
use Carbon\Carbon as Carbon;
use Validator;
use Illuminate\Http\Request;
use App\Libraries\WebApiResponse;
class SocialAccountsService
{


    /**
     * Login with Gmail or facebook Token
     * @group Social Secreatetoken
     * @param ProviderUser $providerUser
     * @param string $provider
     * @param  Request $request
     * @return Response
     * @response 200 {"status":"Success","message":"Login Success","code":200,"data":{"id":2,"username":"alamin12","email":"alamin20192019@gmail.com","sex":"Male","status":1,"industry_id":1,"salary_range_id":1,"referral_code":"2023","access_token":{"access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNDg1Y2YzYTlkZGE0MDI4ODRmMDA4OTJhZDkyZDRmZmNiMjI0ZmFjNWVjOWQ0M2ZmZGNjMWQ5NWU3MGVkZGFkMzhjYzVjNDU0ODBiZmY3ZDUiLCJpYXQiOiIxNjE4NTA0MjIzLjI1ODk4NCIsIm5iZiI6IjE2MTg1MDQyMjMuMjU4OTg3IiwiZXhwIjoiMTYxODU5MDYyMy4xMTg5MDkiLCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.heiHePCYpVEsHsq8m-B1HgX_TVvecXDGGQdPaOIHA0Rbn98pFUIg7v73tk93IF1IxIp5VGMFDzpAlenHhdqI5sIpW5iuXxcLSa_XmtqCzxHOg_5C8m5KehW--tbnDtrKmE2G2563M52hX9TscqIYt17joQndpAi3pWCs4dklea5mls1UoXg8zPDkp5DkZ_tuORXCsXpldPVXw0JjuOuGmL0D5yfMg3Xufw-KdYX-Ip0GsgU2eT2xf7sjDQcAtba2I_4kNZbgr56ta2RmNxvDIg0spfhoRktQgEsnREesezpv8hyy_SiMHfChmAucyAqTh7TOoFjUZ2BzAqPRBuyw-nLUBogRPE2Y1S9OQg0Od1-Aqgi4F4EFSrklJHrCB5koOLgqoURt_RySo2SweEjIHdudMRSQhtXCRVeBBimxeH_9zIRH_T684hmluNCCIlZeYTxgRBBkFg65i9i1GUSjLpkciUu0txlpPevsOou68A_MWwWByGifq8o4GuY1NVY1FgMYkYMuGraGduUtsmaCBhVZlTX1-tPfuTR1k3XjM7RGMTp8C-8UTqwzruLDu20cwJXsQ4Of6Jp970Rl6FI-9CzqWhlx5GIxrvcFufkV2ntAApBllt4fBVKBKkaaJCCgLo6MrTRuKGU5aI1Lzcz1hkFWHw0JjMDN3jOS5cmD9OM","token_type":"Bearer","expires_at":"2021-04-16 16:30:23"},"profile_pic":"public\/upload\/60785f80cb084_1611049331368.JPEG","created_at":"2021-04-15T15:45:04.000000Z","updated_at":"2021-04-15T15:45:04.000000Z"}}
    */

    public function findOrCreate(ProviderUser $providerUser, string $provider): User
    {

        $linkedSocialAccount = LinkedSocialAccount::where('provider_name', $provider)
            ->where('provider_id', $providerUser->getId())
            ->first();

        if ($linkedSocialAccount) {
            return $linkedSocialAccount->user;
        } else {

            $user = null;

             if ($email = $providerUser->getEmail()) {
                 $user = User::where('email', $email)->first();


                 if(isset($user->email) && $user->email== $providerUser->getEmail() ){

                       $errors = [
                            ['field' => '',
                           'value' => '',
                           'message' => ['Already use this Email ']
                           ]
                      ];
                  return WebApiResponse::error(400, $errors , 'Account Has Been deductive');

                }
            }

          if  (! $user) {


            $last_user = User::latest('id')->first();

            $last_user_id= $last_user->id ?? 1;
            $demo  = 'mind_life'.$last_user_id;

                $user = User::create([
                     'username' => $name = str_replace(' ', '_', strtolower($providerUser->getName().$demo)) ,
                     'email'   => $providerUser->getEmail(),
                     'status' =>1 ,
                     'profile_pic' => $providerUser->getAvatar(),
                     'email_verified_at'=>date('Y-m-d')
                ]);


                if($user->status==0){
                    $errors = [
                           ['field' => '',
                           'value' => '',
                           'message' => ['Account Has Been deductive']
                           ]
                    ];
                  return WebApiResponse::error(400, $errors , 'Account Has Been deductive');

               }


            }

            $user->linkedSocialAccounts()->create([
                'provider_id' => $providerUser->getId(),
                'provider_name' => $provider,
            ]);

            return $user;
        }
    }
}

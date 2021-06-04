<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'               => $this->id,
            'username'         => $this->username,
            'email'            => $this->email,
            'sex'              => $this->sex,
            'status'           => $this->status,
            'industry_id'      => $this->industry_id ,
            'salary_range_id'  => $this->salary_range_id,
            'referral_code'    => $this->referral_code,
            'access_token'     =>$this->access_token,
            'profile_pic'       =>$this->profile_pic ,
            'email_verified_at' =>$this->email_verified_at,
            'created_at'       => $this->created_at,
            'updated_at'       => $this->updated_at,
            'user_type'        => $this->user_type,
            'is_api'           => $this->is_api
        ];
    }
}

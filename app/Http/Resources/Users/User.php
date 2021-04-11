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
            'id'            => $this->id,
            'username'      => $this->username,
            'email'         => $this->email,
            'sex'            => $this->sex,
            'industry_id'    => $this->industry_id ,
            'salary_range_id' => $this->salary_range_id,
            'referral_code'   => $this->referral_code,
            'profile_pic'       =>$this->profile_pic ,
            'created_at'     => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }
}

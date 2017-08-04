<?php

namespace App\Http\Controllers;

use App\Ylc\Facades\YlcAuth;
use Illuminate\Http\Request;

class OpenIdController extends Controller
{
    public function redirect()
    {
        return YlcAuth::redirect();
    }
    public function postAuth()
    {
        $data = [
            YlcAuth::getIdentity(),
            YlcAuth::getName(),
            YlcAuth::getEmail(),
            YlcAuth::getSchoolId(),
            YlcAuth::getSchoolTown(),
            YlcAuth::getSchoolName(),
            YlcAuth::getSchoolType(),
            YlcAuth::getUserType(),
            YlcAuth::getUserJob(),
        ];

        dd($data);
    }
}

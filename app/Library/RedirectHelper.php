<?php

namespace App\Library;
use App\Models\Redirects;
use Illuminate\Support\Facades\Redirect;
class RedirectHelper
{
    public static function redirectHandler($url){
        $redirect = Redirects::where('old_address',$url)->orderBy('id','DESC')->first();
        if($redirect){
            return Redirect::to($redirect->new_address, $redirect->type == 1 ? 301 : 302);
        }else{
            return false;
        }
    }
}

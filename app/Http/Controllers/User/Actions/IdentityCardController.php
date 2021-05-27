<?php

namespace App\Http\Controllers\User\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\IdentityCardExport;
use App\Helpers\HelperGlobal;

class IdentityCardController extends Controller
{
    public function export(Request $request){
        try{        
            return Excel::download(new IdentityCardExport(), 'identityCard.xlsx');
        }catch(\Exception $e){
            return HelperGlobal::failed($e);
        }
    }
}

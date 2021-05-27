<?php

namespace App\Http\Controllers\User\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\IdentityCardExport;
use App\Models\IdentityCard;

class IdentityCardController extends Controller
{
    public function export(Request $request){
        try{
            $identityCard = IdentityCard::query()
                ->select('nik','name','born_at','birth','gender','blood_type','region','is_married','jobs','nationality','valid_until','age');

            if($request->filled('name')){
                $identityCard->where('name',$request->name);
            }

            if($request->filled('region')){
                $identityCard->where('region',$request->region);
            }

            return Excel::download(new IdentityCardExport($identityCard->get()), 'identityCard.xlsx');
        }catch(\Exception $e){
            return HelperGlobal::failed($e);
        }
    }
}

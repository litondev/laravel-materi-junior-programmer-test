<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IdentityCard;
use App\Exports\IdentityCardExport;

class IdentityCardController extends Controller
{
    public function index(Request $request){
        $identityCard = IdentityCard::selectDefault()->withAddress();

        if($request->filled('name')){
            $identityCard->where('name',$request->name);
        }

        if($request->filled('region')){
            $identityCard->where('region',$request->region);
        }

        if($request->filled('age')){
            $identityCard->where('age',$request->age);
        }

        $identityCard = $identityCard->orderBy('id','desc')
            ->paginate(10)
            ->appends([
                'age' => $request->get('age',''),
                'region' => $request->get('region',''),
                'name' => $request->get('name','')
            ]);

        return view('user.identity-card.view',compact('identityCard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($identity_card)
    {
        $identity_card = IdentityCard::with('address')->findOrFail($identity_card);
        return view('user.identity-card.show',compact('identity_card'));
    }

     public function export(Request $request){      
        $data = $request->all();
        $data["count"] = IdentityCardExport::getCount();
        $data["export_url"] = route('action.identity-card.export')."?".$request->getQueryString();

        return view('user.identity-card.export',$data);
    }
}

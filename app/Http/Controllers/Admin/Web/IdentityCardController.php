<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IdentityCard;
use App\Exports\IdentityCardExport;

class IdentityCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        return view('admin.identity-card.view',compact('identityCard'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $identity_card = IdentityCard::selectNik()->orderBy('id','desc')->first();
        $nik = $identity_card ? ($identity_card->nik + 1) : 1;
        return view('admin.identity-card.form',compact('nik'));
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
        return view('admin.identity-card.show',compact('identity_card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($identity_card){
        $identityCard = IdentityCard::with('address')->findOrFail($identity_card);

        $data = array(
            "identity_card" => $identityCard,
            "id" => $identity_card
        );   

        return view('admin.identity-card.form',$data);
    }


    public function export(Request $request){             
        $data = $request->all();
        $data["count"] = IdentityCardExport::getCount();
        $data["export_url"] = route('admin.action.identity-card.export')."?".$request->getQueryString();

        return view('admin.identity-card.export',$data);
    }

    public function import(Request $request){
        return view('admin.identity-card.import');
    }
}

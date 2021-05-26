<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IdentityCard;

class IdentityCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $identityCard = IdentityCard::query()
            ->selectDefault()
            ->withAddress();

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
        $nik = (IdentityCard::query()
                ->selectNik()
                ->orderBy('id','desc')
                ->first()->nik + 1);

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
        $identity_card = IdentityCard::query()
            ->with('address')
            ->findOrFail($identity_card);

        return view('admin.identity-card.show',compact('identity_card'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($identity_card){
        $data = array(
            "identity_card" => IdentityCard::query()
                ->with('address')
                ->findOrFail($identity_card),
            "id" => $identity_card
        );   

        return view('admin.identity-card.form',$data);
    }


    public function export(Request $reqest){
        echo "hai";
    }

    public function import(Request $request){
        echo "as";
    }
}

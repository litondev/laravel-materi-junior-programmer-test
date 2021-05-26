<?php

namespace App\Http\Controllers\Admin\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\IdentityCard;
use App\Helpers\HelperGlobal;
use App\Http\Requests\Admin\IdentityCardRequest;
use App\Uploads\Admin\IdentityCardPhoto;

class IdentityCardController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IdentityCardRequest $request)
    {
        try{
            DB::beginTransaction();

            $payload = $request->except('address','district','village','rt','rw','photo','is_valid_until');
            $payload['photo'] = IdentityCardPhoto::upload();

            $identityCard = IdentityCard::create($payload);

            $identityCard->address()->create($request->only('address','district','village','rt','rw'));

            DB::commit();

            return HelperGlobal::success(["r" => "admin/identity-card","m" => "Berhasil Menambah Data"]);                    
        }catch(\Exception $e){
            DB::rollback();

            return HelperGlobal::failed($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IdentityCardRequest $request,IdentityCard $identity_card)
    {
        try{
            DB::beginTransaction();

            $oldPhoto = $identity_card->getRawOriginal('photo');

            $payload = $request->except('address','district','village','rt','rw','photo','is_valid_until');
            
            if($request->has('photo')){
                $payload['photo'] = IdentityCardPhoto::upload();
            }

            $identity_card->update($payload);

            $identity_card->address()->update($request->only('address','district','village','rt','rw'));
            
            DB::commit();

            IdentityCardPhoto::delete($oldPhoto);

            return HelperGlobal::success(["r" => "admin/identity-card","m" => "Berhasil Mengubah Data"]);                    
        }catch(\Exception $e){
            DB::rollback();

            return HelperGlobal::failed($e);
        }
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($identity_card)
    {
        try{
        	DB::beginTransaction();

        	$identity_card = IdentityCard::query()
        		->selectId()
        		->withAddressId()
        		->findOrFail($identity_card);

            // $oldPhoto = $identity_card->getRawOriginal('photo');

        	$identity_card->address()->delete();

        	$identity_card->delete();

        	DB::commit();

            // IdentityCardPhoto::delete($oldPhoto);

            return HelperGlobal::success(["r" => "back","m" => "Berhasil Mengahapus Data"]);                    
        }catch(\Exception $e){
        	DB::rollback();

    		return HelperGlobal::failed($e);
        }
    }
}

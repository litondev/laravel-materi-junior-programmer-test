<?php

namespace App\Http\Controllers\Admin\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\IdentityCard;
use App\Helpers\HelperGlobal;
use App\Http\Requests\Admin\IdentityCardRequest;
use App\Http\Requests\IdentityCardImportRequest;
use App\Uploads\Admin\IdentityCardPhoto;
use App\Uploads\IdentityCardImport as IdentityCardImportFile;
use App\Exports\IdentityCardExport;
use App\Imports\IdentityCardImport;
use Maatwebsite\Excel\Facades\Excel;

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
        
            $identityCard = IdentityCard::create($request->except('address','district','village','rt','rw','is_valid_until'));

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
        
            $identity_card->update($request->except('address','district','village','rt','rw','is_valid_until'));

            $identity_card->address()->update($request->only('address','district','village','rt','rw'));
            
            DB::commit();

            $request->has('photo') ? IdentityCardPhoto::delete($oldPhoto) : '';

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

        	$identity_card = IdentityCard::selectIdPhoto()->withAddressId()->findOrFail($identity_card);

            $oldPhoto = $identity_card->getRawOriginal('photo');

        	$identity_card->address()->delete();

        	$identity_card->delete();

        	DB::commit();

            IdentityCardPhoto::delete($oldPhoto);

            return HelperGlobal::success(["r" => "back","m" => "Berhasil Mengahapus Data"]);                    
        }catch(\Exception $e){
        	DB::rollback();

    		return HelperGlobal::failed($e);
        }
    }

    public function export(Request $request){
        try{          
            return Excel::download(new IdentityCardExport(), 'identityCard.xlsx');
        }catch(\Exception $e){
            return HelperGlobal::failed($e);
        }
    }

    public function import(IdentityCardImportRequest $request){
        try{            
            Excel::import(new IdentityCardImport, public_path('/assets/imports/'.IdentityCardImportFile::upload()));
            return HelperGlobal::success(["r" => "back","m" => "Berhasil Mengimport Data"]);                    
        }catch(\Exception $e){
            return HelperGlobal::failed($e);
        }
    }
}

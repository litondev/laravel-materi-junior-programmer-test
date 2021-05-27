<?php

namespace App\Exports;

use App\Models\IdentityCard;
use Maatwebsite\Excel\Concerns\FromCollection;

class IdentityCardExport implements FromCollection
{
	public $query;

	public function __construct($query = null){

		$this->query = is_null($query) ? IdentityCardExport::getDataExport() : $query;
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->query;
    }

    public static function getCount(){
        $identityCard = IdentityCard::query()
            ->selectId();

        if(request()->filled('name')){
            $identityCard->where('name',request()->name);
        }

        if(request()->filled('region')){
            $identityCard->where('region',request()->region);
        }

        return $identityCard->count();
    }

    public static function getDataExport(){
        $identityCard = IdentityCard::query()
            ->select('nik','name','born_at','birth','gender','blood_type','region','is_married','jobs','nationality','valid_until','age');

        if(request()->filled('name')){
            $identityCard->where('name',request()->name);
        }

        if(request()->filled('region')){
            $identityCard->where('region',request()->region);
        }

        return $identityCard->get();
    }
}

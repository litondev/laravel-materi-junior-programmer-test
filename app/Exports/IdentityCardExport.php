<?php

namespace App\Exports;

use App\Models\IdentityCard;
use Maatwebsite\Excel\Concerns\FromCollection;

class IdentityCardExport implements FromCollection
{
	public $query;

	public function __construct($query){
		$this->query = $query;
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->query;
    }
}

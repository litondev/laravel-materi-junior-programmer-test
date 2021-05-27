<?php

use Illuminate\Database\Seeder;
use App\Models\{
	User,
	IdentityCard
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		"name" => "user",
    		"email" => "user@user.com",
    		"password" => "12345678"
    	]);

    	User::create([
    		"name" => "admin",
    		"email" => "admin@admin.com",
    		"password" => "12345678",
    		"role" => "admin"
    	]);

    	for($i=0;$i<10;$i++){
    		$identityCard = IdentityCard::create([
    			"name" => "user".$i,
    			"nik" => rand(1000000000000000,99999999999999),
    			"born_at" => "SRAGEN",
    			"birth" => "2001-09-09",
    			"region" => "ISLAM",    			
    		]); 
    		
    		$identityCard->address()->create([
    			"address" => "Teguhan",
    			"district" => "Sragen",
    			"village" => "Sragen Wetan",
    			"rt" => "001",
    			"rw" => "002"
    		]);
    	}
    }
}

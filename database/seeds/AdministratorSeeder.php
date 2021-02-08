<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = "administrator";
        $administrator->name     = "Site Administrator";
        $administrator->email    = "administrator@larashop.test";
        $administrator->roles    = json_encode(["ADMIN"]);
        $administrator->password = \Hash::make("larashop");
        $administrator->avatar   = "belumadafoto.png";
        $administrator->address  = "Sarmili, Bintaro, Tangerang Selatan";
        $administrator->phone    = "081230555666";

        $administrator->save();

        $this->command->info("User Admin berhasil diinsert");
    }
}

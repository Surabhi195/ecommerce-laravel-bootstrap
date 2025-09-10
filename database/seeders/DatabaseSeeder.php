<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    public function run(){
        User::create(['name'=>'Demo User','email'=>'demo@example.com','password'=>Hash::make('password')]);
        Item::create(['name'=>'Blue T-Shirt','price'=>199.99,'category'=>'clothing','description'=>'Comfortable cotton t-shirt']);
        Item::create(['name'=>'Running Shoes','price'=>2999.00,'category'=>'footwear','description'=>'Lightweight running shoes']);
        Item::create(['name'=>'Coffee Mug','price'=>249.50,'category'=>'home','description'=>'Ceramic mug 350ml']);
    }
}

<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('products')->delete();
        $ar=collect();
        \Excel::load('public/other/products.xlsx',function ($result)use($ar){
            $ar->push($result->get());
        });

        foreach ($ar as $items){
            foreach ($items as $item){
                \App\Product::create([
                    'productname'=>$item->name,
                    'weight'=>$item->weight,
                    'user_by'=>1,
                ]);
            }

        };
    }
}

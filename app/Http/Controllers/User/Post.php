<?php

namespace App\Http\Controllers\User;

use App\Models\UserSell;
use App\Models\UserSellDetail;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Post extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sub_head']=false;
        return view('UserPost.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $product=Product::where('productname','LIKE','%%'.$request->data.'%%')->get();
        return $product;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_sell=UserSell::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'post_by'=>auth()->id(),
        ]);
        $product_id='';
        foreach ($request->main as $k=>$item){
            if ($item['new_product']){
                $product=Product::updateOrCreate(['productname'=>$item['product']['productname'], 'weight'=>$item['weight']],['user_by'=>auth()->id()]);
                $product_id=$product->id;
            }else{
                $product_id=$item['product']['id'];
            }
            UserSellDetail::create(['user_sell_id'=>$new_sell->id,'product_id'=>$product_id,'price'=>$item['price'],'qty'=>$item['qty']]);
        }

        return response(['success'=>'New Post has been created.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

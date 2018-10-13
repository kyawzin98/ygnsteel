<?php

namespace App\Http\Controllers;

use App\Product;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products']=Product::all();
        $data['a']=1;
        return view('product.productshow')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product=Product::with('user')->get();
        return \DataTables::of($product)->make();

//        return view('product.productinsert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationdata=$request->validate([
            'name'=>'required|unique:products,productname'
        ]);
        $insert=[
            'productname'=>$request->name,
            'weight'=>$request->weight,
            'user_by'=>auth()->id(),
        ];
        Product::create($insert);
        return response(['success'=>'Product Name.'.$request->name.' has been added.'],200);
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
        $data['product']=Product::find($id);
        return view('product.productedit')->with($data);
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
        $product = Product::find($id);
        $data=$request->except('_token','add');
        $product->update($data);
        return redirect(route('Product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return response(['success'=>'Product has been removed.'],200);
    }
}

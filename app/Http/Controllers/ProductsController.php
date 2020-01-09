<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use App\Http\Requests\ProductStore;
use Image;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['edit','create','update','destroy']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $category = Category::all();

        if(isset(\request()->category_id)){
            $product=Product::whereCategory_id(\request()->category_id)->get();
        }

        return view('user.index', compact('product', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        $categories = Category::all();
        $user = User::findorfail($user_id);

        return view('product.create', compact('categories', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStore $request)
    {
        $data=$request->all();
        $data['user_id']=auth()->user()->id;
        if($request->hasFile('pictures') != ''){
            $img_names=[];
            $files=$request->file('pictures');
            foreach ($files as $file){
                $img=Image::make($file);
                $path=public_path('images/products_images');
                $img_name=time().'_'.$file->getClientOriginalName();
                $img->save($path.'/'.$img_name);
                $img_names[]=$img_name;
            }
            $img_names=json_encode($img_names);
        }
        $data['pictures']=$img_names;
        Product::create($data);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $id)
    {
        return view('user.show', ['product'=>$id]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $id)
    {
        return view('user.edit', ['product'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStore $request, $id)
    {
        $product = Product::findorfail($id);
        $product->update($request->all());

        return redirect('/products/' . $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findorfail($id);

        $product->delete();

        return redirect('/');
    }
}

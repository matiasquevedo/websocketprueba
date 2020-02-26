<?php

namespace App\Http\Controllers;

use App\Product;
use App\Commerce;
use App\Imagem;
use Image;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($commerceSlug)
    {
        //
        $commerce = Commerce::findBySlug($commerceSlug);
        $products = Product::where('commerce_id',$commerce->id)->get();
        return view('commerce.product.index')->with('products',$products)->with('commerce',$commerce);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($commerceSlug)
    {
        //
        $commerce = Commerce::findBySlug($commerceSlug);
        $categories = $commerce->categories->pluck('name','id');
        // dd($categories);
        return view('commerce.product.create')->with('categories',$categories)->with('commerce',$commerce);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $commerceSlug)
    {
        //
        // dd($request, $commerceSlug);
        $product = new Product($request->all());

        $s = 0.00;
        $s = $request->precio - (($request->precio*$request->descuento)/100);
        $product->precioDescuento = $s;


        $product->save();
        $ratio = 0;

        if($request->file('image')){

            $originalImage= $request->file('image');

            $thumbnailImage = Image::make($originalImage);
            $output_file = 'img/products/product-'.$product->slug.'_'.time().$originalImage->getClientOriginalName();
            $output_file_thumb = 'img/products/thumbnail/product-'.$product->slug.'_'.time().$originalImage->getClientOriginalName();
            // $thumbnailImage->save($output_file);


            Storage::disk('public')->put($output_file, (string) $thumbnailImage->encode());
            // (comentado desde antes)$thumbnailImage->resize(150,150);
            // (comentado desde antes)prevent possible upsizing
            $imgSize=getimagesize($originalImage);
            $imgWidth = $imgSize['0'];
            $imgheight = $imgSize['1'];
            //verificar el cateto menor
            if($imgWidth < $imgheight){
              $ratio = (int) round(($imgWidth-1));
            }elseif($imgWidth > $imgheight){
              $ratio = (int) round(($imgheight-1));
            }elseif($imgWidth == $imgheight){
              $ratio = (int) round(($imgWidth-1));
            }
            $px = (int) round(($imgWidth/2)-($ratio/2));
            $py = (int) round(($imgheight/2)-($ratio/2));
            $thumbnailImage->crop($ratio,$ratio,$px,$py);
            $thumbnailImage->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            // (comentado desde antes)$thumbnailImage->resize(null, 200, function ($constraint) {
            // (comentado desde antes)    $constraint->aspectRatio();
            // (comentado desde antes)    // $constraint->upsize();
            // (comentado desde antes)});
            Storage::disk('public')->put($output_file_thumb, (string) $thumbnailImage->encode());

        }
        //17:28

        

        $image = new Imagem();
        $image->image = $output_file;
        $image->thumb = $output_file_thumb;
        $image->imagetable()->associate($product);
        $image->save();

        flash('Se ha añadido el producto: '.$product->title)->success();
        return redirect()->route('product.index',$commerceSlug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($commerceSlug, $productSlug)
    {
        //
        $commerce = Commerce::findBySlug($commerceSlug);
        $product = Product::findBySlug($productSlug);
        // dd($commerce, $product);
        return view('commerce.product.show')->with('product',$product)->with('commerce',$commerce);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($commerceSlug, $productSlug)
    {
        //
        $product = Product::findBySlug($productSlug);
        $image = Imagem::find($product->image->id);
        // dd($productSlug, $product, $image);
        flash('Se ha eliminado el producto '.$product->title)->error();
        Storage::disk('public')->delete($image->image);
        Storage::disk('public')->delete($image->thumb);
        $image->delete();
        $product->delete();
        return redirect()->back();
    }
}

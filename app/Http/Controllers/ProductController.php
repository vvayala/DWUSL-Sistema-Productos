<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index(){
    $products = Product::select("productos.codigo", "productos.nombre","productos.precio","marcas.nombre as marca_nombre")
      ->join("marcas", "marcas.codigo", "=", "productos.marca")
      ->get();

      return view('/products/show')->with(['products' => $products]);
  }

  public function create(){
    $brands = Brand::all();
    return view('/products/create')->with(['brands' => $brands]);
  }

  public function store(Request $request){
    $data = request()->validate([
      'nombre' => 'required',
      'precio' => 'required',
      'marca' => 'required'
    ]);

    Product::create($data);

    return redirect('/products/show');
  }

  public function edit(Product $product){
    $marcas = Brand::all();

    return view('/products/update')->with(['product' => $product, 'brands' => $marcas]);
  }

  public function update(Request $request, Product $product){
    $data = request()->validate([
      'nombre' => 'required',
      'precio' => 'required',
      'marca' => 'required'
    ]);

    $product->nombre = $data['nombre'];
    $product->precio = $data['precio'];
    $product->marca = $data['marca'];
    $product->updated_at = now();
    $product->save();

    return redirect('/products/show');
  }

  public function destroy($id){
    Product::destroy($id);

    return response()->json(array('res' => true));
  }
  
  }

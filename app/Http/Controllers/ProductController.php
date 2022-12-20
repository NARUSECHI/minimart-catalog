<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;

class ProductController extends Controller
{
    private $product;
    private $section;

    public function __construct(Product $product,Section $section)
    {
        $this->product = $product;
        $this->section = $section;
    }

    public function index()
    {
        $all_products = $this->product->get();
        return view('products.index')->with('all_products',$all_products);
    }

    public function create()
    {
        $all_sections = $this->section->get();
        return view('products.create')->with('all_sections',$all_sections);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:1|max:50',
            'description'=>'required|min:1|max:200',
            'price'=>'required|numeric',
            'section_id'=>'required'
        ]);

        $this->product->name   =  $request->name;
        $this->product->description  =  $request->description;
        $this->product->price = $request->price;
        $this->product->section_id = $request->section_id;

        $this->product->save();
        return redirect()->route('index');
    }

    public function edit($id)
    {
        $product = $this->product->findOrFail($id);
        $all_sections = $this->section->get();
        return view('products.edit')->with('product',$product)->with('all_sections',$all_sections);       
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|min:1|max:50',
            'description'=>'required|min:1|max:200',
            'price'=>'required|numeric',
            'section_id'=>'required'
        ]);

        $product = $this->product->findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->section_id = $request->section_id;

        $product->save();
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $this->product->destroy($id);
        return redirect()->back();        
    }
}

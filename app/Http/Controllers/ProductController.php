<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    const LOCAL_STORAGE_FOLDER = "public/images/";
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
            'section_id'=>'required',
            'image'=>'mimes:jpg,png,jpeg,gif|max:1048'
        ]);

        $this->product->name   =  $request->name;
        $this->product->description  =  $request->description;
        $this->product->price = $request->price;
        $this->product->section_id = $request->section_id;
        if($request->image)
        {
            $this->product->image = $this->saveImage($request);
        }
       
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
            'section_id'=>'required',
            'image'=>'mimes:jpg,png,jpeg,gif|max:1048'
        ]);

        $product = $this->product->findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->section_id = $request->section_id;
        if($request->image)
        {
            if($product->image)
            {
                $this->deleteImage($product->image);
            }
            $product->image = $this->saveImage($request);
        }

        $product->save();
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);
      
        $this->deleteImage($product->image);
        
        $product->delete();
        return redirect()->back();   
    }

    private function saveImage($request)
    {
        $image_name = time().".".$request->image->extension();
        $request->image->storeAs(self::LOCAL_STORAGE_FOLDER,$image_name);

        return $image_name;
    }

    private function deleteImage($image_name)
    {
        $image_path = self::LOCAL_STORAGE_FOLDER . $image_name;

        if(Storage::disk('local')->exists($image_path))
        {
            Storage::disk('local')->delete($image_path);
        }
    }

    public function Search(Request $request)
    {
        $products = $this->product->where('name','like','%'.$request->search.'%')->get();
        return view('products.search')->with('products',$products)->with('search',$request->search);
    }
}

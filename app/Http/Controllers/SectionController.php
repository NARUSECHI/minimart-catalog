<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    private $section;

    public function __construct(Section $section)
    {
        $this->section = $section;
    }

    public function index()
    {
        $all_sections = $this->section->get();
        return view('sections.index')->with('all_sections',$all_sections);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name'=>'required|min:1|max:50'
        ]);

        $section = $this->section;
        $section->name = $request->name;
        $section->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->section->destroy($id);
        return redirect()->back();
    }

    
}

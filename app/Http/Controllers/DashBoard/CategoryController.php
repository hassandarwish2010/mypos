<?php

namespace App\Http\Controllers\DashBoard;
use Session;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories=Category::when($request->search,function($q) use($request){
            return $q->where('name','like','%'.$request->search.'%');
        })->latest()->paginate(5);
//dd($categories);
        return view('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate([
            'ar.*' => 'required|unique:category_translations,name',
        ]);
    Category::create($request->all());

        Session::flash('success','data inserted sucessfly');
   
        return redirect()->route('dashbord.categories.index');
    }//end of store


    public function edit(Category $category)
    {
        
   return view('dashboard.categories.edit',compact('category'));

    }//end of edit

    public function update(Request $request, Category $category)
    {
    $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
        ]);
    $category->update($request->all());

        Session::flash('success','data updated sucessfly');
   
        return redirect()->route('dashbord.categories.index');
    }//end of update


    public function destroy(Category $category)
    {
        $category->delete();
                Session::flash('success','data deleted sucessfly');
   
        return redirect()->route('dashbord.categories.index');
    }//end of destroy
}

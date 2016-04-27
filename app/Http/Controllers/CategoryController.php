<?php

namespace App\Http\Controllers;

use App\Category;
use App\Log;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.category.index', ['categories' => $categories]);
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect('/admin/category')->with('message', 'Kategorie wurde erfolgreich hinzugefügt');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', ['category' => $category]);
    }

    public function update($id, Request $request) {
        $category = Category::findOrfail($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect('/admin/category')->with('message', 'Kategorie wurde erfolgreich bearbeitet');
    }
}

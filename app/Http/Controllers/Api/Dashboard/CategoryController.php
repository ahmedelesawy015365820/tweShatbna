<?php

namespace App\Http\Controllers\Api\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProjectsManagement\CategoryRequest;
use App\Models\Category;
use App\Traits\Message;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use Message;

    public function index(Request $request)
    {
        $categories = Category::
        when($request->search,function($q) use($request){
            $q->whereRelation('translations','name','like','%'.$request->search.'%');
        })->latest()->paginate(5);
        return $this->sendResponse(['categories' => $categories],'Data exited successfully');
    }

    public function getAllCategories()
    {
        $categories = Category::all();
        return $this->sendResponse(['categories' => $categories],'Data exited successfully');
    }


    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return $this->sendResponse([],'Data exited successfully');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return $this->sendResponse(['category' => $category],'Data exited successfully');
    }


    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($request->id);
        $category->update($request->validated());
        $category->save();
        return $this->sendResponse([],'Data exited successfully');
    }

    public function destroy($id)
    {

        $category = Category::findOrFail($id);
        $category->delete();
        return $this->sendResponse([],'Deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Issue;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // CategoryController.php

    /*public function index()
    {
        $categories = Category::with('issues')->orderBy('created_at', 'desc')->get();

        return view('issues.issue_index', compact('categories'));
    }*/

    public function index()
    {
        $categories = Category::withCount(['issues' => function ($query) {
            $query->withFilters(
                request()->input('categories', []),
            );
        }])
        ->get();

        return CategoryResource::collection($categories);
    }


    public function showCategoryIssues(Request $request)
    {
        $categoryId = $request->input('category');
        $issues = Issue::where('category_id', $categoryId)->get();

        return view('issues.issue_index', compact('issues')); compact('issues');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

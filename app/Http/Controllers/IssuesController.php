<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::orderBy('created_at','desc')->get();
        return view('issues.issue_index')->with('issues',$issues);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('issues.issue_create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $requestData = array_merge($request->all(), ['user_id' => $userId]);
        Issue::create($requestData);
        return redirect()->route('issues.index');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //return $id;
        $issue = Issue::find($id);
        $comments = $issue-> comments;
        $user = auth()->user();
        return view('issues.issues_show', compact('issue', 'comments','user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $issue = Issue::find($id);
        //return response()->json($issue);
        return view('issues.issue_edit')->with('issue', $issue);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //找到要update的issue_id
        $issue = Issue::find($id);
        //把取得data update to DB
        $issue->update($request->all());
        return view('issues.issues_show')->with('issue', $issue);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Issue::destroy($id);
        return redirect(to:'/');
    }
}

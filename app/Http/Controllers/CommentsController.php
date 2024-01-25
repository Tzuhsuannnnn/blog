<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        
        //Comment::create($request->all());
       

        // 取得當前用戶名稱
        $userName = auth()->user()->name;
        $userEmail = auth()->user()->email;

        // 在 request 數組中添加 'name' 屬性
        $requestData = array_merge($request->all(), ['name' => $userName],['email' => $userEmail]);

        // 使用合併後的 request 數組創建 Comment
        Comment::create($requestData);

        // 返回上一頁
        return back();



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

<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Http\Requests\StoreNovelRequest;
use App\Http\Requests\UpdateNovelRequest;
use Illuminate\Http\Request;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $novel = Novel::all();

        return response()->json($novel);
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
        $novel = new Novel;
        $novel->title = $request->title;
        $novel->author = $request->author;
        $novel->genre = $request->genre;
        $novel->image = $request->image;
        $novel->description = $request->description;
        $novel->save();
        return response()->json(
            [
                "message" => "Novel record created"
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $novel = Novel::find($id);
        if (!empty($novel)) {
            return response()->json($novel);
        } else {
            return response()->json(
                [
                    "message" => "Novel not found"
                ],
                404
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Novel $novel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (Novel::where('id', $id)->exists()) {
            $novel = Novel::find($id);
            $novel->title = is_null($request->title) ? $novel->title : $request->title;
            $novel->author = is_null($request->author) ? $novel->author : $request->author;
            $novel->genre = is_null($request->genre) ? $novel->genre : $request->genre;
            $novel->image = is_null($request->image) ? $novel->image : $request->image;
            $novel->description = is_null($request->description) ? $novel->description : $request->description;
            $novel->save();

            return response()->json(
                [
                    "message" => "Novel record updated successfully"
                ],
                200
            );
        } else {
            return response()->json(
                [
                    "message" => "Novel not found"
                ],
                404
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Novel::where('id', $id)->exists()) {
            $novel = Novel::find($id);
            $novel->delete();

            return response()->json(
                [
                    "message" => "Novel record deleted"
                ],
                202
            );
        } else {
            return response()->json(
                [
                    "message" => "Novel not found"
                ],
                404
            );
        }
    }
}

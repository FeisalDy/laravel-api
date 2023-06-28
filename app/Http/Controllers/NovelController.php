<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Http\Requests\StoreNovelRequest;
use App\Http\Requests\UpdateNovelRequest;
use Illuminate\Http\Request;
use App\Http\Resources\NovelCollection;
use App\Http\Resources\NovelResource;
use Illuminate\Validation\Rule;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new NovelCollection(Novel::all());
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
        $this->validate($request, [
            'title' => ['required', 'unique:novels,title', 'max:255'],
            'description' => ['required'],
            'author' => ['required'],
            'genre' => ['nullable'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images');
            $imagePath = str_replace('public/', '', $imagePath);

            $novel = Novel::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'author' => $request->input('author'),
                'genre' => $request->input('genre'),
                'image' => $imagePath,
            ]);

            return (new NovelResource($novel))->response()->setStatusCode(201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Novel $novel)
    {
        return (new NovelResource($novel))->response()->setStatusCode(200);
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
    public function update(Request $request, Novel $novel)
    {
        $this->validate($request, [
            'title' => ['sometimes', 'max:255', Rule::unique('novels')->ignore($novel->title, 'title')],
            'description' => ['sometimes'],
            'author' => ['sometimes'],
            'genre' => ['sometimes'],
            'image' => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $imagePath = $novel->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images');
            $imagePath = str_replace('public/', '', $imagePath);
        }

        $novel->fill($request->all()); // Fill the model with all request data
        $novel->image = $imagePath; // Set the updated image path

        $novel->save();

        return (new NovelResource($novel))->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Novel $novel)
    {
        $novel->delete();

        return response()->json(null, 204);
    }
}

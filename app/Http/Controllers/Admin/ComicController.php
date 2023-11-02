<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Support\Facades\Storage;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('admin.comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        if ($request->has('thumb')) {
            $file_path = Storage::put('comics_thumbs', $request->thumb);
            $data['thumb'] = $file_path;
        }
        
        /*$newComic = new Comic();
        $newComic->title = $request->title;
        $newComic->price = $request->price;
        $newComic->thumb = $file_path;
        $newComic->save();*/

        $comic = Comic::create($data);

        return to_route('comics.show', $comic);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        //dd($comic);
        return view('admin.comics.details', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('admin.comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        //dd($request->all());
        $data = $request->all();

        if ($request->has('thumb') && $comic->thumb) {

            Storage::delete($comic->thumb);

            $newImageFile = $request->thumb;
            $path = Storage::put('sabers_images', $newImageFile);
            $data['thumb'] = $path;
        }

        $comic->update($data);
        return to_route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;


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
    public function store(StoreComicRequest $request)
    {
        //$data = $request->all();
        $validate_data = $request->validated();
        
        if ($request->has('thumb')) {
            $file_path = Storage::put('comics_thumbs', $request->thumb);
            //$data['thumb'] = $file_path;
            $validate_data['thumb'] = $file_path;
        }
        
        /*$newComic = new Comic();
        $newComic->title = $request->title;
        $newComic->price = $request->price;
        $newComic->thumb = $file_path;
        $newComic->save();*/

        $comic = Comic::create($validate_data);

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
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        //dd($request->all());
        //$data = $request->all();
        $validate_data = $request->validated();

        if ($request->has('thumb') && $comic->thumb) {

            Storage::delete($comic->thumb);

            $newImageFile = $request->thumb;
            $path = Storage::put('comics_thumbs', $newImageFile);
            //$data['thumb'] = $path;
            $validate_data['thumb'] = $path;
        }

        $comic->update($data);
        return to_route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        if (!is_null($comic->thumb)) {
            Storage::delete($comic->thumb);
        }
        $comic->delete();
        return to_route('comics.index')->with('message', 'Il fumetto è stato eliminato correttamente ✅');
    }
}

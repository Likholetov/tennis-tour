<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryStoreRequest;
use App\Http\Requests\GalleryUpdateRequest;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $galleries = Gallery::simplePaginate(10);

        return view('gallery.index', compact('galleries'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('gallery.create');
    }

    /**
     * @param \App\Http\Requests\GalleryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryStoreRequest $request)
    {
        $gallery = Gallery::create($request->validated());

        $i = 1;

        if ($request->hasFile('images')) {
            foreach ($request->images as $key => $image) {
                $image_name = time() . rand(000,999) . "." . $image->getClientOriginalExtension();

                $image->storeAs('images/galleries/' . $gallery->id, $image_name, 'public');

                $image = Image::create([
                    'order' => $i,
                    'gallery_id' => $gallery->id,
                    'img_url' => "/storage/images/galleries/" . $gallery->id . "/" . $image_name
                ]);

                $i++;
            }
        }

        //$request->session()->flash('gallery.id', $gallery->id);

        return redirect()->route('gallery.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Gallery $gallery)
    {
        return view('gallery.show', compact('gallery'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

    /**
     * @param \App\Http\Requests\GalleryUpdateRequest $request
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryUpdateRequest $request, Gallery $gallery)
    {
        $gallery->update($request->validated());

        $i = $gallery->images->count();

        if ($request->hasFile('images')) {
            foreach ($request->images as $image) {
                $image_name = time() . rand(000,999) . "." . $image->getClientOriginalExtension();

                $image->storeAs('images/galleries/' . $gallery->id, $image_name, 'public');

                $image = Image::create([
                    'order' => $i,
                    'gallery_id' => $gallery->id,
                    'img_url' => "/storage/images/galleries/" . $gallery->id . "/" . $image_name
                ]);

                $i++;
            }
        }

        //$request->session()->flash('gallery.id', $gallery->id);

        return redirect()->route('gallery.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Gallery $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Gallery $gallery)
    {
        $gallery->delete();

        Image::where('gallery_id', $gallery->id)->delete();

        if (Storage::exists('public/images/galleries/' . $gallery->id)) {
            Storage::deleteDirectory('public/images/galleries/' . $gallery->id);
        }

        return redirect()->route('gallery.index');
    }
}

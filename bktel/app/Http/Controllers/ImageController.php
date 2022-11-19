<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StoreImage;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    private $image;
    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function getImages()
    {
        return view('images.images')->with('images', auth()->user()->images);
    }

    public function postUpload(StoreImage $request)
    {
        $path = Storage::disk('s3')->put('images/originals', $request->file, 'public');
        $request->merge([
            'size' => $request->file->getClientSize(),
            'path' => $path
        ]);
        $this->image->create($request->only('path', 'title', 'size'));
        return back()->with('success', 'Image Successfully Saved');
    }
}


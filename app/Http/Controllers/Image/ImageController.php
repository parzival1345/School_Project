<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function create_image(Request $request)
    {
        $image = Image::create([
            'image' => $request->image->getClientOriginalName(),
        ]);
        $image->addMediaFromRequest('image')->toMediaCollection();
        return response()->json([
            'status' => true,
            'message' => 'image has been added'
        ]);
    }

    public function update_image(Request $request, $id)
    {
        $image = Image::find($id);
        $image->clearMediaCollection();
        $image->delete();
        $image->create([
            'image' => $request->image->getClientOriginalName(),
        ]);
        $image->addMediaFromRequest('image')->toMediaCollection();

        return response()->json([
            'status' => true,
            'message' => 'image has been updated'
        ]);
    }

    public function destroy($id)
    {
        if (Image::find($id) == null) {
            return response()->json([
                'status' => false,
                'message' => 'There is no such photo to delete'
            ]);
        }
        $image = Image::find($id);
        $image->clearMediaCollection('default');
        $image->delete();

        return response()->json([
            'status' => true,
            'message' => 'image has been deleted'
        ]);
    }

    public function show()
    {
        $images = Image::all();
        return response()->json([
            'status' => true,
            'images' => $images,
        ]);
    }

}

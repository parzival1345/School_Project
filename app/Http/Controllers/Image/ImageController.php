<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function create_image(Request $request) {

        $image = Image::create([
            'image' => $request->image->getClientOriginalName(),
        ]);
        $image ->addMediaFromRequest('image')->toMediaCollection();
        return response()->json([
            'status' => true,
            'message' => 'image has been added'
        ]);
    }
    public function update_image(Request $request , $id) {
        $image = Image::find($id);
        $image->clearMediaCollection('default');
        $image->addMediaFromRequest('image')->toMediaCollection();
        $image->update([
            'image' => $request->image->getClientOriginalName(),
        ]);
        return response()->json([
            'status' => true,
            'message' => 'image has been updated'
        ]);
    }

    public function destroy($id) {
        $image = Image::find($id);
        $image->clearMediaCollection('default');
        $image->delete();

        return response()->json([
            'status' => true,
            'message' => 'image has been deleted'
        ]);
    }

}

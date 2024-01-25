<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /*
     * image for user
     */
    public function image(Request $request, $id) {
        $user = User::find($id);
        $user->addMediaFromRequest('image')->toMediaCollection();
        $user->update([
            'image' => $request->image->getClientOriginalName(),
        ]);
        return response()->json([
            'status' => true,
            'message' => 'image has been added'
        ]);
    }
    /*
     * image for page of the image
     */
}

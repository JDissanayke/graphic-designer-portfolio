<?php

namespace App\Http\Controllers;



use App\Models\Works;
use App\Models\WorksDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class sotri8controller extends Controller
{
    public function Home()
    {

        $workItems = Works::with('details')->where('status', 'public')->get();
        return view('front-view.index', compact('workItems'));
    }


    public function aboutUs()
    {


        return view('front-view.about_us');
    }
    public function Protfolio()
    {

        $workItems = Works::with('details')->get();
        return view('front-view.pages.protfolio', compact('workItems'));
    }



    //admin works add ..........................................................................
    public function destroy($id)
    {

        $post = Works::findOrFail($id);

        // Delete image file if exists
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        // Delete the post
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully.']);

    }

    //work details delete ...............................................................................


    public function deleteWorkDetail(Request $request)
    {
        try {
            $detail = WorksDetails::findOrFail($request->id);

            // Check if the field exists and delete its value
            if (!empty($detail->{$request->field})) {
                if ($request->field === 'image1' || $request->field === 'image2' || $request->field === 'image3') {
                    // Delete the file from storage if it's an image
                    Storage::disk('public')->delete($detail->{$request->field});
                }

                $detail->{$request->field} = null; // Set the field value to null
                $detail->save();

                return response()->json(['message' => 'Deleted successfully!']);
            }

            return response()->json(['message' => 'Field is already empty.'], 400);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

}

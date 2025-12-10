<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Works;
use App\Models\WorksDetails;
use Illuminate\Http\Request;
use Flasher\Prime\Storage\Storage;
use Illuminate\Support\Facades\Auth;

class Stori8AdminController extends Controller
{
    public function Login()
    {


        return view('admin/views/login');
    }
    public function doLogin(Request $request)
    {

        // dd($request);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to admin dashboard
            return redirect()->route('admin');
        }

        // Authentication failed, redirect back with an error
        return redirect()->route('Login')->withErrors(['email' => 'Invalid credentials']);
    }


    public function logout()
    {

        Auth::logout();
        return redirect()->route('Login'); // Redirect to login page after logout
    }



    public function Admin()
    {
        $todayUsersCount = User::count(); // Count users registered today
        $totalPostsCount = Works::count(); // Count total posts

        return view('admin/views/index', compact('todayUsersCount', 'totalPostsCount'));
    }

    public function PostCreate()
    {


        return view('admin/views/post_create');
    }


    public function AddDetails()
    {


        return view('admin/views/post_details_add');
    }


    public function poststore(Request $request)
    {


        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'status' => 'required|in:public,private',
        ]);

        // Get the original file name and append the current timestamp to it
        // $originalFileName = $request->file('image')->getClientOriginalName();
        $timestamp = now()->format('YmdHis'); // Current date and time
        $fileName = '_' . $timestamp . '.' . $request->file('image')->getClientOriginalExtension();
        // Store the image in the 'uploads' directory within the public disk
        $imagePath = $request->file('image')->storeAs('uploads', $fileName, 'public');

        // Create the work item
        $workItem = Works::create([
            'title' => $request->input('title'),
            'image' => $imagePath,
            'status' => $request->input('status'),
        ]);

        // Create empty details entry
        WorksDetails::create(['post_id' => $workItem->id]);




        return response()->json(['message' => 'Post deleted successfully.']);
    }



    //fetch all post

    public function fetchAllposts()
    {

        $posts = Works::all();

        $response = '';


        if ($posts->count() > 0) {

            $response .= "
         <table id='myTable' class='display mb-4'>
            <thead>
                <tr>
                    <th>Post title</th>
                    <th>image</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>";

            foreach ($posts as $post) {
                $response .= "
                <tr>
                    <td>" . $post->title . "</td>
                   <td><img src='" . asset('storage/' . $post->image) . "' alt='Post Image' class='img-fluid' width='50'></td>


                    <td>
                    <select class='form-select form-select-sm' data-id=" . $post->id . ">
                        <option value='public' " . ($post->status == 'public' ? 'selected' : '') . ">Public</option>
                        <option value='private' " . ($post->status == 'private' ? 'selected' : '') . ">Private</option>
                    </select>
                </td>


                    <td> <button type='delete' class=' btn btn-outline-danger delete-post' data-id=" . $post->id . " ><i class='bi bi-trash'></i></button></td>

                </tr>";
            }

            $response .= "
            </tbody>
        </table>";

            echo $response;
        } else {
            echo "<h3 align='center'>no recode </h3>";
        }
    }

    //status update post
    public function updateStatus(Request $request, $id)
    {
        try {
            $post = Works::findOrFail($id); // Fetch the post by ID
            $post->status = $request->status; // Update status
            $post->save(); // Save changes

            return response()->json(['message' => 'Status updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update status.'], 500);
        }
    }


    //fetch work deatis
    public function fetchDetails()
    {

        $details = WorksDetails::with('workItem')->get(); // Eager load the workItem relationship

        $response = '';

        $response .= "
        <div class='mb-4 mt-5'>
        <table id='DetailsTable'  >
            <thead>
                <tr>
                    <th width='100'>Post title</th>
                    <th width='100'>Second title</th>
                    <th width='250'>Description</th>
                    <th width='200'>img 01</th>
                    <th width='200'>img 02</th>
                    <th width='200'>img 03</th>
                    <th width='200'>link 01</th>
                    <th width='200'>link 02</th>
                    <th width='200'>link 03</th>
                </tr>
            </thead>
        <tbody>";

        foreach ($details as $detail) {
            $response .= "
            <tr>
                <td>" . ($detail->workItem->title ?? 'N/A') . "</td> <!-- Access workItem->id here -->

              <form id='work_Details_Form' enctype='multipart/form-data'>


                <td >";
            if ($detail->second_title) {
                $response .= "
                     $detail->second_title
                    <a class='link-danger second_title-delete-button detail-delete-button' data-id='{$detail->id}' data-field='second_title'><i class='bi bi-trash'></i></a>";
            } else {
                $response .= "
                    <input type='text' class='form-control second-title-input' placeholder='Second Title'>
                    <a class='link-success second_title-add-button' data-id='{$detail->id}' data-field='second_title'><i class='bi bi-plus-square'></i></a>";
            }
            $response .= "</td>
                <td >";
            if ($detail->Description) {
                $response .= "
                     $detail->Description
                    <a class='link-danger Description-delete-button detail-delete-button' data-id='{$detail->id}' data-field='Description'><i class='bi bi-trash'></i></a>";
            } else {
                $response .= "
                    <textarea  class='form-control description-input' placeholder='Description'></textarea>
                    <a class='link-success Description-add-button' data-id='{$detail->id}' data-field='description'><i class='bi bi-plus-square'></i></a>";
            }
            $response .= "</td>";

            foreach (['image1', 'image2', 'image3'] as $imageField) {
                $response .= "<td>";
                if ($detail->$imageField) {
                    $response .= "
                    <img src='" . asset('storage/' . $detail->$imageField) . "' alt='Image' width='50'>
                    <a class='link-danger detail-delete-button' data-id='{$detail->id}' data-field='{$imageField}'><i class='bi bi-trash'></i></a>";
                } else {
                    $response .= "
                    <input type='file' class='form-control image-input' data-field='{$imageField}'>
                    <a class='link-success {$imageField}-add-button' data-id='{$detail->id}' data-field='{$imageField}'><i class='bi bi-plus-square'></i></a>";
                }
                $response .= "</td>";
            }

            foreach (['link1', 'link2', 'link3'] as $linkField) {
                $response .= "<td>";
                if ($detail->$linkField) {
                    $response .= "
                    <a href='{$detail->$linkField}' target='_blank'>{$detail->$linkField}</a>
                    <a class='link-danger detail-delete-button detail-delete-button' data-id='{$detail->id}' data-field='{$linkField}'><i class='bi bi-trash'></i></a>";
                } else {
                    $response .= "
                    <input type='url' class='form-control link-input' placeholder='Link' data-field='{$linkField}'>
                    <a class='link-success {$linkField}-add-button' data-id='{$detail->id}' data-field='{$linkField}'><i class='bi bi-plus-square'></i></a>";
                }
                $response .= "</form</td>";
            }
            $response .= "</tr>";
        }

        $response .= "
        </tbody>
        </table></div>";

        echo $response;
    }

    //add work details data................................................................

    public function addWorkDetails(Request $request)
    {
        try {
            $detail = WorksDetails::findOrFail($request->id);

            // Handle file uploads
            if ($request->hasFile('value')) {
                $file = $request->file('value');
                $fileName = time() . '_' . $request->field . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('uploads', $fileName, 'public');
                $detail->{$request->field} = $filePath;
            } else {
                // Handle text or URL inputs
                $detail->{$request->field} = $request->value;
            }

            $detail->save();

            return response()->json(['message' => 'Added successfully!']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }








}

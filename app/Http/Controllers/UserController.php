<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Works;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function User(){


        return view('admin/views/User');

        }



        //ferch User
        public function fetchAlluser(){


            $users=User::all();

            $response = '';




                $response .= "
             <table id='UserTable' class='display mb-4'>
              <button class='btn btn-success mb-3 Add-User'><i class='bi bi-plus'></i>Add User</button>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>";

                foreach ($users as $user) {
                    $response .= "
                    <tr>
                        <td>" . $user->name . "</td>
                        <td>". $user->email ."</td>
                        <td>
                        <a  class=' link-success ' data-id=" . $user->id . " ><i class='bi bi-pencil-square'></i></i></a>
                        <a  class=' link-danger delete-user-btn' data-id=" . $user->id . " ><i class='bi bi-trash'></i></a>

                        </td>

                    </tr>";
                }

                $response .= "
                </tbody>
            </table>";

                echo $response;
            }



        public function AddUser(Request $request){

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email', // Ensure email is unique in the users table
                'password' => 'required|string|min:6', // Password must be at least 6 characters
            ]);

            try {
                // Create a new user
                $user = User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')), // Hash the password before storing
                ]);

                return response()->json([
                    'message' => 'User added successfully!',
                    'user' => $user,
                ], 201);
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'An error occurred while adding the user.',
                    'error' => $e->getMessage(),
                ], 500);
            }
        }

        public function deleteUser(Request $request)
        {
            // Validate the incoming request
            $request->validate([
                'user_id' => 'required|exists:users,id', // Ensure the user_id exists in the users table
            ]);

            try {
                // Find the user by ID
                $user = User::findOrFail($request->input('user_id'));

                // Delete the user
                $user->delete();

                return response()->json([
                    'message' => 'User deleted successfully!',
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'An error occurred while deleting the user.',
                    'error' => $e->getMessage(),
                ], 500);
            }
        }



    }



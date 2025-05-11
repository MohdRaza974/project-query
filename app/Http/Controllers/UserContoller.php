<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserContoller extends Controller
{
    public function showUsers()
    {
        $users = DB::table('users')
        ->paginate(4);
        // return $users;

        return view('users', ['data' => $users]);
    }

    public function singleUser($id)
    {
        $users = DB::table('users')->where('id', $id)->get();
        return view('user', ['data' => $users]);
    }

    public function addUser(Request $request)
    {
        $user = DB::table('users')->insert(
            [
                'name' => $request->name,
                'age' => $request->age,
                'email' => $request->email,
                'city' => $request->city
            ]
        );
        if ($user) {
            return redirect()->route('users');
            // echo "<h1>Data Added Successfully!</h1>";
        } else {
            echo "<h1>Error Inserting Data!</h1>";
        }
    }

    public function updateUser(Request $request, $id)
    {
        $user = DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'city' => $request->city
        ]);

        if ($user) {
            return redirect()->route('users');
            // echo "<h1>Data Updated Successfully!</h1>";
        } else {
            echo "<h1>Error while Updating Data!</h1>";
        }
    }

    public function updatePage(string $id)
    {
        $user = DB::table('users')->find($id);
        // return $user;
        return view('update', ['data' => $user]);
    }

    public function deleteUser(string $id)
    {
        $user = DB::table('users')->where('id', $id)->delete();

        if ($user) {
            return redirect()->route('users');
        } else {
            echo "<h1>Error while Deleting Data!</h1>";
        }
    }

    public function deleteAllUsers()
    {
        DB::table('users')->truncate();
        return redirect()->route('users');
    }

    // public function form(){
    //     return view('adduser');
    // }
}

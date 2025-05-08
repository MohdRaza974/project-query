<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserContoller extends Controller
{
    public function showUsers()
    {
        $users = DB::table('users')->get();
        // return $users;

        return view('users', ['data' => $users]);
    }

    public function singleUser($id)
    {
        $users = DB::table('users')->where('id', $id)->get();
        return view('user', ['data' => $users]);
    }

    public function addUser()
    {
        $user = DB::table('users')->upsert(
            [
                'name' => 'Ram Klurai',
                'age' => 20,
                'email' => '123@gmail.com',
                'city' => 'Mumbai',
            ],
            ['email'], ['city']
        );
        dump($user);
        if ($user) {
            echo "<h1>Data Added Successfully!</h1>";
        } else {
            echo "<h1>Error Inserting Data!</h1>";
        }
    }

    public function updateUser() {
        $user = DB::table('users')->where('id', 2)->increment('age');

        if($user){
            echo "<h1>Data Updated Successfully!</h1>";
        } else {
            echo "<h1>Error while Updating Data!</h1>";
        }
    }

    public function deleteUser(string $id) {
        $user = DB::table('users')->where('id', $id)->delete();

        if($user){
            return redirect()->route('users');
        } else {
            echo "<h1>Error while Deleting Data!</h1>";
        }
    }

    public function deleteAllUsers() {
        $user = DB::table('users')->truncate();

        if($user){
            return redirect()->route('users');
        } else {
            echo "<h1>Error while Deleting Data!</h1>";
        }
    }

    // public function form(){
    //     return view('adduser');
    // }
}

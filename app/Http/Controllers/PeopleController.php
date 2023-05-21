<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Contact;

class PeopleController extends Controller
{
    public function createUser()
    {
        return view('addUser')->with('type', 'create');
    }
    public function editUser($id)
    {
        $people = People::where('person_id', $id)->first();
        return view('addUser')->with('type', 'edit')->with('people', $people);
    }
    public function storeUser(Request $request)
    {

        $request->validate([
            'username' =>  ["required", "min:5", "max:50"],
            'email' =>  ["required", "email", "min:3", "max:255"],
        ]);

        if (!empty($request->id)) {

            People::where('person_id', $request->id)->update([
                'name' => $request->username,
                'email' => $request->email,
            ]);

            return redirect()->route('userList')->with('success', 'User Updated Successfully');
        }

        $new = new  People();
        $new->name = $request->username;
        $new->email = $request->email;
        $new->save();


        return redirect()->route('userList')->with('success', 'User Created Successfully');
    }
    public function userList()
    {
        $people = People::orderBy('created_at', 'desc')->get();
        return view('userList')->with('people', $people);
    }
    public function userView($id)
    {
        $people = People::where('person_id', $id)->with('contactData')->first();
        return view('userView')->with('people', $people);

    }
    public function deleteUser($id)
    {
        People::where('person_id', $id)->delete();
        Contact::where('person_id', $id)->delete();
        return redirect()->route('userList')->with('success', 'User Deleted Successfully');

    }


}

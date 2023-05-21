<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;



class ContactController extends Controller
{

    public function createContact($id)
    {
        return view('contact/addContact')->with('type', 'create')->with('ccode', getCallingCode());
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'phone' =>  ["required", "digits:9", "numeric"]
        ]);

        if (!empty($request->id)) {

            Contact::where('contact_id', $request->id)->update([
                'country_code' =>  $request->ccode,
                'number' => $request->phone,
                'person_id' => $request->person_id,
            ]);

            return redirect()->route('userView', $request->person_id)->with('success', 'Contact Updated Successfully');
        }

        $new = new  Contact();
        $new->country_code = $request->ccode;
        $new->number = $request->phone;
        $new->person_id = $request->person_id;
        $new->save();

        return redirect()->route('userView', $request->person_id)->with('success', 'Contact Created Successfully');
    }

    public function deleteContact($id, $pid)
    {
        Contact::where('contact_id', $id)->delete();
        return redirect()->route('userView', $pid)->with('success', 'Contact Deleted Successfully');
    }
    public function editContact($id)
    {
        $contact = Contact::where('contact_id', $id)->first();
        return view('contact/addContact')->with('type', 'edit')->with('ccode', getCallingCode())->with('contact', $contact);
    }
}

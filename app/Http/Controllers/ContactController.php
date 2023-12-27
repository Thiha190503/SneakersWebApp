<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // contact list
    public function list(){
        $contacts = Contact::get();
        return view('admin.contact.list', compact('contacts'));
    }

    // contact read
    public function read($id) {
        $contact = Contact::where('id',$id)->first();
        return view('admin.contact.read', compact('contact'));
    }

    // contact delete
    public function delete($id) {
        Contact::where('id',$id)->delete();
        return back()->with(['deleteSuccess' => 'Deleted']);
    }
}

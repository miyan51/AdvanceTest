<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    function index()
    {

        return view('contact.index');
    }
    function confirm(StoreContactRequest $request)
    {
        $inputs = $request->all();

        return view('contact.confirm', compact('inputs'));
    }
    function thanks(Request $request)
    {

        $contact = new Contact();
        $contact->fullname = $request->name;
        $contact->gender = $request->gender;
        $contact->email = $request->email;
        $contact->postcode = $request->postcode;
        $contact->address = $request->address;
        $contact->building_name = $request->building_name;
        $contact->opinion = $request->opinion;
        $contact->save();


        return view('contact.thanks');
    }

    function delete($id)
    {
        $data = Contact::find($id);
        $data->delete();
        return redirect('manager');
    }
    function manager(Request $request)
    {
        $query = Contact::query();


        $name = $request->name;
        if (!empty($name)) {
            $query->where('fullname', 'LIKE', "%{$name}%");
        }
        $email = $request->email;
        if (!empty($email)) {
            $query->where('email', 'LIKE', "%{$email}%");
        }

        $gender = $request->gender;
        if (!empty($gender == 1)) {
            $query->where('gender', "1");
        }
        if (!empty($gender == 2)) {
            $query->where('gender', "2");
        }

        $dateBefore = $request->before;
        if (!empty(($dateBefore))) {
            $query->whereDate('created_at', '>', "$dateBefore");
        }

        $dateAfter = $request->after;
        if (!empty(($dateAfter))) {
            $query->whereDate('created_at', '<', "$dateAfter");
        }

        $datas = $query->paginate(10);

        return view('contact.manager', compact('datas'));
    }
}

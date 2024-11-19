<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Services;
use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    public function Home()
    {
        return view('frontend.index');
    }

    public function About()
    {
        return view('frontend.about');
    }

    public function Services()
    {
        //$services = Services::latest()->get();
        $services = Services::all();
        return view('frontend.services', compact('services'));
    }

    public function Properties()
    {
        return view('frontend.properties');
    }

    public function Agents()
    {
        return view('frontend.agents');
    }

    public function Contacts()
    {
        return view('frontend.contacts');
    }

    public function ContactsStore(Request $request)
    {
        $request->validate([
            'name' => 'required|max:32',
            'email' => 'required|email',
            'subject' => 'required|string|required|max:255',
            'message' => 'required|string|required|max:255',
        ]);
        /* $data = new contacts();
         $data->name = $request->input('name');
         $data->email = $request->input('email');
         $data->subject = $request->input('subject');
         $data->message = $request->input('message');
         $data->save();*/

        // Additional logic or redirection after successful data storage

        /* return redirect()->back()->with('success', 'Contacts stored successfully!');*/

        /*$request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        contacts::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,

        ]);
        $notification = array(
            'message' => 'property Type Created Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back('')->with($notification);
        //return redirect()->back()->with('success', 'Contacts stored successfully!');*/


        Post::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        //return redirect()->back()->with('success', 'Contacts stored successfully!');


        $notification = array(
            'message' => 'Contact information stored Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AllContacts()
    {

        $contacts = Post::all();
        return view('backend.pages.contacts.all_contacts', compact('contacts'));
    }

    public function DeleteContacts($id)
    {
        Post::findOrFail($id)->delete();
        $notification = array(
            'message' => 'contacts deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function AllServices()
    {
        //$services = DB::table('services')->get();
        // return view('backend.services.all_services', ['services' => $services]);
        $services = Services::latest()->get();
        return view('backend.services.all_services', compact('services'));
        //return view('backend.services.all_services', ['services' => $services]);
    }

    public function AddServices()
    {
        return view('backend.services.add_services');
    }

    public function StoreServices(Request $request)
    {


        Services::insert([
            'photo' => $request->services_photo,
            'title' => $request->services_title,
            'description' => $request->services_description,

        ]);
        $notification = array(
            'message' => 'Services added Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.services')->with($notification);
    }

    public function DeleteServices($id)
    {
        Services::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Services deleted Succesfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }



}

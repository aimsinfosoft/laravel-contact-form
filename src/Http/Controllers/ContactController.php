<?php
namespace Laracontact\Contactform\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Laracontact\Contactform\Models\contact;
use Illuminate\Support\Facades\Mail;
use Laracontact\Contactform\Mail\contact_mail;
// use App\Mail\ContactMail;
class ContactController extends BaseController
{
    public function showForm()
    {
        return view('contactform::contact.form');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        contact::create($validated);
        
        $admin_email=\config('contactform.admin_email');
        if($admin_email===null || $admin_email===''){ echo 'The value of admin email not set';
        }else
        Mail::to($admin_email)->send(new contact_mail($validated));
        return back()->with('success', 'Your message has been sent successfully!');
    }
}
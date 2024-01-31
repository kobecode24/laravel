<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::get();

        foreach ($contacts as $contact){
            echo $contact->name."<br>";
        }


    }
}

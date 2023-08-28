<?php

namespace App\Http\Controllers;

use App\Models\FrontModels\Contact;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Mail\ContactFormNotification;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {

        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|min:3',
            'prenom' => 'required|min:3',
            'entreprise' => 'required',
            'fonction' => 'required',
            // 'telephone' => 'required|numeric',
            'telephone' => 'required|numeric',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        // Créer une nouvelle instance de modèle Contact
        $contact = new Contact();
        $contact->contact_lastname = $request->nom;
        $contact->contact_firstname = $request->prenom;
        $contact->contact_entreprise = $request->entreprise;
        $contact->contact_function = $request->fonction;
        $contact->contact_phonenumber = $request->telephone;
        $contact->contact_email = $request->email;
        $contact->contact_message = $request->message;

        // Enregistrer le contact dans la base de données
        $contact->save();

        $data = [
            'name' =>  $request->nom,
            'email' => $request->email,
            'function' => $request->fonction,
            'message' => $request->message,
            'phonenumber' => $request->telephone,
        ];

        // Mail::to('marcosmedenou@gmail.com')->send(new ContactFormNotification($data));

        // Rediriger ou renvoyer une réponse
        // return redirect()->back()->with('success', 'Le formulaire de contact a été soumis avec succès !');
        return json_encode('Le formulaire de contact a été soumis avec succès !');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\FrontModels\Newsletters;
use Illuminate\Http\Request;

class NewslettersController extends Controller
{
    


    public function store(Request $request)
    {
     
        // dd($request->newsletter_email);
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'newsletter_email' => 'required|email',
            'newsletter_firstname' => 'required',
            'newsletter_lastname' => 'required',
            'newsletter_function' => 'required',
        ]);

        // Créer une nouvelle instance de modèle Contact
        $newsletters = new Newsletters();
        $newsletters->email = $request->newsletter_email;
        $newsletters->firstname = $request->newsletter_firstname;
        $newsletters->lastname = $request->newsletter_lastname;
        $newsletters->function = $request->newsletter_function;
   
        // Enregistrer la newsletter dans la base de données
        $newsletters->save();

        // Rediriger ou renvoyer une réponse
        // return redirect()->back()->with('success', 'Le formulaire de contact a été soumis avec succès !');
        return json_encode('Le formulaire de newsletter a été soumis avec succès !');
    }
}

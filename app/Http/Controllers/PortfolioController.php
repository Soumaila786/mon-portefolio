<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('home');
    }

    /**
     * Upload de la photo de profil
     * Stocke dans public/images/profile.{ext}
     */
    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => [
                'required',
                'image',
                'mimes:jpeg,png,webp',
                'max:3072', // 3 Mo max
                'dimensions:min_width=100,min_height=100,max_width=4000,max_height=4000',
            ],
        ], [
            'photo.required'   => 'Aucun fichier sélectionné.',
            'photo.image'      => 'Le fichier doit être une image.',
            'photo.mimes'      => 'Formats acceptés : JPG, PNG, WEBP.',
            'photo.max'        => 'La photo ne doit pas dépasser 3 Mo.',
            'photo.dimensions' => 'Dimensions invalides (min 100×100, max 4000×4000).',
        ]);

        $file = $request->file('photo');
        $ext  = strtolower($file->getClientOriginalExtension());

        // Supprimer les anciennes versions (jpg/png/webp)
        foreach (['jpg', 'png', 'webp'] as $old) {
            $oldPath = public_path("images/profile.{$old}");
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        // Créer le dossier si inexistant
        $dest = public_path('images');
        if (!is_dir($dest)) {
            mkdir($dest, 0755, true);
        }

        // Déplacer le fichier
        $file->move($dest, "profile.{$ext}");

        return back()->with('avatar_success', 'Photo de profil mise à jour avec succès !');
    }

    /**
     * Formulaire de contact
     */
    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|min:10',
        ]);

        \Log::info('Contact form:', $validated);

        // Mail::send('emails.contact', $validated, function($mail) use ($validated) {
        //     $mail->to('s.lankoande786@gmail.com')
        //          ->subject('Portfolio - ' . ($validated['subject'] ?? 'Nouveau message'))
        //          ->replyTo($validated['email'], $validated['name']);
        // });

        return back()->with('success', 'Message envoyé avec succès ! Je vous répondrai bientôt.');
    }
}

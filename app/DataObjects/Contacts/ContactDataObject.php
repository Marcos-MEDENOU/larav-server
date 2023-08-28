<?php

declare(strict_types=1);

namespace App\DataObjects\Contacts;

use App\DataObjects\DataObjectContract\DataObjectContract;

use Illuminate\Foundation\Http\FormRequest;

class ContactDataObject implements DataObjectContract {
    public function __construct(
        private readonly string $nom,
        private readonly string $prenom,
        private readonly string $entreprise,
        private readonly string $fonction,
        private readonly int $telephone,
        private readonly string $email,
        private readonly string $message,
        // public readonly Carbon $publishedAt,
    ){}

    public static function make(
        FormRequest $request,
    ): self {
        return new self(
            nom: $request->get(key: 'nom'),
            prenom: $request->get(key: 'prenom'),
            entreprise: $request->get('published_at'),
            fonction: $request->get('fonction'),
            telephone: $request->get('telephone'),
            email: $request->get('email'),
            message: $request->get('message'),            
            
        );
    }
}
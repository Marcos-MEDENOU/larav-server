<?php

namespace App\Filament\Resources\Blog\PostResource\Pages;

use App\Filament\Resources\Blog\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord


{
    protected static string $resource = PostResource::class;


    protected ?string $maxContentWidth = 'full';
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl();
    }
}

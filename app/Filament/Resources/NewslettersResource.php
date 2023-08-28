<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewslettersResource\Pages;
use App\Filament\Resources\NewslettersResource\RelationManagers;
use App\Models\FrontModels\Newsletters;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewslettersResource extends Resource
{
    protected static ?string $model = Newsletters::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left';

    protected static ?string $navigationGroup = 'Visiteurs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('lastname')->label('Nom'),
                Forms\Components\TextInput::make('firstname')->label('Prénom'),
                Forms\Components\TextInput::make('email')->label('Email'),
                Forms\Components\TextInput::make('function')->label('fonction'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')->sortable()->label('Email'),
                Tables\Columns\TextColumn::make('lastname')->sortable()->label('Nom'),
                Tables\Columns\TextColumn::make('firstname')->sortable()->label('Prénom'),
                Tables\Columns\TextColumn::make('function')->sortable()->label('fonction'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNewsletters::route('/'),
            'create' => Pages\CreateNewsletters::route('/create'),
            'edit' => Pages\EditNewsletters::route('/{record}/edit'),
        ];
    }    
}

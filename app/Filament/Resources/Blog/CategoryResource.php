<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\CategoryResource\Pages;
use App\Filament\Resources\Blog\CategoryResource\RelationManagers;
use App\Models\Blog\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $navigationIcon = 'heroicon-o-hashtag';

    public static function form(Form $form): Form
    {
        return $form
         
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxValue(50)
                ->lazy()
                ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null)
                ->label('Nom de la catégorie')
                ->columnSpan('full'),

            // Forms\Components\TextInput::make('slug')               
            //     ->required()
            //     ->unique(Category::class, 'slug', ignoreRecord: true),
            //     // ->label(''),

            Forms\Components\MarkdownEditor::make('description')
                ->columnSpan('full'),

            Forms\Components\Toggle::make('is_visible')
                ->label('Visible sur tous les articles.')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Nom de la catégorie'),
                    
                // Tables\Columns\TextColumn::make('slug')
                //     ->searchable()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('description'),
                    
                Tables\Columns\BooleanColumn::make('is_visible')
                    ->label('Visibilité sur les articles')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Derniere modification')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }    
}

<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\PostResource\Pages;
use App\Filament\Resources\Blog\PostResource\RelationManagers;
use App\Models\Blog\Post;
use Carbon\Carbon;
use Filament\Actions\EditAction;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\View\View;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Support\Facades\Date;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationLabel = 'Articles';

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected ?string $maxContentWidth = 'full';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->lazy()
                                    ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null),
                                Forms\Components\TextInput::make('slug')
                                    ->required(),

                                TinyEditor::make('content')
                                    ->required()
                                    ->columnSpan('full')
                                    ->language('fr')
                                    ->showMenuBar()
                                    ->toolbarSticky(true)
                                    ->fileAttachmentsDisk('server')
                                    ->fileAttachmentsVisibility('public')
                                    ->fileAttachmentsDirectory('uploads')
                                    ->setRelativeUrls(false),


                                Forms\Components\Select::make('blog_category_id')
                                    ->label('Catégorie')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    ->columnSpan('full')
                                    ->required()
                                    ->searchable(),


                                Forms\Components\DatePicker::make('published_at')
                                    ->columnSpan('full')
                                    ->label('Published Date'),
                            ]),
                    ])
                    ->columnSpan(['lg' => fn (?Post $record) => $record === null ? 2 : 2]),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Created at')
                                    ->content(fn (Post $record): ?string => $record->created_at?->diffForHumans()),

                                Forms\Components\Placeholder::make('updated_at')
                                    ->label('Last modified at')
                                    ->content(fn (Post $record): ?string => $record->updated_at?->diffForHumans()),

                            ])->hidden(fn (?Post $record) => $record === null),
                        Forms\Components\Section::make('Image principale')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->disk('local')
                                    ->label('Image')
                                    ->image()
                                    ->visibility('public')

                            ])
                            ->columnSpan(['lg' => 1])
                            ->collapsible(),
                        Forms\Components\Section::make('SEO')
                            ->schema([
                                Forms\Components\TextInput::make('meta_description')

                                    ->required(),
                                Forms\Components\TextInput::make('meta_keywords')

                                    ->required(),
                                Forms\Components\TextInput::make('seo_title')

                                    ->required()

                            ])
                            ->collapsible()
                            ->columnSpan(['lg' => 1]),

                    ])

                    ->columnSpan(['lg' => 1])



            ])
            ->columns([
                'sm' => 3,
                'lg' => null,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table


            ->columns([

                Tables\Columns\ImageColumn::make('image')
                    ->disk('local')
                    ->label('Image')
                    ->visibility('public'),

                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                // Tables\Columns\TextColumn::make('author.name')
                //     ->searchable()
                //     ->sortable()
                //     ->toggleable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->getStateUsing(fn (Post $record): string => $record->published_at?->isPast() & $record->is_visible==true ? 'Publié' : 'En attente')
                    ->colors([
                        'success' => 'Publié',
                    ]),

                Tables\Columns\TextColumn::make('category.name')

                    ->label('Catégorie')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),


                Tables\Columns\TextColumn::make('published_at')
                    ->label('Date de publication')
                    ->date(),
                // ToggleColumn::make('is_visible')
                //     ->label('Activer ou désactiver')
                //     ->url(fn (Post $record): string => route('posts.status', $record))
                //     ->getStateUsing(fn (Post $record): string => $record->published_at?->isPast() ? true : false)
                //     // ->updateState(fn (Post $record) => $record->published_at?->isPast()  ? 'en ligne' : 'désactiver')
                //     ->tooltip(fn (Post $record) => $record->published_at?->isPast()  ? 'en ligne' : 'désactiver')
                //     ->alignCenter(),
            ])

            ->filters([
                Tables\Filters\Filter::make('published_at')
                    ->form([
                        Forms\Components\DatePicker::make('published_from')
                            ->placeholder(fn ($state): string => 'Dec 18, ' . now()->subYear()->format('Y')),
                        Forms\Components\DatePicker::make('published_until')
                            ->placeholder(fn ($state): string => now()->format('M d, Y')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['published_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '>=', $date),
                            )
                            ->when(
                                $data['published_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('published_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['published_from'] ?? null) {
                            $indicators['published_from'] = 'Published from ' . Carbon::parse($data['published_from'])->toFormattedDateString();
                        }
                        if ($data['published_until'] ?? null) {
                            $indicators['published_until'] = 'Published until ' . Carbon::parse($data['published_until'])->toFormattedDateString();
                        }

                        return $indicators;
                    }),
            ])
            ->actions([

                Action::make('Mettre en ligne')
                    ->translateLabel() // Equivalent to `label(__('Edit'))`
                    ->button()
                    ->action(function (Post $record) {
                        $record->is_visible = true;
                        if(!$record->published_at?->isPast()){
                            $record->published_at=now();
                        }
                        $record->save();
                    })
                    ->visible(fn (Post $record): bool => (($record->published_at?->isPast() || !$record->published_at?->isPast()) & $record->is_visible==false) 
                        ),
                Action::make('Retirer du site')
                    ->button()
                    ->translateLabel() // Equivalent to `label(__('Edit'))`
                    ->action(function (Post $record) {
                        $record->is_visible = false;
                        $record->save();
                    })
                    // ->url(fn (Post $record): string => route('posts.status', $record))
                    ->visible(fn (Post $record): bool => $record->published_at?->isPast() & $record->is_visible==true),

                Tables\Actions\EditAction::make(),

                Tables\Actions\DeleteAction::make(),

                Action::make('visit')
                    ->label('Previsualiser')
                    ->url(fn ($record): string => '/view/' . $record->slug)
                    ->icon('heroicon-o-link')
                    ->openUrlInNewTab()
                    ->color('success'),



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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}/view'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }


}

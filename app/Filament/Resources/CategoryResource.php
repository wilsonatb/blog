<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Filament\Forms\Get;

class CategoryResource extends Resource {
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form {
        return $form
            ->schema([
                TextInput::make('title')->required()->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, $state) {
                        if (($get('slug') ?? '') !== Str::slug($old)) {
                            return;
                        }

                        $set('slug', Str::slug($state, '-'));
                    }),
                TextInput::make('slug')->maxLength(255)->unique(ignoreRecord: true),
                TextInput::make('text_color')->nullable()->default('#000000'),
                Select::make('background_color')
                ->options([
                    'red' => 'Red',
                    'green' => 'Green',
                    'blue' => 'Blue',
                    'yellow' => 'Yellow',
                    'purple' => 'Purple',
                    'orange' => 'Orange',
                    'zinc' => 'Zinc',
                    'amber' => 'Amber',
                    'lime' => 'Lime',
                    'emerald' => 'Emerald',
                    'teal' => 'Teal',
                    'cyan' => 'Cyan',
                    'sky' => 'Sky',
                    'indigo' => 'Indigo',
                    'violet' => 'Violet',
                    'fuchsia' => 'Fuchsia',
                    'pink' => 'Pink',
                    'rose' => 'Rose',
                ])
                ->default('blue')
                ->required()
                ->label('Background Color')
                ->searchable(),
            ]);
    }

    public static function table(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('slug')->searchable()->sortable(),
                TextColumn::make('text_color')->searchable()->sortable(),
                TextColumn::make('background_color')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}

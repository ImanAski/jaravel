<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LibraryButtonsResource\Pages;
use App\Filament\Resources\LibraryButtonsResource\RelationManagers;
use App\Models\LibraryButtons;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LibraryButtonsResource extends Resource
{
    protected static ?string $model = LibraryButtons::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('type'),
                TextInput::make('text')->required(false),
                FileUpload::make('image')->required()->image()->imageEditor()->required(false),
                TextInput::make('url'),
                Toggle::make('target'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('type'),
                TextColumn::make('text'),
                ImageColumn::make('image'),
                TextColumn::make('url'),
                TextColumn::make('target'),

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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLibraryButtons::route('/'),
            'create' => Pages\CreateLibraryButtons::route('/create'),
            'edit' => Pages\EditLibraryButtons::route('/{record}/edit'),
        ];
    }    
}

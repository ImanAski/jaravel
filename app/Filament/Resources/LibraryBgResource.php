<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LibraryBgResource\Pages;
use App\Filament\Resources\LibraryBgResource\RelationManagers;
use App\Models\LibraryBg;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LibraryBgResource extends Resource
{
    protected static ?string $model = LibraryBg::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('background')->required()->image()->imageEditor(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                ImageColumn::make('background'),
                TextColumn::make('created_at')->sortable(),
                TextColumn::make('updated_at')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListLibraryBgs::route('/'),
            'create' => Pages\CreateLibraryBg::route('/create'),
            'edit' => Pages\EditLibraryBg::route('/{record}/edit'),
        ];
    }    
}

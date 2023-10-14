<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TherapistsResource\Pages;
use App\Filament\Resources\TherapistsResource\RelationManagers;
use App\Models\Therapists;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TherapistsResource extends Resource
{
    protected static ?string $model = Therapists::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')->required()->image()->imageEditor(),
                TextInput::make('name')->required(),
                TextInput::make('education')->required(),
                TextInput::make('description')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                ImageColumn::make('image'),
                TextColumn::make('name')->searchable(),
                TextColumn::make('education')->searchable(),
                TextColumn::make('description')->searchable(),
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
            'index' => Pages\ListTherapists::route('/'),
            'create' => Pages\CreateTherapists::route('/create'),
            'edit' => Pages\EditTherapists::route('/{record}/edit'),
        ];
    }    
}

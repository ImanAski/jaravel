<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannersResource\Pages;
use App\Filament\Resources\BannersResource\RelationManagers;
use App\Models\Banners;
use App\Models\Pages as ModelsPages;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannersResource extends Resource
{
    protected static ?string $model = Banners::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')->required()->image()->imageEditor(),
                FileUpload::make('title_image')->required()->image()->imageEditor(),
                TextInput::make('text'),
                TextInput::make('subtext'),
                Select::make('page')->label('page')->options(ModelsPages::all()->pluck('name', 'id'))->searchable(),
                Select::make('section')
                    ->label('Section')
                    ->options([
                        1 => 'Option 1',
                        2 => 'Option 2',
                        3 => 'Option 3',
                        4 => 'Option 4',
                        5 => 'Option 5',
                    ])
                    ->required(),
                TextInput::make('name'),
                Toggle::make('status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                ImageColumn::make('image'),
                ImageColumn::make('title_image'),
                TextColumn::make('text'),
                TextColumn::make('subtext'),
                ToggleColumn::make('status'),

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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanners::route('/create'),
            'edit' => Pages\EditBanners::route('/{record}/edit'),
        ];
    }
}

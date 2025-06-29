<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DimLocationResource\Pages;
use App\Filament\Admin\Resources\DimLocationResource\RelationManagers;
use App\Models\DimLocation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DimLocationResource extends Resource
{
    protected static ?string $model = DimLocation::class;

    protected static ?string $navigationGroup = 'Dimensi';

    protected static ?int $navigationSort = -2;
    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('country')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('city')
                    ->maxLength(50)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListDimLocations::route('/'),
            'create' => Pages\CreateDimLocation::route('/create'),
            'edit' => Pages\EditDimLocation::route('/{record}/edit'),
        ];
    }
}

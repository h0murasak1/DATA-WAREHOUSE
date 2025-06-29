<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FactVisitsResource\Pages;
use App\Filament\Admin\Resources\FactVisitsResource\RelationManagers;
use App\Models\FactVisits;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FactVisitsResource extends Resource
{
    protected static ?string $model = FactVisits::class;
    protected static ?string $navigationGroup = 'Fakta';

    protected static ?int $navigationSort = -3;

    protected static ?string $navigationIcon = 'heroicon-c-globe-asia-australia';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('date_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('comic_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('location_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('age_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('device')
                    ->required()
                    ->maxLength(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date.date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date.day_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('comic_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('comic.title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('location.country')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('age_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('age.age_group')
                    ->searchable(),
                Tables\Columns\TextColumn::make('device')
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
            'index' => Pages\ListFactVisits::route('/'),
            'create' => Pages\CreateFactVisits::route('/create'),
            'edit' => Pages\EditFactVisits::route('/{record}/edit'),
        ];
    }
}

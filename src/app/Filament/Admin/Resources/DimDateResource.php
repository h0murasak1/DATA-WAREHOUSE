<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DimDateResource\Pages;
use App\Filament\Admin\Resources\DimDateResource\RelationManagers;
use App\Models\DimDate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DimDateResource extends Resource
{
    protected static ?string $model = DimDate::class;

    protected static ?string $navigationGroup = 'Dimensi';

    protected static ?int $navigationSort = -2;
    protected static ?string $navigationIcon = 'heroicon-c-calendar-date-range';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('day_name')
                    ->required()
                    ->maxLength(15),
                Forms\Components\TextInput::make('month')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('year')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('day_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('month')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('year')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListDimDates::route('/'),
            'create' => Pages\CreateDimDate::route('/create'),
            'edit' => Pages\EditDimDate::route('/{record}/edit'),
        ];
    }
}

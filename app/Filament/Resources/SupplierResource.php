<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),
                Forms\Components\TextInput::make('period')
                    ->label('Period')
                    ->required(),
                Forms\Components\TextInput::make('category')
                    ->label('Category')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([Tables\Columns\TextColumn::make('id')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('name')
            ->searchable()
            ->sortable(),
            Tables\Columns\TextColumn::make('period')
                    ->searchable()
                    ->sortable(),
            Tables\Columns\TextColumn::make('category')
                    ->searchable()
                    ->sortable(),                           
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }
}

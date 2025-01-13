<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MonitorResource\Pages;
use App\Filament\Resources\MonitorResource\RelationManagers;
use App\Models\Monitor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Section;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MonitorResource extends Resource
{
    protected static ?string $model = Monitor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('supplier_id')
                    ->relationship('supplier', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('apr_period')
                    ->options([
                        'Q1' => 'Q1',
                        'Q2' => 'Q2',
                        'Q3' => 'Q3',
                        'Q4' => 'Q4',
                        'S1' => 'S1',
                        'S2' => 'S2',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('year')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options([
                        'No Quotation' => 'No Quotation',
                        'Quotation' => 'Quotation',
                        'PC' => 'PC',
                        'Approval Section Head' => 'Approval Section Head',
                        'Approval Manager' => 'Approval Manager',
                        'Approval GM' => 'Approval GM',
                        'Approval DIR' => 'Approval DIR',
                        'Filing' => 'Filing',
                        'Problem' => 'Problem',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('coy')
                    ->label('Company')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier.name')
                    ->label('Supplier')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('apr_period')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('year')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([

                Tables\Filters\SelectFilter::make('apr_period')
                    ->options([
                        'Q1' => 'Q1',
                        'Q2' => 'Q2',
                        'Q3' => 'Q3',
                        'Q4' => 'Q4',
                        'S1' => 'S1',
                        'S2' => 'S2',
                    ])
                    ->multiple(),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'No Quotation' => 'No Quotation',
                        'Quotation' => 'Quotation',
                        'PC' => 'PC',
                        'Approval Section Head' => 'Approval Section Head',
                        'Approval Manager' => 'Approval Manager',
                        'Approval GM' => 'Approval GM',
                        'Approval DIR' => 'Approval DIR',
                        'Filing' => 'Filing',
                        'Problem' => 'Problem',
                    ])
                    ->multiple(),
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
            RelationManagers\PicasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMonitors::route('/'),
            'create' => Pages\CreateMonitor::route('/create'),
            'edit' => Pages\EditMonitor::route('/{record}/edit'),
        ];
    }
}

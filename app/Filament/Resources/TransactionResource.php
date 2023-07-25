<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Supplier;
use App\Models\Transaction;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\SelectColumn;




class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
    ->schema([
        Select::make('user_id')
        ->label('User')
        ->options(User::all()->pluck('name', 'name')),
        Select::make('supplier_id')
        ->label('Supplier')
        ->options(Supplier::all()->pluck('supplier_name', 'supplier_name')),
        Select::make('remarks')
        ->options([
            'processing' => 'Processing',
            'cancelled' => 'Cancelled',
            'closed' => 'Closed',
        ])
        ->default('processing'),
        DatePicker::make('transaction_date')->displayFormat('m/d/Y'),
        Textarea::make('transaction_details'),
        TextInput::make('price')->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: '₱', thousandsSeparator: ',', decimalPlaces: 2))
    ]),

    Grid::make()
    ->schema([
        Radio::make('quality_rating')
        ->options([
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5'
        ]),
        Radio::make('delivery_rating')
        ->options([
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5'
        ]),
        Radio::make('pricing_rating')
        ->options([
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5'
        ]),
        Radio::make('customer_service_rating')
        ->options([
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5'
        ]),
        Radio::make('reliability_rating')
        ->options([
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5'
        ]),
        Textarea::make('comment')
    ])



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('supplier_id'),
                TextColumn::make('transaction_date'),
                TextColumn::make('transaction_details'),
                TextColumn::make('price'),
                TextColumn::make('quality_rating'),
                TextColumn::make('delivery_rating'),
                TextColumn::make('pricing_rating'),
                TextColumn::make('customer_service_rating'),
                TextColumn::make('reliability_rating'),
                TextColumn::make('comment'),
                TextColumn::make('remarks'),
                TextColumn::make('user_id'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}

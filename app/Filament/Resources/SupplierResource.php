<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Category;
use App\Models\Supplier;
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
use Filament\Tables\Columns\SelectColumn;

use Filament\Forms\Components\Textarea;



class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_id')
            ->label('Category')
            ->options(Category::all()->pluck('category_name', 'id')),
            TextInput::make('supplier_name'),
            TextInput::make('representative_name'),
            TextInput::make('designation'),
            TextInput::make('address'),
            TextInput::make('office_contact'),
            TextInput::make('email'),
            TextInput::make('business_permit_number'),
            TextInput::make('tin'),
            TextInput::make('philgeps_registration_number'),
            TextInput::make('supplier_website'),
            Textarea::make('supplier_notes')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('supplier_name'),
                TextColumn::make('representative_name'),
                TextColumn::make('category_id'),
                TextColumn::make('total_ratings'),
                TextColumn::make('supplier_status'),
                TextColumn::make('created_at'),
                TextColumn::make('supplier_notes'),
                SelectColumn::make('supplier_status')
                ->options([
                    'active' => 'Active',
                    'reviewing' => 'Reviewing',
                    'published' => 'Published',
                ])

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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }
}

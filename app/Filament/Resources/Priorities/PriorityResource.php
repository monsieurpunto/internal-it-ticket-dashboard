<?php

namespace App\Filament\Resources\Priorities;

use App\Filament\Resources\Priorities\Pages\CreatePriority;
use App\Filament\Resources\Priorities\Pages\EditPriority;
use App\Filament\Resources\Priorities\Pages\ListPriorities;
use App\Filament\Resources\Priorities\Schemas\PriorityForm;
use App\Filament\Resources\Priorities\Tables\PrioritiesTable;
use App\Models\Priority;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PriorityResource extends Resource
{
    protected static ?string $model = Priority::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBolt;

    protected static ?string $recordTitleAttribute = 'name';
public static function getNavigationGroup(): string|UnitEnum|null
{
    return __('Settings');
}

public static function getNavigationLabel(): string
{
    return __('Priorities');
}

protected static ?string $modelLabel = 'Priority';

protected static ?string $pluralModelLabel = 'Priorities';

protected static ?int $navigationSort = 2;
    public static function form(Schema $schema): Schema
    {
        return PriorityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PrioritiesTable::configure($table);
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
            'index' => ListPriorities::route('/'),
            'create' => CreatePriority::route('/create'),
            'edit' => EditPriority::route('/{record}/edit'),
        ];
    }
}

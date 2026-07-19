<?php

namespace App\Filament\Resources\IssueCategories;

use App\Filament\Resources\IssueCategories\Pages\CreateIssueCategory;
use App\Filament\Resources\IssueCategories\Pages\EditIssueCategory;
use App\Filament\Resources\IssueCategories\Pages\ListIssueCategories;
use App\Filament\Resources\IssueCategories\Schemas\IssueCategoryForm;
use App\Filament\Resources\IssueCategories\Tables\IssueCategoriesTable;
use App\Models\IssueCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class IssueCategoryResource extends Resource
{
    protected static ?string $model = IssueCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolder;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __('Settings');
    }

    public static function getNavigationLabel(): string
    {
        return __('Issue Categories');
    }

    protected static ?string $modelLabel = 'Issue Category';

    protected static ?string $pluralModelLabel = 'Issue Categories';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return IssueCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IssueCategoriesTable::configure($table);
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
            'index' => ListIssueCategories::route('/'),
            'create' => CreateIssueCategory::route('/create'),
            'edit' => EditIssueCategory::route('/{record}/edit'),
        ];
    }
}

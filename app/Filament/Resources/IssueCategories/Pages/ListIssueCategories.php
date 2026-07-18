<?php

namespace App\Filament\Resources\IssueCategories\Pages;

use App\Filament\Resources\IssueCategories\IssueCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIssueCategories extends ListRecords
{
    protected static string $resource = IssueCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

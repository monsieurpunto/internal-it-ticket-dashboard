<?php

namespace App\Filament\Resources\IssueCategories\Pages;

use App\Filament\Resources\IssueCategories\IssueCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIssueCategory extends EditRecord
{
    protected static string $resource = IssueCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

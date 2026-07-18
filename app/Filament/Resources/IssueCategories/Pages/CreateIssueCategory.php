<?php

namespace App\Filament\Resources\IssueCategories\Pages;

use App\Filament\Resources\IssueCategories\IssueCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIssueCategory extends CreateRecord
{
    protected static string $resource = IssueCategoryResource::class;
}

<?php

namespace App\Filament\App\Resources\Tickets\Pages;

use App\Filament\App\Resources\Tickets\TicketResource;
use App\Models\Priority;
use App\Models\Status;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateTicket extends CreateRecord
{
    protected static string $resource = TicketResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = Auth::id();

        $data['assigned_to'] = null;

        $data['priority_id'] = Priority::query()
            ->where('name', 'Medium')
            ->value('id');

        $data['status_id'] = Status::query()
            ->where('name', 'Open')
            ->value('id');

        return $data;
    }
}

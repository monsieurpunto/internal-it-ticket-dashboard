<?php

namespace App\Filament\App\Widgets;

use App\Models\Ticket;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class MyTicketStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $query = Ticket::query()
            ->where('created_by', Auth::id());

        return [
            Stat::make(
                __('Open'),
                (clone $query)
                    ->whereHas('status', fn ($query) => $query->where('name', 'Open'))
                    ->count(),
            )
                ->description(__('My open tickets'))
                ->descriptionIcon('heroicon-m-folder-open')
                ->color('info'),

            Stat::make(
                __('In Progress'),
                (clone $query)
                    ->whereHas('status', fn ($query) => $query->where('name', 'In Progress'))
                    ->count(),
            )
                ->description(__('Currently being handled'))
                ->descriptionIcon('heroicon-m-arrow-path')
                ->color('warning'),

            Stat::make(
                __('Resolved'),
                (clone $query)
                    ->whereHas('status', fn ($query) => $query->where('name', 'Resolved'))
                    ->count(),
            )
                ->description(__('Resolved tickets'))
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make(
                __('Closed'),
                (clone $query)
                    ->whereHas('status', fn ($query) => $query->where('name', 'Closed'))
                    ->count(),
            )
                ->description(__('Closed tickets'))
                ->descriptionIcon('heroicon-m-lock-closed')
                ->color('gray'),
        ];
    }
}

<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Tickets\TicketResource;
use App\Models\Status;
use App\Models\Ticket;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TicketStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $statuses = Status::pluck('id', 'name');

        return [
            Stat::make('Total Tickets', Ticket::count())
                ->icon('heroicon-o-ticket')
                ->url(TicketResource::getUrl()),

            Stat::make(
                'Open',
                Ticket::where('status_id', $statuses['Open'])->count(),
            )
                ->color('info')
                ->icon('heroicon-o-clock')
                ->url($this->statusUrl($statuses['Open'])),

            Stat::make(
                'In Progress',
                Ticket::where('status_id', $statuses['In Progress'])->count(),
            )
                ->color('warning')
                ->icon('heroicon-o-wrench-screwdriver')
                ->url($this->statusUrl($statuses['In Progress'])),

            Stat::make(
                'Resolved',
                Ticket::where('status_id', $statuses['Resolved'])->count(),
            )
                ->color('success')
                ->icon('heroicon-o-check-circle')
                ->url($this->statusUrl($statuses['Resolved'])),

            Stat::make(
                'Closed',
                Ticket::where('status_id', $statuses['Closed'])->count(),
            )
                ->color('gray')
                ->icon('heroicon-o-lock-closed')
                ->url($this->statusUrl($statuses['Closed'])),
        ];
    }

    protected function statusUrl(string $statusId): string
    {
        return TicketResource::getUrl('index', [
            'tableFilters' => [
                'status' => [
                    'value' => $statusId,
                ],
            ],
        ]);
    }
}
<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Tickets\TicketResource;
use App\Models\Priority;
use App\Models\Status;
use App\Models\Ticket;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TicketStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $statuses = Status::pluck('id', 'name');
        $priorities = Priority::pluck('id', 'name');

        return [
            Stat::make('Total Tickets', Ticket::count())
                ->description('All tickets in the system')
                ->descriptionIcon('heroicon-m-ticket')
                ->icon('heroicon-m-ticket')
                ->color('primary')
                ->url(TicketResource::getUrl()),

            Stat::make(
                'Open',
                Ticket::where('status_id', $statuses['Open'])->count(),
            )
                ->description('Waiting for assignment')
                ->descriptionIcon('heroicon-m-folder-open')
                ->icon('heroicon-m-clock')
                ->color('info')
                ->url($this->statusUrl($statuses['Open'])),

            Stat::make(
                'In Progress',
                Ticket::where('status_id', $statuses['In Progress'])->count(),
            )
                ->description('Currently being worked on')
                ->descriptionIcon('heroicon-m-wrench-screwdriver')
                ->icon('heroicon-m-wrench-screwdriver')
                ->color('warning')
                ->url($this->statusUrl($statuses['In Progress'])),

            Stat::make(
                'High Priority',
                Ticket::where('priority_id', $priorities['High'])->count(),
            )
                ->description('Requires immediate attention')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->icon('heroicon-m-exclamation-triangle')
                ->color('danger')
                ->url($this->priorityUrl($priorities['High'])),

            Stat::make(
                'Resolved',
                Ticket::where('status_id', $statuses['Resolved'])->count(),
            )
                ->description('Successfully resolved')
                ->descriptionIcon('heroicon-m-check-circle')
                ->icon('heroicon-m-check-circle')
                ->color('success')
                ->url($this->statusUrl($statuses['Resolved'])),

            Stat::make(
                'Closed',
                Ticket::where('status_id', $statuses['Closed'])->count(),
            )
                ->description('Completed and archived')
                ->descriptionIcon('heroicon-m-lock-closed')
                ->icon('heroicon-m-lock-closed')
                ->color('gray')
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

    protected function priorityUrl(string $priorityId): string
    {
        return TicketResource::getUrl('index', [
            'tableFilters' => [
                'priority' => [
                    'value' => $priorityId,
                ],
            ],
        ]);
    }
}
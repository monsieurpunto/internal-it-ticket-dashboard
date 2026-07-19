<?php

namespace App\Filament\App\Resources\Tickets;

use App\Filament\App\Resources\Tickets\Pages\CreateTicket;
use App\Filament\App\Resources\Tickets\Pages\EditTicket;
use App\Filament\App\Resources\Tickets\Pages\ListTickets;
use App\Filament\App\Resources\Tickets\Pages\ViewTicket;
use App\Filament\App\Resources\Tickets\Schemas\TicketForm;
use App\Filament\App\Resources\Tickets\Tables\TicketsTable;
use App\Models\Ticket;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTicket;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return TicketForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TicketsTable::configure($table);
    }

    public static function getNavigationLabel(): string
    {
        return __('My Tickets');
    }

    public static function getModelLabel(): string
    {
        return __('Ticket');
    }

    public static function getPluralModelLabel(): string
    {
        return __('My Tickets');
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('created_by', Auth::id());
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTickets::route('/'),
            'create' => CreateTicket::route('/create'),
            'view' => ViewTicket::route('/{record}'),
            'edit' => EditTicket::route('/{record}/edit'),
        ];
    }
}

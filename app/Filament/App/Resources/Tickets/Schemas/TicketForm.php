<?php

namespace App\Filament\App\Resources\Tickets\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TicketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('Ticket Information'))
                    ->schema([
                        TextInput::make('title')
                            ->label(__('Title'))
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->label(__('Description'))
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),

                        Select::make('issue_category_id')
                            ->label(__('Category'))
                            ->relationship('issueCategory', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ]),
            ]);
    }
}
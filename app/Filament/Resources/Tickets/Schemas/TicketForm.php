<?php

namespace App\Filament\Resources\Tickets\Schemas;


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
                Section::make('Ticket Information')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('description')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),

                Section::make('Assignment')
                    ->schema([
                        Select::make('created_by')
                            ->label('Reporter')
                            ->relationship('createdBy', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('assigned_to')
                            ->label('Assigned To')
                            ->relationship('assignedTo', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                    ])
                    ->columns(2),

                Section::make('Classification')
                    ->schema([
                        Select::make('issue_category_id')
                            ->label('Category')
                            ->relationship('issueCategory', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('priority_id')
                            ->label('Priority')
                            ->relationship('priority', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('status_id')
                            ->label('Status')
                            ->relationship('status', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])
                    ->columns(3),
            ]);
    }
}
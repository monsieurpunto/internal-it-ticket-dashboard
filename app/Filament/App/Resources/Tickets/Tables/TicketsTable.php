<?php

namespace App\Filament\App\Resources\Tickets\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TicketsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('title')
                    ->label(__('Title'))
                    ->limit(10)
                    ->tooltip(fn ($state, $record) => $record->title)
                    ->searchable(),

                TextColumn::make('issueCategory.name')
                    ->label(__('Category'))
                    ->searchable(),

                TextColumn::make('status.name')
                    ->label(__('Status'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Open' => 'info',
                        'In Progress' => 'warning',
                        'Resolved' => 'success',
                        'Closed' => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('assignedTo.name')
                    ->label(__('Assigned To'))
                    ->placeholder('To be assigned')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->relationship('status', 'name')
                    ->label(__('Status')),

                SelectFilter::make('issueCategory')
                    ->relationship('issueCategory', 'name')
                    ->label(__('Category')),
            ])
            ->recordActions([
                ViewAction::make(),

                EditAction::make()
                    ->visible(fn ($record) => $record->isOpen()),

                DeleteAction::make()
                    ->visible(fn ($record) => $record->isOpen()),
            ])
            ->toolbarActions([]);
    }
}

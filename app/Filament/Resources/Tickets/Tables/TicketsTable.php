<?php

namespace App\Filament\Resources\Tickets\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
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
                TextColumn::make('createdBy.name')
                    ->label('Reporter')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('assignedTo.name')
                    ->label('Assigned To')
                    ->placeholder('-')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('issueCategory.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('priority.name')
                    ->label('Priority')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Low' => 'success',
                        'Medium' => 'warning',
                        'High' => 'danger',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status.name')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Open' => 'info',
                        'In Progress' => 'warning',
                        'Resolved' => 'success',
                        'Closed' => 'gray',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('description')
                    ->words(8)
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->relationship('status', 'name')
                    ->label('Status')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('priority')
                    ->relationship('priority', 'name')
                    ->label('Priority')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('issueCategory')
                    ->relationship('issueCategory', 'name')
                    ->label('Category')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('assignedTo')
                    ->relationship('assignedTo', 'name')
                    ->label('Assigned To')
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                CreateAction::make(),

                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('No tickets found')
            ->emptyStateDescription('Create your first ticket to get started.')
            ->emptyStateIcon('heroicon-o-ticket')
            ->emptyStateActions([
                CreateAction::make(),
            ]);
    }
}
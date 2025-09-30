<?php

namespace App\Filament\Resources\VolunteerGroups\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class VolunteerGroupsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('group_name')
                    ->searchable(),
                TextColumn::make('leader')
                    ->getStateUsing(fn ($record) =>
                        $record->leader?->first()->family_name ?? 'Not set',
                    ),
                TextColumn::make('sub')
                    ->getStateUsing(fn ($record) =>
                        $record->subLeader?->first()->family_name ?? 'Not set',
                    ),
                TextColumn::make('members')
                    ->label('Members')
                    ->getStateUsing(fn ($record) =>
                        $record->otherMembers->pluck('family_name')->implode(', ')
                    )
                    ->wrap(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

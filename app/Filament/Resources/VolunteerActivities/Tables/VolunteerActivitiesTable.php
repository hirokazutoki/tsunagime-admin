<?php

namespace App\Filament\Resources\VolunteerActivities\Tables;

use App\Models\HelpRequest;
use App\Models\VolunteerActivity;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VolunteerActivitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('process_status')
                    ->badge(),
                TextColumn::make('client.name')
                    ->label('Client'),
                TextColumn::make('volunteerGroup.leader.family_name')
                    ->label('Volunteer Group Leader')
                    ->searchable(),
                TextColumn::make('shuttleDrivers')
                    ->getStateUsing(fn ($record) =>
                        $record->shuttleDrivers->pluck('family_name')->implode(', ')
                    )
                    ->wrap(),
                TextColumn::make('truckDrivers')
                    ->getStateUsing(fn ($record) =>
                        $record->truckDrivers->pluck('family_name')->implode(', ')
                    )
                    ->wrap(),
                TextColumn::make('centerStaff.family_name')
                    ->label('Staff'),
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

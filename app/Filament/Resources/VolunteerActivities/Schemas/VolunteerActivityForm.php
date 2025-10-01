<?php

namespace App\Filament\Resources\VolunteerActivities\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class VolunteerActivityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('help_request_id')
                    ->required()
                    ->numeric(),
                Select::make('volunteer_group_id')
                    ->relationship('volunteerGroup', 'id')
                    ->required(),
                DatePicker::make('activity_date')
                    ->required(),
                Select::make('process_status')
                    ->options([
            'waiting_for_outbound' => 'Waiting for outbound',
            'outbound' => 'Outbound',
            'active' => 'Active',
            'waiting_for_return' => 'Waiting for return',
            'return' => 'Return',
            'reporting' => 'Reporting',
            'completed' => 'Completed',
        ])
                    ->default('waiting_for_outbound')
                    ->required(),
                Textarea::make('activity_record')
                    ->columnSpanFull(),
                Textarea::make('next_activity_note')
                    ->columnSpanFull(),
            ]);
    }
}

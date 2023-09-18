<?php

namespace App\Filament\Resources\CategorieResource\Pages;

use App\Filament\Resources\CategorieResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;

class ViewCategorie extends ViewRecord
{
    protected static string $resource = CategorieResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->record)
            ->schema([
                TextEntry::make('name'),
                TextEntry::make('slug')
                    ->columnSpanFull(),
                TextEntry::make('created_at'),
                TextEntry::make('updated_at')
            ]);
    }
}

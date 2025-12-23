<?php

namespace App\Filament\Resources\InvestmentInitiations\Pages;

use App\Filament\Resources\InvestmentInitiations\InvestmentInitiationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageInvestmentInitiations extends ManageRecords
{
    protected static string $resource = InvestmentInitiationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

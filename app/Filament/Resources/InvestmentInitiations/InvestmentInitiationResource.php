<?php

namespace App\Filament\Resources\InvestmentInitiations;

use App\Filament\Resources\InvestmentInitiations\Pages\ManageInvestmentInitiations;
use App\Models\InvestmentInitiation;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class InvestmentInitiationResource extends Resource
{
    protected static ?string $model = InvestmentInitiation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Investasi';

    protected static ?string $modelLabel = 'Investasi';

    protected static ?string $pluralModelLabel = 'Investasi';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'nama_investasi';

    public static function getNavigationGroup(): ?string
    {
        return 'Perencanaan';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('sumber_investment')
                    ->label('Sumber Investasi')
                    ->options([
                        'info_lahan' => 'Info Lahan',
                        'proposal' => 'Proposal',
                        'rencana' => 'Rencana',
                    ])
                    ->required(),

                TextInput::make('nama_investasi')
                    ->label('Nama Investasi')
                    ->required()
                    ->maxLength(255),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->columnSpanFull()
                    ->rows(4),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'review' => 'Review',
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->default('draft')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_investasi')
            ->columns([
                TextColumn::make('sumber_investment')
                    ->label('Sumber Investasi')
                    ->badge()
                    ->searchable(),

                TextColumn::make('nama_investasi')
                    ->label('Nama Investasi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'secondary' => 'draft',
                        'warning' => 'review',
                        'info' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ])
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'review' => 'Review',
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),

                SelectFilter::make('sumber_investment')
                    ->label('Sumber Investasi')
                    ->options([
                        'info_lahan' => 'Info Lahan',
                        'proposal' => 'Proposal',
                        'rencana' => 'Rencana',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageInvestmentInitiations::route('/'),
        ];
    }
}

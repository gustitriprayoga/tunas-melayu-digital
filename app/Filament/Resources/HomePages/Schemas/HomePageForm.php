<?php

namespace App\Filament\Resources\HomePages\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomePageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero Section')
                    ->description('Tampilan layar utama website')
                    ->schema([
                        TextInput::make('hero_title')->required(),
                        Textarea::make('hero_subtitle'),

                        // Upload Gambar Hero via Spatie Media Library
                        SpatieMediaLibraryFileUpload::make('hero_bg')
                            ->label('Background Image')
                            ->collection('hero')
                            ->image()
                            ->imageEditor(),

                        Grid::make(2)->schema([
                            TextInput::make('cta_text')->label('Teks Tombol'),
                            TextInput::make('cta_link')->label('Link Tombol'),
                        ]),
                    ]),

                Section::make('Statistik Perusahaan')
                    ->schema([
                        TextInput::make('stats_clients')->numeric()->label('Total Klien'),
                        TextInput::make('stats_projects')->numeric()->label('Project Selesai'),
                        TextInput::make('stats_years')->numeric()->label('Tahun Pengalaman'),
                    ])->columns(3),
            ]);
    }
}

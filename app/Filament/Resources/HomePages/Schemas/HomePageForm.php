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
                Section::make('Hero & Call to Action')
                    ->description('Atur konten utama yang muncul di bagian paling atas website.')
                    ->icon('heroicon-m-megaphone')
                    ->schema([
                        TextInput::make('hero_title')
                            ->label('Main Title (Glitch)')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('hero_subtitle')
                            ->label('Subtitle Narrative')
                            ->rows(3)
                            ->columnSpanFull(),
                        Grid::make(2)->schema([
                            TextInput::make('cta_text')
                                ->label('Button Text')
                                ->default('Hubungi Kami'),
                            TextInput::make('cta_link')
                                ->label('Button Destination (URL)')
                                ->placeholder('https://...'),
                        ]),
                    ])->collapsible(),

                // SECTION 2: METRICS & NUMBERS
                Section::make('Real-time Metrics')
                    ->description('Angka-angka statistik yang membuktikan kualitas kerja.')
                    ->icon('heroicon-m-presentation-chart-line')
                    ->schema([
                        Grid::make(3)->schema([
                            TextInput::make('stats_clients')
                                ->label('Happy Clients')
                                ->numeric()
                                ->prefix('👥')
                                ->default(0),
                            TextInput::make('stats_projects')
                                ->label('Projects Done')
                                ->numeric()
                                ->prefix('🚀')
                                ->default(0),
                            TextInput::make('stats_years')
                                ->label('Years Exp')
                                ->numeric()
                                ->prefix('⏳')
                                ->default(0),
                        ]),
                    ])->collapsible(),

                // SECTION 3: VIDEO & ASSETS
                Section::make('Multimedia Assets')
                    ->description('Video YouTube dan Asset gambar pendukung.')
                    ->icon('heroicon-m-play-circle')
                    ->schema([
                        TextInput::make('video_url')
                            ->label('YouTube Video URL')
                            ->url()
                            ->placeholder('https://www.youtube.com/watch?v=...')
                            ->helperText('Gunakan link lengkap dari YouTube.'),
                        SpatieMediaLibraryFileUpload::make('hero_image')
                            ->collection('hero')
                            ->image()
                            ->disk('public')
                            ->imageEditor()
                            ->label('Hero Background/Side Image')
                            ->columnSpanFull(),
                    ])->collapsible(),
            ]);
    }
}

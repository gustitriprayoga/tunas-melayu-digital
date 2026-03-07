<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Models\Service;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('General Information')
                    ->description('Detail utama layanan Anda.')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('title')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) =>
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                            TextInput::make('slug')
                                ->disabled()
                                ->dehydrated()
                                ->required()
                                ->unique(Service::class, 'slug', ignoreRecord: true),
                        ]),

                        Grid::make(2)->schema([
                            TextInput::make('icon')
                                ->label('Heroicon Name')
                                ->placeholder('heroicon-o-cpu-chip')
                                ->helperText('Lihat daftar icon di heroicons.com')
                                ->required(),

                            Toggle::make('is_active')
                                ->label('Tampilkan Layanan')
                                ->default(true)
                                ->inline(false),
                        ]),

                        Textarea::make('short_description')
                            ->label('Card Description')
                            ->rows(3)
                            ->placeholder('Muncul di halaman depan/index...')
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make('Detailed Content')
                    ->description('Tuliskan detail teknis, keunggulan, dan paket layanan di sini.')
                    ->schema([
                        RichEditor::make('full_content')
                            ->label('Main Article')
                            ->toolbarButtons([
                                'attachFiles',
                                'blockquote',
                                'bold',
                                'bulletList',
                                'codeBlock',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'orderedList',
                                'redo',
                                'undo',
                            ])
                            ->columnSpanFull(),
                    ]),

                Section::make('Visual Asset')
                    ->schema([
                        SpatieMediaLibraryFileUpload::make('service_image')
                            ->collection('service_images')
                            ->image()
                            ->label('Featured Image')
                            ->columnSpanFull(),
                    ])->collapsible(),
                Section::make('Extra Details')
                    ->schema([
                        // Repeater untuk FAQ
                        Repeater::make('faqs')
                            ->schema([
                                TextInput::make('question')->required(),
                                Textarea::make('answer')->required(),
                            ])
                            ->collapsible()
                            ->itemLabel(fn(array $state): ?string => $state['question'] ?? null),

                        // Tag Input untuk Tech Stack
                        TagsInput::make('tech_stack')
                            ->placeholder('Add Tech...')
                            ->helperText('Contoh: Laravel, React, AWS'),

                        TextInput::make('wa_message')
                            ->placeholder('Halo, saya tertarik dengan layanan [Service Name]...')
                    ])->collapsible(),
            ]);
    }
}

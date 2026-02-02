<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        Portfolio::truncate();

        $projects = [
            [
                'title' => 'Crypto Exchange Platform',
                'client' => 'Nusantara Chain',
                'tech' => ['Laravel', 'VueJS', 'Blockchain', 'Redis'],
                'image' => 'https://images.unsplash.com/photo-1642104704074-907c0698cbd9?q=80&w=1932&auto=format&fit=crop', // Gambar Crypto
            ],
            [
                'title' => 'Smart City Dashboard',
                'client' => 'Pemprov DKI',
                'tech' => ['React', 'NodeJS', 'Mapbox', 'IoT'],
                'image' => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?q=80&w=2069&auto=format&fit=crop', // Gambar Tech City
            ],
            [
                'title' => 'E-Commerce Super App',
                'client' => 'TokoMaju',
                'tech' => ['Flutter', 'GoLang', 'Microservices'],
                'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f7a07d?q=80&w=2070&auto=format&fit=crop', // Gambar E-commerce
            ],
            [
                'title' => 'Hospital Management System',
                'client' => 'RS Sehat Selalu',
                'tech' => ['Laravel', 'Livewire', 'Filament'],
                'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=2053&auto=format&fit=crop', // Gambar Hospital/Clean
            ],
            [
                'title' => 'AI Chatbot Assistant',
                'client' => 'Bank Mega',
                'tech' => ['Python', 'OpenAI', 'AWS Lambda'],
                'image' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?q=80&w=2070&auto=format&fit=crop', // Gambar AI
            ],
        ];

        foreach ($projects as $project) {
            $p = Portfolio::create([
                'title' => $project['title'],
                'slug' => Str::slug($project['title']),
                'client_name' => $project['client'],
                'tech_stack' => $project['tech'],
                'url' => 'https://google.com',
                'description' => 'Deskripsi detail proyek inovatif ini...',
            ]);

            // Download & Attach Image
            try {
                $p->addMediaFromUrl($project['image'])
                    ->toMediaCollection('portfolio_images');
            } catch (\Exception $e) {
                // Abaikan error download
            }
        }
    }
}

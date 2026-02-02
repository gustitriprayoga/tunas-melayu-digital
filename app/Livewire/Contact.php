<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SocialLink;
use Joaopaulolndev\FilamentGeneralSettings\Models\GeneralSetting;
use Livewire\Attributes\Title;

class Contact extends Component
{
    public $name;
    public $email;
    public $message;
    public $success = false;

    #[Title('Hubungi Kami - Tunas Melayu Digital')]
    public function render()
    {
        return view('livewire.contact', [
            'settings' => GeneralSetting::first(),
            'socials' => SocialLink::where('is_active', true)->get(),
        ]);
    }

    public function sendMessage()
    {
        // Validasi
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        // Disini Anda bisa menambahkan logika kirim email atau simpan ke DB
        // Mail::to('admin@tunas.com')->send(...);

        $this->success = true;
        $this->reset(['name', 'email', 'message']);
    }
}

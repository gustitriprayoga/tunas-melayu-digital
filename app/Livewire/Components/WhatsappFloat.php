<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\GeneralSetting;

class WhatsappFloat extends Component
{
    public $whatsappNumber;
    public $companyName;

    public function mount()
    {
        $settings = GeneralSetting::first();
        // Format nomor WA (hapus 0/+, ganti jadi 62)
        $rawNumber = $settings->whatsapp_number ?? '628123456789';
        $this->whatsappNumber = preg_replace('/^0/', '62', preg_replace('/[^0-9]/', '', $rawNumber));
        $this->companyName = $settings->site_name ?? 'Support Team';
    }

    public function render()
    {
        return view('livewire.components.whatsapp-float');
    }
}

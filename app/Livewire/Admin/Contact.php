<?php

namespace App\Livewire\Admin;

use App\Models\GeneralSetting;
use Livewire\Component;

class Contact extends Component
{
    public $support_email;
    public $support_phone;
    public $office_address;
    public $whatsapp_number;
    public $google_maps_embed; // Added for more flexibility

    public function mount()
    {
        $settings = GeneralSetting::first() ?? new GeneralSetting();
        $this->support_email = $settings->support_email;
        $this->support_phone = $settings->support_phone;
        $this->office_address = $settings->office_address;
        $this->whatsapp_number = $settings->whatsapp_number;
        
        // Use more_configs for additional fields
        $this->google_maps_embed = $settings->more_configs['google_maps_embed'] ?? '';
    }

    public function save()
    {
        $this->validate([
            'support_email' => 'required|email',
            'support_phone' => 'required|string',
            'office_address' => 'required|string',
            'whatsapp_number' => 'required|string',
            'google_maps_embed' => 'nullable|string',
        ]);

        $settings = GeneralSetting::first() ?? new GeneralSetting();
        
        $moreConfigs = $settings->more_configs ?? [];
        $moreConfigs['google_maps_embed'] = $this->google_maps_embed;

        $settings->fill([
            'support_email' => $this->support_email,
            'support_phone' => $this->support_phone,
            'office_address' => $this->office_address,
            'whatsapp_number' => $this->whatsapp_number,
            'more_configs' => $moreConfigs,
        ])->save();

        $this->dispatch('notify', ['message' => 'Contact settings saved!', 'type' => 'success']);
    }

    public function render()
    {
        return view('livewire.admin.contact')->layout('layouts.admin.app', ['title' => 'Contact Settings']);
    }
}

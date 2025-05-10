<?php

namespace App\Core;

use Livewire\Component;
use Illuminate\Support\Str;

class Notification extends Component
{
    public $notifications = [];

    // Mendengarkan event 'notify' untuk menambahkan notifikasi
    protected $listeners = ['notify' => 'addNotification'];

    public function addNotification($message, $type = 'info')
    {
        // Generate unique ID untuk setiap notifikasi
        $id = (string) Str::uuid();

        $this->notifications[] = [
            'id'      => $id,
            'message' => $message,
            'type'    => $type, // Contoh: 'info', 'success', 'warning', 'error'
        ];
    }

    public function removeNotification($id)
    {
        // Hapus notifikasi berdasarkan id
        $this->notifications = collect($this->notifications)
            ->reject(fn($notification) => $notification['id'] === $id)
            ->values()->toArray();
    }
    public function render()
    {
        return view('core.notification');
    }
}

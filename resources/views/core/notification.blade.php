<div class="fixed top-5 right-5 z-50 space-y-4">
    @foreach($notifications as $notification)
        <div
            x-data
            x-init="setTimeout(() => { $wire.removeNotification('{{ $notification['id'] }}') }, 3000)"
            class="alert alert-{{ $notification['type'] }}"
        >
            <div>
                <span>{{ $notification['message'] }}</span>
            </div>
            <button class="btn btn-sm btn-circle" wire:click="removeNotification('{{ $notification['id'] }}')">&times;</button>
        </div>
    @endforeach
</div>

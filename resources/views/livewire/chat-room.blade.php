<div class="p-6">
    <div class="bg-white shadow rounded-lg p-4 max-w-2xl mx-auto">
        <div class="text-xl font-bold mb-4">Real-Time Chat</div>

        <div class="h-64 overflow-y-auto border p-3 space-y-2 mb-4">
            @foreach ($messages as $msg)
                <div>
                    <strong>{{ $msg['user'] }}:</strong> {{ $msg['message'] }}
                </div>
            @endforeach
        </div>

        <form wire:submit.prevent="sendMessage" class="flex gap-2">
            <input wire:model.defer="message" type="text" class="flex-1 border p-2 rounded" placeholder="Type a message..." />
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Send</button>
        </form>

        <div class="mt-4">
            <h3 class="font-semibold">Active Users:</h3>
            <ul class="text-sm">
                @foreach ($users as $user)
                    <li>{{ $user['name'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

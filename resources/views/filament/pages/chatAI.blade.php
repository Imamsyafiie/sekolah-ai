<x-filament-panels::page>
 <div class="space-y-4">
        <button wire:click="generateText" class="px-4 py-2 bg-blue-500 text-dark rounded">
            Generate Text with OpenAI
        </button>

        @if ($responseText)
            <div class="p-4 bg-gray-100 rounded">
                <h3 class="text-lg font-bold">Response:</h3>
                <p>{{ $responseText }}</p>
            </div>
        @endif
    </div>
</x-filament-panels::page>

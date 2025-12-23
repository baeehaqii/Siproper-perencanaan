<x-filament::page>
    <style>
        .breezy-profile-section {
            margin-bottom: 3rem !important;
            padding-bottom: 2rem !important;
            border-bottom: 1px solid #e5e7eb;
        }

        .breezy-profile-section:last-child {
            border-bottom: none;
            margin-bottom: 0 !important;
        }

        .breezy-profile-section .fi-section-content form {
            display: flex;
            flex-direction: column;
        }

        .breezy-profile-section .fi-section-content form>div:last-child {
            margin-top: 1.5rem !important;
            display: flex;
            justify-content: flex-end;
        }
    </style>

    <div class="space-y-0">
        @foreach ($this->getRegisteredMyProfileComponents() as $component)
            @unless(is_null($component))
                <div class="breezy-profile-section">
                    @livewire($component)
                </div>
            @endunless
        @endforeach
    </div>
</x-filament::page>
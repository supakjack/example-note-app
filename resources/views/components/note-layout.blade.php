<x-layout>
        {{-- NAVBAR mobile only --}}
        <x-nav sticky class="lg:hidden">
            <x-slot:brand class="flex gap-2 items-center">
                <x-icon name="o-square-3-stack-3d" class="text-primary" />
                <div>Note App</div>
            </x-slot:brand>
            <x-slot:actions>
                <label for="main-drawer" class="lg:hidden mr-3">
                    <x-icon name="o-bars-3" class="cursor-pointer" />
                </label>
            </x-slot:actions>
        </x-nav>

    {{-- MAIN --}}
    <x-main full-width>

            {{-- SIDEBAR --}}
            <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

                {{-- BRAND --}}
                <div class="p-6 pt-3 flex gap-3 items-center h-20">
                    <x-mary-icon name="o-square-3-stack-3d" class="text-primary" />
                    <div class="hidden-when-collapsed">Note App</div>
                </div>
    
                {{-- MENU --}}
                <x-mary-menu activate-by-route>
    
                    {{-- User --}}
                        <x-mary-list-item :item="$user" sub-value="username" no-separator no-hover class="!-mx-2 mt-2 mb-5 border-y border-y-sky-900">
                            <x-slot:actions>
                                @volt
                                    <div>
                                        <x-mary-button icon="o-power" wire:click="logout" class="btn-circle btn-ghost btn-xs" tooltip-left="logoff" />
                                    </div>
                                @endvolt
                            </x-slot:actions>
                        </x-mary-list-item>
    
                    <x-mary-menu-item title="Notes" icon="o-sparkles" link="{{ route('user.[User].notes.index',['User'=> $user ]) }}" />
                    <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                        <x-mary-menu-item title="Profile" icon="o-user" link="{{ route('user.[User].settings.profile',['User'=> $user ]) }}" />
                    </x-menu-sub>
                </x-mary-menu>
            </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>
</x-layout>


<?php

use Illuminate\Support\Facades\{Auth};
use function Livewire\Volt;

$logout = function() {
    Auth::logout();
    $this->redirectRoute('login');
}

?>
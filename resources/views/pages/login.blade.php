<x-layout>
    @volt
        <div class="px-40 py-8">
            <x-header title="Note App" subtitle="Login to your note." separator />
            <x-form wire:submit="login">
                <x-mary-input label="E-mail" wire:model="form.email" type="email" />
                <x-mary-input label="Password" wire:model="form.password" type="password" />
                
                <x-slot:actions>
                    <x-mary-button label="login" class="btn-primary" type="submit" spinner="login" />
                </x-slot:actions>
            </x-form>
        </div>
     @endvolt
</x-layout>

<?php

use Illuminate\Support\Facades\{Auth};
use Mary\Traits\Toast;
use function Laravel\Folio\{name};
use function Livewire\Volt\{state, uses};
    
name('login');

uses([Toast::class]);

state(
    form: [],
);
 
$login = function () {
    if (Auth::attempt($this->form)) {
        return $this->redirectRoute('user.[User].notes.index', [
            'User' => Auth::user()
        ]);
    }

    $this->error("email or password is incorrect.");
};

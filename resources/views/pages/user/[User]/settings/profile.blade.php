<x-note-layout :user="$user">
    @volt
        <div class="px-40 py-8">
            <x-form wire:submit="save">
                <x-mary-input label="E-mail" wire:model="form.email" type="email" />
                <x-mary-input label="Password" wire:model="form.password" type="password" />
                
                <x-slot:actions>
                    <x-mary-button label="save" class="btn-primary" type="submit" spinner="save" />
                </x-slot:actions>
            </x-form>
        </div>
     @endvolt
</x-note-layout>

<?php

use App\Models\{User};
use Mary\Traits\Toast;
use function Laravel\Folio\{name};
use function Livewire\Volt\{state, mount, computed, uses};
 

name('user.[User].settings.profile');

uses([Toast::class]);

state(
    form: [],
    user: null,
);
 
$save = function () {
     $this->user->fill($this->form);
     $this->user->save();
     $this->success('success save');
};

mount(function (User $user) {
    $this->user = $user;
    $this->form['email'] = $user->email; 
    $this->form['password'] = $user->password; 
});

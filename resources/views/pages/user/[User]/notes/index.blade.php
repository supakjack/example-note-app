<x-note-layout :user="$user">
    @volt
        <div>
            <x-button label="New note" class="btn-primary" wire:click="$set('isOpenModal', true)" spinner />

            <x-form wire:submit="create">
                <x-modal wire:model="isOpenModal" title="New note" separator persistent>
                    <x-mary-input label="Title" placeholder="Your title note ..." wire:model="form.title" />
                    <x-mary-input label="Content" placeholder="Your content note ..." wire:model="form.content" />
                    <x-slot:actions>
                        <x-button label="Cancel" wire:click="$set('isOpenModal', false)" />
                        <x-button label="Confirm" type="submit" class="btn-primary"  spinner/>
                    </x-slot:actions>
                </x-modal>
            </x-form>
            @if ($this->notes->isEmpty())
                <p>No notes found.</p>
            @else
                @foreach ($this->notes as $note)
                    <x-mary-list-item :item="$note" no-separator no-hover>
                        <x-slot:value>
                            {{ $note->content }}
                        </x-slot:value>
                        <x-slot:sub-value>
                            {{ $note->title }}
                        </x-slot:sub-value>
                        <x-slot:actions>
                            <x-mary-button wire:click="delete({{ $note->id }})" icon="o-trash" class="text-red-500"  spinner />
                        </x-slot:actions>
                    </x-list-item>
                @endforeach
            @endif
        </div>
     @endvolt
</x-note-layout>

<?php

use App\Models\{User};
use Mary\Traits\Toast;
use function Laravel\Folio\{name};
use function Livewire\Volt\{state, mount, computed, uses};
 

name('user.[User].notes.index');

uses([Toast::class]);

state(
    isOpenModal: false,
    form: [],
    user: null,
);
 
$create = function () {
    $this->user->notes()->create($this->form);
    $this->form = [];
    $this->isOpenModal = false;
};

$notes = computed(function () {
    return $this->user->notes;
});

$delete = function ($id) {
    $note = $this->user->notes()->find($id);
    $note->delete();
};

mount(function (User $user) {
    $this->user = $user;
});

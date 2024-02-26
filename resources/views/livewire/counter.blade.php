<?php
 
use function Livewire\Volt\{state};
 
state(['count' => 0]);
state(['count2' => 0]);
 
$increment = fn () => $this->count++;
 
?>
 
<div>
    <h1>{{ $count }}</h1>
    <h1>{{ $count2 }}</h1>
    <button wire:click="increment">+</button>
</div>
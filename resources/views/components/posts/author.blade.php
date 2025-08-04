@props(['author'])

{{-- This component displays the author's avatar and name --}}
{{-- It is used in various post components to show the author of the post --}}

{{-- Ensure that the $author variable is passed correctly --}}
<flux:avatar circle name="{{ $author->name }}" color="auto" class="mr-3"/>
<span class="mr-1 text-xs">{{ $author->name }}</span>

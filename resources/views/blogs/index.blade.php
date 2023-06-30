<x-layout>

    @if (session('success'))
        <div class="alert alert-success text-center mt-3">{{ session('success') }}</div>
    @endif
    <x-hero />
    <x-blog-section :blogs='$blogs' />

</x-layout>
{{-- @dd($blogs) --}}

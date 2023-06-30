@props(['name', 'type' => 'text', 'value' => ''])
<x-form.input-wapper>
    <x-form.lable :name="$name" />
    <input type="{{ $type }}" class="form-control" id="{{ $name }}" name="{{ $name }}"
        aria-describedby="{{ $name }}Help" value="{{ old($name, $value) }}">
    <x-error :name="$name" />
</x-form.input-wapper>

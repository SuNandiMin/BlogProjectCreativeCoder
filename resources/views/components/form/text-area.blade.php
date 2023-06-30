@props(['name', 'value' => ''])
<x-form.input-wapper>
    <x-form.lable :name="$name" />
    <textarea class="form-control" id="{{ $name }}" name="{{ $name }}" style="height: 150px;">{{ old($name, $value) }}</textarea>
    <x-error :name="$name" />
</x-form.input-wapper>

<x-admin-layout>
    <div class="container my-4">
        <div class="row">
            <x-comment-wapper>
                <h3 class="text-primary fw-bolder text-end">Blog Create Form</h3>
                <form action="/admin/blogs/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-form.input name="title" />
                    <x-form.text-area name="body" />
                    <x-form.input-wapper>
                        <x-form.lable name="category" />
                        <select name="category" id="category" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-error name="category" />
                    </x-form.input-wapper>
                    <x-form.input name="image" type="file" />
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-lg float-end">Submit</button>
                    </div>
                </form>
            </x-comment-wapper>
        </div>
    </div>
</x-admin-layout>

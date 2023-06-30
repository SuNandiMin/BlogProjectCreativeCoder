<x-layout>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <x-comment-wapper>
                    <h3 class="text-primary fw-bolder text-end">Category create Form</h3>
                    <form action="/admin/categories/store" method="POST">
                        @csrf
                        <x-form.input name="name" />
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Submit</button>
                        </div>
                    </form>
                </x-comment-wapper>
            </div>
        </div>
    </div>
</x-layout>

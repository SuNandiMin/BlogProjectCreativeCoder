<x-layout>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary fw-bolder text-end">Registration Form</h3>
                <div class="card p-4 my-3 bg-light shadow-sm">
                    <form method="POST">
                        @csrf
                        <x-form.input name="name" />
                        <x-form.input name="user_name" />
                        <x-form.input name="email" type="email">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </x-form.input>
                        <x-form.input name="password" type="password" />
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</x-layout>

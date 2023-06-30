<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-dark">
                <ul class="list-group fs-5">
                    <li class="list-group-item bg-dark text-primary"><a class="text-decoration-none"
                            href="/admin/blogs">Blogs</a></li>
                    <li class="list-group-item bg-dark text-primary"><a class="text-decoration-none"
                            href="/admin/blogs/create">Create Blog</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="container">{{ $slot }}</div>
            </div>
        </div>
    </div>
</x-layout>

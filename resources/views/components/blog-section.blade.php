@props(['blogs', 'categories', 'current_category'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bolder mb-4">Blogs</h1>
    <div class="">
        <x-category-dropdown />
    </div>

    {{-- searching blogs section --}}
    <form action="" class="my-3">
        <div class="input-group mb-3">
            <input name="search" value="{{ request('search') }}" type="text" autocomplete="false" class="form-control"
                placeholder="Search Blogs..." />
            <input name="category" value="{{ request('category') }}" type="hidden" />
            <input name="author" value="{{ request('author') }}" type="hidden" />
            <button class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
                Search
            </button>
        </div>
    </form>

    <div class="row">
        @forelse ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <x-blog-card :blog='$blog' />
            </div>
        @empty
            <p class="text-center fw-bold fs-3 my-5 py-5 text-muted">There is no blog</p>
        @endforelse

        {{ $blogs->links() }}
    </div>
</section>

<div class="dropdown">
    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
        data-bs-toggle="dropdown" aria-expanded="false">
        {{ isset($current_category) ? $current_category->name : 'Filter By Category' }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="
                    /
                    {{-- {{ request('author') ? '?author=' . request('author') : '' }} --}}
            ">
                All
            </a>
        </li>
        @foreach ($categories as $category)
            <li><a class="dropdown-item"
                    href="
                    /?category={{ $category->slug }}{{ request('search') ? '&search=' . request('search') : '' }}{{ request('author') ? '&author=' . request('author') : '' }}
                    ">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

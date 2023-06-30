<x-layout>
    <!-- singloe blog section -->
    @if (session('success'))
        <div class="alert alert-success text-center mt-3">{{ session('success') }}</div>
    @endif
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img style="width: 300px; height:200px" src="{{ asset('storage/' . $blog->avatar) }}" class="card-img-top"
                    alt="..." />
                <h3 class="my-3">{{ $blog->title }}</h3>
                <div class="">
                    <p class="fs-6 text-secondary">
                        <a href="/?author={{ $blog->author->user_name }}">
                            {{ $blog->author->name }}
                        </a>
                        <span> {{ $blog->created_at->diffForHumans() }}</span>

                    <form action="/blogs/{{ $blog->slug }}/subscription" method="POST">
                        @csrf
                        @auth
                            @if (auth()->user()->isSubscribed($blog))
                                <input type="submit" class="btn btn-danger rounded-pill" value="UnSubscribe">
                            @else
                                <input type="submit" class="btn btn-warning rounded-pill" value="Subscribe">
                            @endif
                        @endauth
                    </form>

                    </p>
                    <div class="tags my-3">
                        <a href="/?category={{ $blog->category->slug }}">
                            <span class="badge bg-danger">{{ $blog->category->name }}</span>
                        </a>
                    </div>
                </div>
                <p class="lh-md">
                    {!! $blog->body !!}
                </p>
            </div>
        </div>
    </div>
    <section class="container" id="set-comment">
        <div class="col-md-8  mx-auto">
            @auth
                <x-create-comment :blog='$blog' />
            @else
                <div class="text-center">
                    <p class="text-muted fw-bold">Please <a href="/login">Login</a> to perticipate in this discussion.</p>
                </div>
            @endauth
        </div>
    </section>

    <x-comments :comments="$blog
        ->comments()
        ->latest()
        ->paginate(3)" />
    <x-you-may-also-like :random_blogs='$random_blogs' />
</x-layout>

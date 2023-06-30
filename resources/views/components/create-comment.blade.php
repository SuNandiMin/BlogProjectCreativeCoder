@props(['blog'])
<x-comment-wapper>
    <h5 class="fw-bold">Sent Comment as {{ auth()->user()->name }}</h5>
    <form method="POST" action="/blogs/{{ $blog->slug }}/comment">
        @csrf
        <div class="form-group">
            <textarea name="body" class="form-control border-0" id="comment" aria-describedby="emailHelp" placeholder="//"
                height="100px"></textarea>
            <x-error name="body" />
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn"><i
                        class="fa-regular text-primary fa-xl fa-paper-plane"></i></button>
            </div>
        </div>
    </form>
</x-comment-wapper>

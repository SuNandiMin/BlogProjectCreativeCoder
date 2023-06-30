<x-admin-layout>
    <h3 class="mt-3">All blogs</h3>
    <x-comment-wapper>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Intro</th>
                    <th scope="col" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $key => $blog)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td><a href="/blogs/{{ $blog->slug }}" target="blank">{{ $blog->title }}</a></td>
                        <td>{!! $blog->intro !!} </td>
                        <td>
                            <a href="/admin/blogs/{{ $blog->slug }}/show"
                                class="text-decoration-none text-white btn btn-success">Detail</a>
                        </td>
                        <td>
                            <a href="/admin/blogs/{{ $blog->slug }}/edit"
                                class="text-decoration-none text-white btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="/admin/blogs/{{ $blog->slug }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-decoration-none text-white btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-comment-wapper>
    {{ $blogs->links() }}

</x-admin-layout>

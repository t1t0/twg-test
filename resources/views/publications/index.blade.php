<x-app-layout>
    <div class="clearfix my-4">
        <a href="/publications/create" class="mx-1 btn btn-primary float-end"><i class="bi bi-plus-circle"></i> New Publication</a>
    </div>
    <div class="p-5 shadow rounded-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="10%">Id</th>
                    <th scope="col" width="35%">Title</th>
                    <th scope="col" width="30%">Published By</th>
                    <th scope="col" width="25%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($publications as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->publishedBy->name }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="/publications/{{ $post->id }}" class="mx-1 btn btn-secondary"><i class="bi bi-info-circle-fill"></i></a>
                                <a href="/publications/{{ $post->id }}/edit" class="mx-1 btn btn-info"><i class="bi bi-pencil-square"></i></a>
                                <form method="post" action="/publications/{{ $post->id }}">
                                @csrf
                                @method('delete')
                                    <button type="submit" class="mx-1 btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

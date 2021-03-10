<x-app-layout>
    <div class="p-5 shadow rounded-3">
        <h1>Edit Publication</h1>
        <form action="/publications/{{ $post->id }}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" value="{{ $post->title }}">
            @error('title')
            <p class="text-danger">{{$errors->first('title')}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" rows="5">{{ $post->content }}</textarea>
            @error('content')
            <p class="text-danger">{{$errors->first('content')}}</p>
            @enderror
        </div>
        <div class="clearfix my-4">
            <button type="submit" class="btn btn-primary float-start">Submit</button>
            <a href="/publications/" class="mx-1 btn btn-danger float-end">Cancel</a>
        </div>
        </form>
    </div>
</x-app-layout>
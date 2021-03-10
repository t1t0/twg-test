<x-app-layout>
    <div class="p-5 shadow rounded-3">
        <h1>{{ $post->title }}</h1>
        <p class="fs-6">{{ $post->publishedBy->name }}</p>
        <p class="py-2 ">{{ $post->content }}</p>
    </div>

    <div class="p-5 mt-4 shadow rounded-3">
        <h2>Comments</h2>
        @foreach($post->comments as $comment)
            @if($comment->status == true)
            <div class="p-3 my-3 rounded-3" style="background-color:#e6e6e6;">
                <p>{{ $comment->content }}</p>
                <p class="text-end">- {{ $comment->commentedBy->name }}</p>
            </div>
            @endif

        @endforeach
    </div>

    <div class="p-5 mt-4 shadow rounded-3">
    @if($comments > 0)
        <p class="text-danger">This User already commented this Publication. Only one comment is allowed.</p>
    @else
        <form action="/comments" method="post">
            @csrf
            <div class="mb-3">
                <label for="comment" class="form-label">Content</label>
                <textarea class="form-control" name="comment" id="comment" rows="3">{{ old('comment') }}</textarea>
                <input type="hidden" name="post" id="post" value="{{ $post->id }}">
                @error('comment')
                <p class="text-danger">{{$errors->first('comment')}}</p>
                @enderror
            </div>
            <p class="text-center"><button type="submit" class="btn btn-primary float-start" href="">Send Comment</button></p>
        </form>
    @endif
    </div>


    @can('approve-comment', $post)
    <div class="p-5 mt-4 shadow rounded-3">
        <h2>Unapproved Comments</h2>
        @foreach($post->comments as $comment)
            @if($comment->status == false)
            <div class="p-3 my-3 rounded-3" style="background-color:#db959c;">
                <p>{{ $comment->content }}</p>
                <div class="clearfix">
                    <form action="/comments/{{ $comment->id }}" method="POST">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-success float-start" href="">Approve Comment</button>
                    </form>
                    <span class="float-end text-end">- {{ $comment->commentedBy->name }}</span>
                </div>
            </div>
            @endif

        @endforeach
    </div>
    @endcan
</x-app-layout>
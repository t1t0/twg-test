<x-app-layout>
    @foreach($posts as $post)
        <div class="p-5 shadow rounded-3">
            <h1>{{ $post->title }}</h1>
            <h2>{{ $post->publishedBy->name }}</h2>
            <h3>Comments:</h3>
            @foreach($post->comments as $comment)
            <div class="p-5 shadow rounded-3 comment">
                <p>{{ $comment->content }}</p>
            </div>
            @endforeach
        </div>
    @endforeach
</x-app-layout>
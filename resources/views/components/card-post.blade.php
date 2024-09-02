@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden h-96 col-span-1 lg:col-span-2 dark:bg-gray-300 hover:shadow-cyan-500/50">
    @if ($post->image)
        <img class="w-full h-44 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
    @else
    <img class="w-full h-36 object-cover object-center" src="https://cdn.pixabay.com/photo/2017/07/06/19/57/sky-2479213_1280.jpg" alt="">
    @endif

    <div class="px-6 py-3">
        <h1 class="font-bold text-xl mb-2 h-12 overflow-hidden leading-5">
            <a href="{{route('posts.show', $post)}}">{{$post->name}}</a>
        </h1>

        <div class="text-gray-700 text-base text-wrap overflow-hidden h-20 leading-4">
            {!!$post->extract!!}
        </div>
    </div>

    <div class="px-6 pt-1 mb-6 h-10 relative bottom-2 align-bottom">
        @foreach ($post->tags as $tag)
            <a class="inline-block bg-gray-200 rounded-full px-3 text-sm text-gray-700 mr-2 dark:bg-white" href="{{route('posts.tag', $tag)}}">{{$tag->name}}</a>
        @endforeach
        <span class="text-sm text-gray-600 float-end">Pubished on {{$post->created_at->format('d M y')}}</span>
    </div>

</article>
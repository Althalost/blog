@props(['post'])

<article class="mb-8 bg-white shadow-lg rounded-lg relative overflow-hidden h-96 col-span-1 lg:col-span-1 dark:bg-gray-300 hover:shadow-gray-500/50">
    @if ($post->image)
        <img class="w-full h-52 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
    @else
        <img class="w-full h-52 object-cover object-center" src="https://cdn.pixabay.com/photo/2017/07/06/19/57/sky-2479213_1280.jpg" alt="">
    @endif

    <div class="absolute right-2 top-2 rounded-lg bg-white bg-opacity-50 p-1">
        {{-- <livewire:like-buttom :key="$post->id" :$post/> --}}
            @livewire('like-buttom', ['post' => $post], key('like_buttom_' . $post->id + random_int (1,10000)))
    </div> 

    <div class="px-6 py-3">
        <h1 class="font-bold text-xl mb-2 h-11 text-gray-700 overflow-hidden leading-5">
            <a href="{{route('posts.show', $post)}}">{{$post->name}}</a>
        </h1>

        <div class="text-gray-700 text-base text-wrap overflow-hidden h-12 leading-4">
            {!!$post->extract!!}
        </div>
    </div>

    <div class="px-6 pt-1 mb-6 h-10 relative bottom-2 align-bottom">
        @foreach ($post->tags as $tag)
            <a class="inline-block bg-{{$tag->color}}-400 rounded-md px-3 text-sm font-semibold text-gray-700 mr-2 dark:bg-white" href="{{route('posts.tag', $tag)}}">{{$tag->name}}</a>
        @endforeach
        <span class="text-sm text-gray-600 absolute right-3 bottom-1">Pubished on {{$post->created_at->format('d M y')}}</span>
    </div>

</article>
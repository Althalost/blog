<x-app-layout>

    <div class="relative container py-3 px-4 lg:px-0 lg:py-8">
        <header class="border-b-2 mx-5 border-gray-400 relative">
            <h2 class="hidden md:inline-block text-2xl pb-2 text-start text-gray-500 font-bold dark:text-gray-200">Lastest posts</h2>

        </header>
        
        {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-4 lg:mt-11 gap-6">

            @foreach ($posts as $post)
                @if ($loop->first and $posts->onFirstPage())
                    <article class="w-full relative rounded-lg shadow-lg col-span-1 md:col-span-2 lg:col-span-3 mb-11 overflow-hidden bg-white hover:shadow-gray-500/50 dark:bg-gray-500" >
                        <div class="w-full h-96 bg-cover bg-center p-8 align-bottom relative" style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2017/07/06/19/57/sky-2479213_1280.jpg @endif )">
                            <h1 class="text-4xl text-white leading-10 font-bold mt-2 text-ellipsis overflow-hidden block absolute bottom-9">
                                <a href="{{route('posts.show', $post)}}">
                                    {{$post->name}}
                                </a>
                            </h1>
                        </div>

                        <div class="absolute right-2 top-2 rounded-lg bg-white bg-opacity-80 shadow p-1">
                            <livewire:like-buttom :key="$post->id" :$post/>
                        </div>
                         
                        <div class="w-full h-36 px-8 flex flex-col justify-top my-6 dark:text-white">


                            <div class="text-gray-700 dark:text-white text-base text-wrap overflow-hidden h-24 leading-6 md:h-20 md:leading-4 my-3">
                                {!!$post->extract!!}
                            </div>

                            <div> 
                                @foreach ($post->tags as $tag)
                                    <a href="{{route('posts.tag', $tag)}}" class="inline-block font-semibold px-3 h-6 bg-{{$tag->color}}-400 text-white rounded-md shadow">{{$tag->name}}</a>
                                @endforeach
                            </div>
                            
                        </div>
                        
                        <span class="absolute bottom-3 right-3 text-sm text-gray-600 dark:text-gray-200 block ml-6">Pubished on {{$post->created_at->format('d M y')}}</span>
                    </article>
                @else

                    <x-card-post :post="$post"/>

                @endif
                
            @endforeach

        </div> --}}

        <livewire:post-list />

    </div>

</x-app-layout>
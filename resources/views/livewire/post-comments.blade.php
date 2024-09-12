
<div class="pb-8 mb-11 mt-4">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-4 text-gray-700 dark:text-gray-200 ">Comments</h2>
               
        <!-- Add Comment Form -->
        @auth
            <textarea 
                wire:model="comment"
                class="w-full p-4 text-md text-gray-700 border-gray-200 rounded-lg bg-gray-50 focus:outline-none dark:bg-gray-400 dark:text-gray-800 dark:boder-none"
                name="" 
                id="" 
                cols="30" rows="7">
            </textarea>
            <button
                wire:click="postComment"
                class="w-inline-flex items-center justify-center h-10 px-4 mt-2 font-medium tracking-wide text-white rounded transition duration-100 bg-blue-400">
                Post Comment
            </button>
        @else
            <a href="{{route('login')}}" class="py-1 text-gray-500 underline"> Login to Post Comments</a>
        @endauth
        

        <div class="space-y-4 mt-5">
            <!-- Comments -->
            @forelse ($this->comments as $comment)
                <div class="bg-gray-50 p-4 rounded shadow dark:bg-gray-400">
                    <div class="flex items-center mb-2">
                        <img src="{{$comment->user->profile_photo_url}}" alt="User Avatar" class="w-10 h-10 rounded-full mr-3">
                        <div>
                        <h3 class="font-semibold text-gray-700 dark:text-gray-900">{{$comment->user->name}}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-700">Posted on {{$comment->created_at->format('d M, Y')}}</p>
                        </div>
                    </div>
                    
                        <p class="text-gray-700 dark:text-gray-800">{{$comment->body}}
                    
                    </p>
                    <div class="flex items-center mt-2">

                       {{--  
                        <button class="text-blue-500 hover:text-blue-600 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                        </svg>
                        Like
                        </button>
                        --}}

                        {{-- <button class="text-gray-500 hover:text-gray-600">Reply</button> --}}
                        @if (Auth::id() == $comment->user->id)
                            {{--  <button class="text-red-500 hover:text-red-600 ml-3" type='submit'>Delete</button> --}}
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-500 dark:text-gray-300">
                    <span> No Comments Posted</span>
                </div>
            @endforelse
        </div>
        <div class="my-2">
            {{ $this->comments->links(data: ['scrollTo' => false]) }}
        </div>
    </div>
</div>

<div class="static">
    <div class="static" x-data="{ show: false }">
        <button id="search-toggle" class="search-icon inline-block float-end lg:mr-2 py-5 px-5 cursor-pointer hover:bg-slate-300"
        @click="show = !show; $nextTick(() => { $refs.input.focus() })">
            <svg class="fill-current pointer-events-none text-grey-600 w-4 h-4 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
            </svg>
          </button>

        <!--
          Dropdown menu, show/hide based on menu state.

          Entering: "transition ease-out duration-100"
            From: "transform opacity-0 scale-95"
            To: "transform opacity-100 scale-100"
          Leaving: "transition ease-in duration-75"
            From: "transform opacity-100 scale-100"
            To: "transform opacity-0 scale-95"
        -->
        <div x-show="show" x-on:click.away="show = false" class="absolute flex z-20 mt-2 left-0 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="search" aria-orientation="vertical" aria-labelledby="search-toggle">
          <!-- Active: "bg-gray-100", Not Active: "" -->

            <div class="absolute top-14 w-dvw z-30 bg-white shadow-xl pointer-events-auto items-end" id="search-content">
                <div class="container py-2 mx-auto text-black">
                  <input x-ref="input" wire:model="search" wire:keydown.enter="update" placeholder="Search..." class="border-0 md:ml-16 lg:ml-32 w-2/3 text-grey-800 transition focus:outline-none focus:ring-0  py-2 appearance-none leading-normal text-xl lg:text-2xl">
                 <x-button wire:click="update" class="my-2 bg-gray-700" > Search</x-button>
                </div>
                
            </div> 

        </div>


      </div>


</div>

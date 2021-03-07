<div class="container mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">

        @foreach ($posts as $post)
            <!-- Column -->
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                <!-- Article -->
                <article class="overflow-hidden rounded-lg shadow-lg">

                    <div class="article-image-container flex-shrink-0 h-auto w-full">
                        <a href="#">
                            <img alt="{{ $post->image_alt_text }}" class="object-cover h-full w-full" src="https://picsum.photos/1920/1080/?random">
                        </a>
                    </div>

                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg">
                            <a class="no-underline hover:underline text-black" href="#">
                                {{ $post->title }}
                            </a>
                        </h1>
                        <p class="text-grey-darker text-sm">
                            {{ date("j F Y", strtotime($post->created_at)) }}
                        </p>
                    </header>

                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                        <a class="flex items-center no-underline hover:underline text-black" href="#">
                            <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                            <p class="ml-2 text-sm">
                                {{ $post->user->name }}
                            </p>
                        </a>

                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative">
                            <x-jet-dropdown align="bottom" width="48">
                                <x-slot name="trigger">
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" clip-rule="evenodd" />
                                                </svg>

                                            </button>
                                        </span>
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Post Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage post') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ '#'/*route('post.edit')*/ }}">
                                        {{ __('Edit') }}
                                    </x-jet-dropdown-link>

                                    <div class="border-t border-gray-100"></div>

                                    <x-jet-dropdown-link href="{{ '#'/*route('post.destroy')*/ }}">
                                        {{ __('Delete') }}
                                    </x-jet-dropdown-link>

                                </x-slot>
                            </x-jet-dropdown>
                        </div>


                    </footer>

                </article>
                <!-- END Article -->

            </div>
            <!-- END Column -->
        @endforeach

    </div>

    <div class="flex flex-col mt-3">
        <div class="flex flex-row justify-between">
            <div>
                <button wire:click="showCreateModal" class="inline-block px-6 py-2 h-12 text-xs font-medium text-center text-white uppercase transition bg-blue-700 rounded-full shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none">
                     Create new post
                </button>
            </div>
            <div class="flex items-center text-gray-700">
                <div class="h-12 w-12 mr-1 ml-1 flex justify-center items-center rounded-full bg-gray-200 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-6 h-6">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </div>
                <div class="flex h-12 font-medium rounded-full bg-gray-200">
                    <div class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full">1</div>
                    <div class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full bg-blue-600 text-white">2</div>
                    <div class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full">3</div>
                    <div class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full">...</div>
                    <div class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full">13</div>
                    <div class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full">14</div>
                    <div class="w-12 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full">15</div>
                    <div class="w-12 h-12 md:hidden flex justify-center items-center cursor-pointer leading-5 transition duration-150 ease-in rounded-full bg-teal-600 text-white">2</div>
                </div>
                <div class="h-12 w-12 ml-1 flex justify-center items-center rounded-full bg-gray-200 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-6 h-6">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
    </div>

     <!-- Post creation modal -->
     <x-jet-dialog-modal wire:model="isModalOpen">
        <x-slot name="title">
            {{ __('Create new post') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" wire:model.lazy="title" required />
            </div>

            <div x-data="{imageName: null, imagePreview: null}" class="col-span-6 sm:col-span-4 mt-4">
                <!-- Image File Input -->
                <input type="file" class="hidden"
                            wire:model="image"
                            x-ref="image"
                            x-on:change="
                                    imageName = $refs.image.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        imagePreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.image.files[0]);
                            " />

                <x-jet-label for="image" value="{{ __('Image') }}" />

                <!-- Post Image -->
                @if ($image)
                    <div class="mt-2" x-show="imagePreview">
                        <img src="{{ $image->temporaryUrl() }}" alt="{{ 'sscscs'}}" class="rounded-sm h-1/3 w-1/3 object-cover">
                    </div>
                @endif

                {{-- <!-- New Post Image Preview -->
                <div class="mt-2" x-show="imagePreview">
                    <span class="block rounded-full w-1/3 h-1/3"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + imagePreview + '\');'">
                    </span>
                </div> --}}

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.image.click()">
                    {{ __('Select A New Image') }}
                </x-jet-secondary-button>

                @if ($image)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteImage">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-jet-label for="image_alt_text" value="{{ __('Image Alt text') }}" />
                <x-jet-input id="image_alt_text" class="block mt-1 w-full" type="text" name="image_alt_text" wire:model.lazy="image_alt_text" required />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isModalOpen')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

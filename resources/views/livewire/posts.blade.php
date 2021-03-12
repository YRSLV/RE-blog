<div class="container mx-auto px-4 md:px-12">
    <x-jet-banner />
    @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    <div class="flex flex-wrap -mx-1 lg:-mx-4">

        @forelse ($posts as $post)
            <!-- Column -->
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                <!-- Article -->
                <article class="overflow-hidden rounded-lg shadow-lg">

                    <div class="article-image-container flex-shrink-0 h-auto w-full">
                        <a href="#">
                            <img alt="{{ $post->image_alt_text }}" class="object-cover h-full w-full" src="{{ asset('storage/' . $post->image_path) }}">
                        </a>
                    </div>

                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg overflow-hidden truncate max-w-xs">
                            <a class="no-underline hover:underline text-black " href="#">
                                {{ $post->title }}
                            </a>
                        </h1>
                        <p class="text-grey-darker text-sm">
                            {{ date("d/m/Y", strtotime($post->created_at)) }}
                        </p>
                    </header>

                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                        <a class="flex flex-shrink-0 items-center no-underline hover:underline text-black" href="#">
                            <img alt="user-profile-photo" class="block rounded-full h-10 w-10 object-cover" src="{{ asset($post->user->profile_photo_url) }}">
                            <div class="overflow-hidden truncate max-w-xs mr-auto">
                                <a class="ml-2 text-sm" href="#">
                                    {{ $post->user->name }}
                                </a>
                            </div>
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

                                    <x-jet-dropdown-link wire:click="showEditModal({{ $post->id }})">
                                        {{ __('Edit') }}
                                    </x-jet-dropdown-link>

                                    <div class="border-t border-gray-100"></div>

                                    <x-jet-dropdown-link wire:click="showDeleteModal({{ $post->id }})">
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
        @empty
            <!-- Column -->
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                <!-- Article -->
                <article class="overflow-hidden rounded-lg shadow-lg border-dashed border-4">

                    <div class="article-image-container flex-shrink-0 h-auto w-full">
                        {{-- <img alt="wireframe-dummy-image" class="object-cover h-full w-full" src="https://via.placeholder.com/600x400.png?text=Placeholder"> --}}
                        <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none" fill="none" class="stroke-current stroke-1 text-gray-200">
                            <polygon points="0,0 100,100 0,100 100,0 100,100 0,100 0,0 100,0"/>
                        </svg>
                    </div>

                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg">
                            <a class="no-underline hover:underline text-black" href="#">
                                There are no real posts at the moment. Create the first one by pressing the button below!
                            </a>
                        </h1>
                    
                    </header>

                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                    </footer>

                </article>
                <!-- END Article -->

            </div>
            <!-- END Column -->
        @endforelse

    </div>

    <div class="flex flex-col mt-3">
        <div class="flex flex-col md:flex-row justify-between">
            <div>
                <button wire:click="showCreateModal" class="inline-block px-6 py-2 h-12 text-xs font-medium text-center text-white uppercase transition bg-indigo-500 rounded-full shadow ripple hover:shadow-lg hover:bg-indigo-800 focus:outline-none">
                     Create new post
                </button>
            </div>

            {{ $posts->links('livewire.custom-pagination-links') }}

        </div>
    </div>

    <!-- Post creation modal -->
    <x-jet-dialog-modal wire:model="isModalOpen">

        @if ($postId)
            <x-slot name="title">
                {{ __('Edit post') }}
            </x-slot>
        @else
            <x-slot name="title">
                {{ __('Create new post') }}
            </x-slot>
        @endif

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" wire:model.lazy="title" required />
                @error('title') <span class="error text-red-600">{{ $message }}</span> @enderror
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

                <div class="grid gap-4 grid-cols-2">
                    <!-- New Post Image -->
                    @if ($image)
                        <div class="mt-2">
                            @if ($postId && $image)
                                <p class="text-center">New post image:</p>
                            @endif
                            <img src="{{ $image->temporaryUrl() }}" class="rounded-sm object-cover">
                        </div>
                    @endif

                    <!-- Current Post image-->
                    @if ($image_path)
                        <div class="mt-2">
                            <p class="text-center">Current post image:</p>
                            <img alt="{{ $post->image_alt_text }}" class="rounded-sm object-cover" src="{{ asset('storage/' . $image_path) }}">
                        </div>
                    @endif
                </div>

                <div class="grid gap-4 grid-cols-4">
                    <div class="flex items-center justify-center col-start-1 col-span-4 md:col-start-2 md:col-span-2">
                        <x-jet-secondary-button class="mt-2 justify-center" type="button" x-on:click.prevent="$refs.image.click()">
                            {{ __('Select A New Image') }}
                        </x-jet-secondary-button>
                    </div>
                </div>

                <x-jet-input-error for="photo" class="mt-2" />
            </div>

            @error('image') <span class="error text-red-600">{{ $message }}</span> @enderror

            <div class="mt-4">
                <x-jet-label for="image_alt_text" value="{{ __('Image Alt text') }}" />
                <x-jet-input id="image_alt_text" class="block mt-1 w-full" type="text" name="image_alt_text" wire:model.lazy="image_alt_text" required />
                @error('image_alt_text') <span class="error text-red-600">{{ $message }}</span> @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isModalOpen')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            @if ($postId)
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Save changes') }}
                </x-jet-button>
            @else
                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create post') }}
                </x-jet-button>
            @endif

        </x-slot>
    </x-jet-dialog-modal>

    <!-- Delete Post Confirmation Modal -->
    <x-jet-dialog-modal wire:model="isDeleteModalOpen">
        <x-slot name="title">
            {{ __('Delete post') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this post? Once this post is deleted, all of its resources and data will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('isDeleteModalOpen')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete post') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

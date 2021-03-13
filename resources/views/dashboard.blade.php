<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                
                    <div class="mt-6 text-2xl">
                        Welcome to RE-blog!
                    </div>
                
                    <div class="mt-6 text-gray-500">
                        This is an example of a blog-like application. Visit Posts page, update your profile or check out the API functionality. Designed
                        to provide an enjoyable and creative experience to be truly fulfilling.
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

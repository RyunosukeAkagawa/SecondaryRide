<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                @foreach ($posts as $post)
                    <div class="p-4 md:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                            <a href="{{ route('posts.show', $post) }}">
                            <img class="lg:h-48 md:h-36 w-full object-cover object-center hover:scale-105 transition duration-300 ease-in-out"
                                src="{{ $post->image_url }}" alt="blog">
                            </a>
                            <div class="p-6">
                            <h1
                                class="title-font text-lg font-medium text-gray-900 mb-3">
                                {{ $post->title }}</h1>
                            <p class="leading-relaxed">
                                {{ Str::limit($post->body, 50) }}</p>
                            <a href="{{ route('posts.show', $post) }}" class="text-sm text-blue-500 inline-flex items-center md:mb-2 lg:mb-0">詳細へ</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-app-layout>

<x-app-layout>
    <div class="container lg:w-3/4 md:w-4/5 w-11/12 mx-auto my-8 px-8 py-16 bg-white shadow-md">
        <x-flash-message :message="session('notice')" />
        <x-validation-errors :errors="$errors" />
        <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-4 mb-4">
            {{ $post->title }}</h2>
        <article class="mb-2 flex">
            <p class="text-gray-500 items-end w-1/2 pt-3 pr-4 leading-relaxed mb-8">{!! nl2br(e($post->body)) !!} <br>
                <br>
                料金：大更駅発 {{ $post->price }}円
                <br>
                @auth
                    <a href="{{ route('posts.comments.create', $post) }}"
                        class="text-blue-500 inline-flex items-center">予約する</a>
                @endauth
            </p>
            <img src="{{ $post->image_url }}" alt="" class="w-1/2 mb-4 max-w-lg">
        </article>

        {{-- <div class="flex flex-row text-center my-4">
            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20 mr-2">編集</a>
            @endcan
            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除" onclick="if(!confirm('削除しますか？')){return false};"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20">
                </form>
            @endcan
        </div> --}}



        <section class="text-gray-600 body-font">
            <hr class="my-3">
            <div class="container px-5 py-12 mx-auto">
                <h2 class="sm:text-xl text-xl font-medium title-font mb-4 text-gray-600">予約履歴</h2>
                <div class="flex flex-wrap -m-2">
                    @foreach ($comments as $comment)
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium">{{ $comment->user->name }} 様</h2>
                                    <p class="text-gray-500">予約日時: {{$comment->datetime}}</p>

                                    <div class="flex mx-auto flex-wrap mt-5">
                                        @can('update', $comment)
                                            <a href="{{ route('posts.comments.edit', [$post, $comment]) }}"
                                                class="text-blue-500 inline-flex items-center text-sm mr-1">変更する</a>
                                        @endcan
                                        <br>
                                        @can('delete', $comment)
                                            <form action="{{ route('posts.comments.destroy', [$post, $comment]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="取り消す"
                                                    onclick="if(!confirm('削除しますか？')){return false};"
                                                    class="text-sm cursor-pointer bg-white border px-2 rounded focus:outline-none focus:shadow-outline mt-1 w-20">
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
</x-app-layout>

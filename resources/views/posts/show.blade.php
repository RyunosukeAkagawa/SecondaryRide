<x-app-layout>
    <div class="container lg:w-3/4 md:w-4/5 w-11/12 mx-auto my-8 px-8 py-4 bg-white shadow-md">
        <x-flash-message :message="session('notice')" />
        <x-validation-errors :errors="$errors" />
        <h2 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl break-words mb-3">
            {{ $post->title }}</h2>
            <article class="mb-2 flex">
                <p class="text-gray-700 items-end w-1/2 pt-3 pr-4">{!! nl2br(e($post->body)) !!} <br>
                <br>
                料金：大更駅発  {{ $post->price }}円
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

        @auth
            <div class="flex">
                <a href="{{ route('posts.comments.create', $post) }}"
                    class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-2 px-10 rounded focus:outline-none focus:shadow-outline block">ここにいく</a>
            </div>
        @endauth

        <section class="font-sans break-normal text-gray-900 bg-gray-100">
        <hr class="my-4">
        <h2 class="my-4 text-lg">予約履歴</h2>
            @foreach ($comments as $comment)
                    <span class="mr-3">{{ $comment->user->name }} 様</span>
                <div class="my-2 flex">
                <table>
                <tr>
                <th class="text-sm text-left">予約日時: {{ $comment->datetime }}</th>
                </tr>
                <tr>
                <th class="text-sm text-left">料金: {{ $comment->total }} 円</th>
                </tr>
                </table>

                    <div class="ml-6 text-center">
                        @can('update', $comment)
                            <a href="{{ route('posts.comments.edit', [$post, $comment]) }}"
                                class="text-sm bg-black text-white py-1 px-3 rounded focus:outline-none focus:shadow-outline w-20">変更する</a>
                        @endcan
                        <br>
                        @can('delete', $comment)
                            <form action="{{ route('posts.comments.destroy', [$post, $comment]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="取り消す" onclick="if(!confirm('削除しますか？')){return false};"
                                    class="text-sm cursor-pointer bg-white border py-1 px-2 rounded focus:outline-none focus:shadow-outline mt-1 w-20">
                            </form>
                        @endcan
                    </div>
                </div>
                <hr>
            @endforeach
        </section>
    </div>
</x-app-layout>



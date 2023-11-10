<x-app-layout>
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">

            <div class="absolute inset-0">
                <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map"
                    scrolling="no"
                    src="{{ $post->image_url }}"
                    style="filter: none;"></iframe>
            </div>

            
            <x-validation-errors :errors="$errors" />
            <div class="container px-5 py-24 mx-auto flex">
            <form action="{{ route('posts.comments.store', $post) }}" method="POST"
                class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">ご予約フォーム</h2>
                @csrf
                <div class="relative mb-4">
                    <label for="datetime" class="leading-7 text-sm text-gray-600">予約日時</label>
                    <input type="datetime-local" name="datetime" value=" {{ old('datetime') }}"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>

                <div class="relative mb-4">
                    <label for="name" class="leading-7 text-sm text-gray-600">オプションメニュー</label>
                    <p class="flex items-center text-gray-600 mb-2 text-sm">
                        <input type="checkbox" id="opt1" name="opt1" class="mr-2">
                        <label for="opt1">無人販売所に寄り道：500円</label>
                    </p>
                    <p class="flex items-center text-gray-600 mb-2 text-sm">
                        <input type="checkbox" id="opt2" name="opt2" class="mr-2">
                        <label for="opt2">ガイド依頼：1000円</label>
                    </p>
                </div>
                <div class="relative mb-4">
                    <p id="total" name="total" class="text-md text-gray-600"></p>
                </div>
                <input type="submit" value="この内容で予約する"
                    class="text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg">
                <input type="hidden" id="total_value" name="total">
            </form>
            </div>
        </div>

    </section>


    <script>
        const opt1 = document.getElementById('opt1');
        const opt2 = document.getElementById('opt2');
        const resultElement = document.getElementById('total');
        const resultValueElement = document.getElementById('total_value');
        let price = parseInt("{{ $post->price }}");
        let total = price;

        updateResult();

        opt1.addEventListener('change', function() {
            if (this.checked) {
                total += 500;
            } else {
                total -= 500;
            }

            updateResult();
        });

        opt2.addEventListener('change', function() {
            if (this.checked) {
                total += 1000;
            } else {
                total -= 1000;
            }

            updateResult();
        });

        function updateResult() {
            resultElement.textContent = `合計金額: ${total}円`; // 結果を表示
            resultValueElement.value = `${total}`; // 結果を表示
        }
    </script>


</x-app-layout>

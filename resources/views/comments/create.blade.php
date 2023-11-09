<x-app-layout>
    <div class="container lg:w-1/2 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
        <h2 class="text-center text-lg font-bold pt-6 tracking-widest">予約</h2>

        <x-validation-errors :errors="$errors" />

        <form action="{{ route('posts.comments.store', $post) }}" method="POST" class="rounded pt-3 pb-8 mb-4">
            @csrf
            <div class="mb-4">
            </div>
            <input type="datetime-local" name="datetime" value=" {{ old('datetime') }}">

            <div class="mt-4">
                <input type="checkbox" id="opt1" name="opt1">
                <label for="opt1">無人販売所に寄り道：500円</label>
            </div>
            <div class="mt-4">
                <input type="checkbox" id="opt2" name="opt2">
                <label for="opt2">ガイド依頼：1000円</label>
            </div>
            <p id="total" name="total"></p>
            <input type="submit" value="この内容で予約する" class="w-1/3 items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </form>
    </div>

    <script>
        const option1 = document.getElementById('opt1');
        const option2 = document.getElementById('opt2');
        const resultElement = document.getElementById('total');
        let price = parseInt("{{ $post->price }}");
        let total = price;

        updateResult();

        option1.addEventListener('change', function() {
            if (this.checked) {
                total += 500;
            } else {
                total -= 500;
            }

            updateResult();
        });

        option2.addEventListener('change', function() {
            if (this.checked) {
                total += 1000;
            } else {
                total -= 1000;
            }

            updateResult();
        });

        function updateResult() {
            resultElement.textContent = `合計金額${total}円`; // 結果を表示
        }
    </script>
</x-app-layout>

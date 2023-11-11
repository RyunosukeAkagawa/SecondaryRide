<x-app-layout>
    <style>
        .slideshow-container {
            overflow: hidden;
            /* width: 100%; */
        }

        .mySlides {
            /* flex: 0 0 100%; */
            /* max-width: 80%; */

            opacity: 0;
            transition: opacity 2s ease;
        }

        .mySlides img {
            /* width: 100%; */
            height: auto;
        }
    </style>

    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-12 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2  lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left items-center text-center">
                <h1 class="title-font sm:text-3xl text-3xl mb-4 font-bold text-blue-900">ABOUT.
                </h1>
                <p class="leading-relaxed text-xl mb-1">SecondryRideに登録することで、地方の観光スポットへ手軽にアクセスできるようになります。</p>
                <div class="flex justify-center sm:flex text-blue-900">
                    <x-nav-link class="text-lg" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        使ってみる
                    </x-nav-link>
                </div>
            </div>

            <div class="slideshow-container">
                @foreach ($posts as $post)
                    <article class="mySlides lg:max-w-2xl lg:w-full md:w-1/2 w-5/6">
                        <a href="{{ route('posts.show', $post) }}">
                            <img src="{{ $post->image_url }}" alt="img" class="object-cover object-center rounded">
                        </a>
                    </article>
                @endforeach
            </div>


        </div>
    </section>
</x-app-layout>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var slides = document.getElementsByClassName("mySlides");
        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }
        slides[slideIndex - 1].style.display = "flex";
        fade(slides[slideIndex - 1], 0, 1, 2000); // 4000ミリ秒かけてフェードイン
        setTimeout(function() {
            fade(slides[slideIndex - 1], 1, 0, 2000); // 4000ミリ秒かけてフェードアウト
        }, 6000); // スライドが表示される時間
        setTimeout(showSlides, 10000); // スライドが切り替わる時間
    }

    function fade(element, startOpacity, endOpacity, duration) {
        var startTime = null;

        function animate(currentTime) {
            if (!startTime) startTime = currentTime;
            var elapsed = currentTime - startTime;
            var progress = elapsed / duration;
            var opacity = startOpacity + (endOpacity - startOpacity) * Math.min(progress, 1);
            element.style.opacity = opacity;
            if (progress < 1) {
                requestAnimationFrame(animate);
            }
        }
        requestAnimationFrame(animate);
    }
</script>

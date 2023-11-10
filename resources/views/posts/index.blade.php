<x-app-layout>
    <style>
        .slideshow-container {
            display: flex;
            overflow: hidden;
            width: 100%;
            justify-content: center;
        }

        .mySlides {
            flex: 0 0 100%;
            max-width: 80%;
            display: flex;
            justify-content: center;
            opacity: 0;
            transition: opacity 2s ease;
        }

        .mySlides img {
            width: 100%;
            height: auto;
        }
    </style>

    <p class="text-center p-5 text-xl font-bold">PICK UP</p>

    <div class="container max-w-7xl mx-auto px-4 md:px-12 pb-3 mt-3 bg-cover bg-center" style="background-image: url()">
        <div class="slideshow-container">
            @foreach ($posts as $post)
                <article class="mySlides w-full px-4 md:w-1/2 text-xl text-gray-800 leading-normal" style="display: none;">
                    <a href="{{ route('posts.show', $post) }}">
                        <p class="text-sm mb-2 md:text-base font-normal text-gray-600"></p>
                        <img src="{{ $post->image_url }}" alt="">
                        <p class="text-gray-700 text-base">{{ Str::limit($post->body, 50) }}</p>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
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

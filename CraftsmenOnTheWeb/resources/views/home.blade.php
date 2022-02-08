@extends('layouts.app')

@section('content')
{{-- <main class="sm:container sm:mx-auto sm:mt-10"> --}}
<main class="body-width">
    <div class="w-full my-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
            <header class="font-semibold py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Dashboard
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700">
                    {{-- Use the following line for the profile information --}}
                    Welcome {{ Auth::user()->name }}, fellow craftsman!
                </p>
            </div>
        </section>

        <h1 class="custom-h1">Latest news, stories, posts...</h1>
        <div class="container md:responsive mb-10">

            @foreach ($articles as $article)
            <a href="/article/{{ $article->title }}">
                <div class="card">
                    @if ($article->image)
                    <img src="/storage/{{ $article->image }}" alt="article_img" class="flex flex-col justify-center items-center">
                    @endif
                        <div class="description">
                            <p class="leading-normal warm-red">{{ $article->date }}</p>
                            <h4 class="leading-normal font-semibold">{{ $article->title }}</h4>
                            <p class="leading-normal italic">{{ $article->author }}</p>
                            <br>
                            <p class="leading-normal">{{ $article->body }}</p>
                        </div>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</main>
@endsection
<title>Home</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form>
                    <h1 style="font-size:20px"><b>{{$post->post_title}}</b></h1>
                    <br>
                    <p>{!! $post->post_text !!}</p><button style="color:white; padding: 10px 24px; font-size: 13px; background-color:#4CAF50; border-radius: 4px;" type="submit" formaction="{{route('posts.show',['id'=>$post->id])}}">Read More</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



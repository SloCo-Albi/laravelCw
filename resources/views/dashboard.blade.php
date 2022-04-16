<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>My Posts</h1>
                    <ul style="list-style-type:'-'">
                    @foreach($user_posts as $post)
                        <li><a href="{{route('posts.show',['id'=>$post->id])}}">{{$post->post_title}}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<title>Dashboard</title>
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
                    <form>
                        <li>{{$post->post_title}}</li><button style="color:white; padding: 10px 24px; font-size: 13px; background-color:#4CAF50; border-radius: 4px;" type="submit" formaction="{{route('posts.show',['id'=>$post->id])}}">Read More</button>
                    </form>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

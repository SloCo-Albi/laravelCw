<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- The following taliwind css is not my own. It has been edited by myself to add certain features to suit my web app -->
                    <!--I found it on the tailwind components website as an example -->
                    <!-- Link to page: https://tailwindcomponents.com/component/simple-blogpost-form-with-ckeditor -->
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">
                                    <form method="POST" action="{{route('posts.update',$post->id)}}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-4">
                                            <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label></br>
                                                <input type="text" class="border-2 border-gray-300 p-2 w-full" name="post_title" id="title" value="{{$post->post_title}}" required>
                                        </div>
                                        <div class="mb-4">
                                            <label class="text-xl text-gray-600">Magic Card</label></br>
                                            <select class="border-2 border-gray-300 border-r p-2" name="card_name" required disabled>
                                                <option>{{$post->magic_card->card_name}}</option>
                                            </select>
                                        </div>
                                        <div class="mb-8">
                                            <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                                            <textarea name="post_text" class="border-2 border-gray-500">{{$post->post_text}}</textarea>
                                        </div>
                                        <div class="flex p-1">
                                            <button role="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" required>Confirm Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace( 'post_text' );
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
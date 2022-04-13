<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($post->post_title) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p><i>Posted on {{$post->created_at}} by {{$post->user->name}}</i></p>
                    <p style="color:blue">Discussion about {{$post->magic_card->card_name}} the {{$post->magic_card->rarity}} {{$post->magic_card->type}} </p>
                    <br>
                    {!! $post->post_text !!}
                </div>
                @if (Auth::user()->id === $post->user->id)
                <form>
                <button style="color:white; padding: 10px 24px; font-size: 13px; background-color:#008CBA; border-radius: 4px;" type="submit" formaction="{{route('posts.edit',['id'=>$post->id])}}">Edit Post</button>
                </form>
              
                <form method="POST">
                @csrf
                @method('DELETE')
                <button style="color:white; padding: 10px 24px; font-size: 13px; background-color:#f44336; border-radius: 4px;" type="submit" formaction="{{route('posts.destroy',['id'=>$post->id])}}">Delete Post</button>
                </form>
                @endif
            </div>
        </div>
    </div>
        <!-- comment form -->
    <!-- List of all comments related to post -->
    <div id="comment" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @auth
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">
                                    <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                                        <textarea id="newCommentText" v-model="newCommentText" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
                                    </div>
                                    <div class="-mr-1">
                                        <button @click="createComment" class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100">Post Comment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endauth
                    <h1> All Comments </h1>
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div  class="p-6 bg-white border-b border-gray-200">
                                    <template  v-for="comment in comments"> 
                                        <p style="color:red"><i>Posted by @{{ comment.user.name }}</i></p>
                                        <p> @{{ comment.comment_text }} </p>
                                        <div v-if="{{Auth::user()->id}} === comment.user.id">
                                        <form>
                                        <button style="color:white; padding: 10px 24px; font-size: 16px; background-color:#4CAF50; border-radius: 4px;">Edit Comment</button>
                                        </form>
                                        </div>
                                        <hr style="border-top: 1px dashed black;">
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <body>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        const Comment = {
            data(){
                return{
                    comments: [],
                    newCommentText:"",
                }
            },
            methods:{
                createComment(){
                    axios.post("{{route('api.post.new',['id'=>$post->id])}}",{
                        comment_text:this.newCommentText,
                        post_id:{{$post->id}},
                        user_id:{{Auth::user()->id}},
                    }).then(response=>{
                        this.comments.push(response.data);
                        this.newCommentText="";
                    })
                    .catch(error=>{
                        console.log(error.response.data)
                    })
                }
            },
            mounted(){
                axios.get("{{route('api.post.comments',['id'=>$post->id])}}").then(response=>{
                    this.comments = response.data;
                }).catch(response=>{
                    console.log(response.data);
                })
            }
        }
        Vue.createApp(Comment).mount('#comment');
    </script>
    </body>
</x-app-layout>

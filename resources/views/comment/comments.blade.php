<section class="comments">
    @foreach($comments as $comment)
        <article class="comment">
            <a class="comment-img" href="#non">
                <img src="{{asset("/img/profile.png")}}" alt="" width="47" height="47" />
            </a>
            <div class="comment-body">
                <div class="text">
                    <p>{{$comment->comment}}</p>
                </div>
                <p class="attribution"> <strong class="text-info">{{\App\User::find($comment->commented_id)->nombre_usuario}}</strong> - {{$comment->created_at}}</p>
            </div>
        </article>
    @endforeach
</section>
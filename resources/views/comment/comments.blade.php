<section class="comments">
    @foreach($comments as $comment)
        <article class="comment">
            <a class="comment-img" href="#non">
                <img src="http://lorempixum.com/50/50/people/1" alt="" width="50" height="50" />
            </a>
            <div class="comment-body">
                <div class="text">
                    <p>{{$comment->comment}}</p>
                </div>
                <p class="attribution">by {{\App\User::find($comment->commented_id)->nombre_usuario}} - {{$comment->created_at}}</p>
            </div>
        </article>
    @endforeach
</section>
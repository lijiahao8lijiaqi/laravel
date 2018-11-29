<div class="list-group-item px-0" >

    <div class="row">
        <div class="col-auto">

            <!-- Avatar -->
            <a href="{{route('member.user.show',$active->causer)}}" class="avatar avatar-sm">
                <img src="{{$active->causer->icon}}" alt="..." class="avatar-img rounded-circle">
            </a>
        </div>
        <div class="col ml--2">
            <!-- Content -->
            <div class="small text-muted">
                <a href="{{route('member.user.show',$active->causer)}}">
                <strong class="text-body">{{$active->causer->name}}</strong>
                </a>
                    评论了
                <a href="{{route('home.article.show',$active->subject->article) . '#comment' . $active->subject->id}}">
                    <strong class="text-body">{{$active->subject->article->title}}</strong>

                </a>
            </div>

        </div>
        <div class="col-auto">

            <small class="text-muted">

                {{$active->created_at->diffForHumans()}}
            </small>

        </div>
    </div> <!-- / .row -->

</div>
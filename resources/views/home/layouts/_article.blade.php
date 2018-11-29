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
                @if($active['description'] =='created')
                发布了
                @elseif($active['description'] =='updated')
                 更新了
                @endif
                <a href="{{route('home.article.show',$active['properties']['attributes']['id'])}}">
                    <strong class="text-body">{{$active['properties']['attributes']['title']}}</strong>

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
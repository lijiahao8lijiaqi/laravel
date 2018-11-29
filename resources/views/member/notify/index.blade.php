@extends('home.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @include('member.layouts.menu')
            <div class="col-sm-9">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Files -->
                            <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">

                                            <!-- Title -->
                                            <h4 class="card-header-title">
                                                我的通知
                                            </h4>

                                        </div>
                                    </div> <!-- / .row -->
                                </div>

                                <div class="card-body">

                                    <!-- List group -->
                                    <div class="list-group list-group-flush my--3">
                                        @if (auth()->user()->notifications()->count() != 0)
                                            @foreach($notifications as $notification)
                                            <a class="list-group-item px-0" href="{{route('member.notify.show',$notification)}}">
                                                <div class="row">
                                                    <div class="col-auto">

                                                        <!-- Avatar -->
                                                        <div class="avatar avatar-sm">
                                                            <img src="{{$notification['data']['user_icon']}}" alt="..." class="avatar-img rounded-circle">
                                                        </div>

                                                    </div>
                                                    <div class="col ml--2">
                                                        @if ($notification->read_at)
                                                            <span class="text-muted" style="font-size: 4px">已读</span>
                                                        @else
                                                            <span class="" style="font-size: 4px">未读</span>
                                                        @endif
                                                        <!-- Content -->
                                                        <div class="small text-muted">
                                                            <strong class="text-body">{{$notification['data']['user_name']}}</strong> 评论了
                                                            <strong class="text-body">{{$notification['data']['article_title']}}</strong>
                                                        </div>


                                                    </div>
                                                    <div class="col-auto">

                                                        <small class="text-muted">
                                                            {{$notification->created_at->diffForHumans()}}
                                                        </small>

                                                    </div>
                                                </div> <!-- / .row -->

                                            </a>
                                            @endforeach
                                        @else
                                            <p class="text-muted text-center">暂无消息~~</p>
                                        @endif

                                    </div>

                                </div>
                                <!-- List -->

                            </div>

                        </div>

                    </div>
                </div> <!-- / .row -->
            </div>


        </div>

    </div>
    </div>
@endsection
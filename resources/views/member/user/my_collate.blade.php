@extends('home.layouts.master')

@section('content')
    <div class="main-content ">
        <div class="main-content">

            <div class="container mt-5">
                <div class="row">
                  @include('member.layouts.menu')
                    <div class="col-sm-9">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">

                                    <!-- 我的收藏 -->
                                    <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                                        <div class="card-header ">
                                            <div class="row align-items-center ">
                                                <div class="col ">

                                                    <!-- Title -->
                                                    <h4 class="card-header-title">
                                                       我的收藏
                                                    </h4>

                                                </div>
                                            </div> <!-- / .row -->
                                        </div>

                                        <div class="card-body">

                                            <!-- List -->
                                            <ul class="list-group list-group-lg list-group-flush list my--4">
                                                @foreach($collateData as $collate)
                                                <li class="list-group-item px-0">

                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <!-- Avatar -->
                                                            <a href="{{route('member.user.show',$collate->belongsModel->user)}}" class="avatar avatar-sm">
                                                                <img src="{{$collate->belongsModel->user->icon}}" alt="..." class="avatar-img rounded">
                                                            </a>
                                                        </div>
                                                        <div class="col ml--2">
                                                            <!-- Title -->
                                                            <h4 class="card-title mb-1 name">
                                                                <a href="{{route('member.user.show',$collate->belongsModel->user)}}">{{$collate->belongsModel->title}}</a>
                                                            </h4>
                                                            <p class="card-text small mb-1">
                                                                <a href="{{route('member.user.show',$collate->belongsModel->user)}}" class="text-secondary mr-2">
                                                                    <i class="fa fa-user-circle" aria-hidden="true"></i> {{$collate->belongsModel->user->name}}
                                                                </a>
                                                                <i class="fa fa-clock-o" aria-hidden="true"></i> {{$collate->belongsModel->created_at->diffForHumans()}}
                                                                <a href="javascript:;" class="text-secondary ml-2">
                                                                    <i class="fa fa-folder-o" aria-hidden="true"></i> {{$collate->belongsModel->category->title}}</a>
                                                            </p>
                                                        </div>
                                                    </div> <!-- / .row -->
                                                </li>
                                                    @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    {{$collateData->appends(['type'=>Request::query('type')])->links()}}
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>







    @endsection
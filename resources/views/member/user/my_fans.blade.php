@extends('home.layouts.master')
@section('content')

    <div class="container-fluid mt-5">
        <div class="row">
            @include('member.layouts.menu')
            <div class="col-sm-9">
                <div class="container-fluid">
                    @if($fans->count() == 0)
                        <p class="text-muted text-center mt-8">没有粉丝了~~~~~~~~</p>
                    @else
                    <div class="row">
            @foreach($fans as $fan)
            <div class="col-12 col-md-6 col-xl-4">

                <!-- Card -->
                <div class="card">
                    <div class="card-body text-center">

                        <a href="{{route ('member.my_fans',$fan)}}" class="avatar avatar-xl card-avatar">
                            <img src="{{$fan->icon}}" class="avatar-img rounded-circle border border-white" alt="...">
                        </a>

                        <h2 class="card-title">
                            <a href="{{route ('member.user.show',$fan)}}">{{$fan->name}}</a>
                        </h2>
                        <p class="card-text">
                  <span class="badge badge-soft-secondary">
                   粉丝:{{$fan->fans->count()}}
                  </span>
                            <span class="badge badge-soft-secondary">
                    关注:{{$fan->following->count()}}
                  </span>
                        </p>
                    @auth()
                        @can('isNotMine',$fan)
                        <hr>

                        <div class="row align-items-center justify-content-between ">

                            <div class="col-auto ">

                                <a href="{{route ('member.attention',$fan)}}" class="btn btn-sm btn-primary ">
                                    @if($fan->fans->contains(auth()->user()))
                                        取消关注
                                    @else
                                        关注 TA
                                    @endif
                                </a>

                            </div>
                        </div>
                            @endcan
                        @endauth

                    </div>

                </div>

            </div>
                @endforeach
                    </div>
                        {{$fans->links()}}
                        @endif
                </div>
            </div>
        </div>

        </div>
    </div>

    @endsection


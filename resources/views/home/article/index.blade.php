@extends('home.layouts.master')
@section('content')

    <div class="container mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Files -->
                    <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Title -->
                                    <div>

                                            <a class="btn btn-secondary btn-sm" href="{{route ('home.index')}}">返回首页</a>



                                    </div>

                                </div>
                                <div class="col-auto">

                                    <!-- Dropdown -->
                                    <div class="dropdown">

                                        <!-- Toggle -->
                                        <a href="#!" class="small text-muted dropdown-toggle" data-toggle="dropdown">
                                            筛选
                                        </a>

                                        <!-- Menu -->
                                        <div class="dropdown-menu">
                                            @foreach($categories as $category)
                                            <a class="dropdown-item sort" data-sort="name" href="{{route('home.article.index',['category'=>$category['id']])}}">
                                                {{$category['title']}}
                                            </a>
                                                @endforeach

                                        </div>

                                    </div>

                                </div>

                                <div class="col-auto">
                                @auth()
                                    <!-- Button -->
                                    <a href="{{route ('home.article.create')}}" class="btn btn-sm btn-primary">
                                        发表文章
                                    </a>
                                    @else
                                        <a href="{{route('login',['from'=>url()->full()])}}" class="btn btn-sm btn-primary">
                                            发表文章
                                        </a>
                                  @endauth
                                </div>

                            </div> <!-- / .row -->
                        </div>

                        <div class="card-body">

                            <!-- List -->
                            <ul class="list-group list-group-lg list-group-flush list my--4">
                                @foreach($articles as $article)
                                    <li class="list-group-item px-0">

                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <a href="{{route ('member.user.show',$article->user)}}" class="avatar avatar-sm">
                                                    <img src="{{$article->user->icon}}" alt="..." class="avatar-img rounded">
                                                </a>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Title -->
                                                <h4 class="card-title mb-1 name">
                                                    <a href="{{route('home.article.show',$article)}}">{{$article->title}}</a>
                                                </h4>

                                                <p class="card-text small mb-1">
                                                    <a href="javascript:;" class="text-secondary mr-2">
                                                        <i class="fa fa-user-circle" aria-hidden="true"></i> {{$article->user->name}}
                                                    </a>

                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> {{$article->created_at->diffForHumans()}}

                                                    <a href="javascript:;" class="text-secondary ml-2">
                                                        <i class="fa fa-folder-o" aria-hidden="true"></i> {{$article->category->title}}
                                                    </a>
                                                </p>

                                            </div>
                                            <div class="col-auto">

                                                <!-- Dropdown -->
                                                <div class="dropdown">
                                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="{{route('home.article.show',$article)}}" class="dropdown-item">
                                                            查看
                                                        </a>
                                                        @can('update',$article)
                                                            <a href="{{route('home.article.edit',$article)}}" class="dropdown-item">
                                                                编辑
                                                            </a>
                                                        @endcan
                                                        @can('update',$article)
                                                            <a href="javascript:;" onclick="del(this)" class="dropdown-item">
                                                                删除
                                                            </a>

                                                            <form action="{{route('home.article.destroy',$article)}}" method="post">
                                                                @csrf @method('DELETE')
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    </li>
                                @endforeach
                            </ul>

                        </div>

                    </div>


                    {{ $articles->appends(['category' => Request::query('category')])->links()}}
                </div>
            </div> <!-- / .row -->
        </div>
    </div>

    @endsection
@push('js')
    <script>
        function del(obj) {
            require(['hdjs','bootstrap'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    $(obj).next('form').submit();
                })
            })
        }
    </script>
    @endpush
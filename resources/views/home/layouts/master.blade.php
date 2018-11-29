
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset ('org/Dashkit-1.1.2/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset ('org/Dashkit-1.1.2/assets')}}/css/theme.min.css">

    <title>巨来电</title>
</head>
<body>

<!-- TOPNAV
================================================== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">

        <!-- Toggler -->
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        {{--头部图片--}}
        <a class="navbar-brand mr-auto" href="javascript:;">
            <img src="{{asset('org/images/jld.jpg')}}" alt="..." class="navbar-brand-img">
        </a>

        <!-- Form -->


        <form class="form-inline mr-4 d-none d-lg-flex" action="{{route ('home.search')}}">

            <div class="input-group input-group-rounded input-group-merge" data-toggle="lists" data-lists-values='["name"]'>

                <!-- Input -->
                <input type="text" name="wd" class="form-control form-control-prepended  dropdown-toggle search" data-toggle="dropdown" placeholder="" aria-label="Search">
                <button class="input-group-prepend btn-link" style="border: none;box-shadow: none;margin: 0;padding: 0; cursor: pointer">
                    <div class="input-group-text">
                        <i class="fe fe-search">搜索 |</i>
                    </div>
                </button>
            </div>
        </form>

        <!-- User -->
        <div class="navbar-user">

            <!-- Dropdown -->
            @auth()
            <div class="dropdown mr-4 d-none d-lg-flex">

                <!-- Toggle -->

                <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <span class="icon  @if(auth()->user()->unreadNotifications()->count()!=0) active @endif ">

                        <i class="fe fe-bell"></i>
              </span>
                </a>



                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h5 class="card-header-title">
                                    消息({{auth()->user()->unreadNotifications()->count()}})
                                </h5>

                            </div>
                            <div class="col-auto">

                                <!-- Link -->
                                @auth()
                                <a href="{{route ('member.notify',auth ()->user ())}}" class="small">
                                    更多消息
                                </a>
                                    @endauth

                            </div>
                        </div> <!-- / .row -->
                    </div> <!-- / .card-header -->
                    <div class="card-body">
                        @auth()
                        <!-- List group -->
                        <div class="list-group list-group-flush my--3">
                            @if(auth()->user()->unreadNotifications()->count() != 0)
                            @foreach(auth()->user()->unreadNotifications()->limit(3)->get() as $notification)
                            <a class="list-group-item px-0" href="{{route('member.notify.show',$notification)}}">

                                <div class="row">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar avatar-sm">
                                            <img src="{{$notification['data']['user_icon']}}" alt="..." class="avatar-img rounded-circle">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

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
                        @endauth
                    </div>
                </div> <!-- / .dropdown-menu -->

            </div>
            @endauth
            {{--***********文章管理图标****************--}}
            <div class="dropdown mr-4 d-none d-lg-flex">
                <!-- Toggle -->
                <a href="{{route('home.article.create')}}" class="text-muted" >
                  <span class="icon ">
                    <i class="fe fe-edit-3"></i>
                  </span>
                </a>
            </div>
            {{--************文章管理图标********************--}}
            <!-- Dropdown -->

            <div class="dropdown">
            @auth()
                <!-- Toggle -->
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route ('member.user.show',auth ()->user ())}}" class="dropdown-item">{{auth ()->user ()->name}}</a>
                        @can('view',auth ()->user ())
                            <a href="{{route ('admin.index')}}" class="dropdown-item">后台管理</a>
                        @endcan
                        <hr class="dropdown-divider">
                        <a href="{{route ('logoff')}}" class="dropdown-item">退出登陆</a>
                    </div>
                @else
                    <a href="{{route ('login')}}" class="btn btn-white btn-sm">请登陆</a>&nbsp&nbsp
                    <a href="{{route ('register')}}" class="btn btn-white btn-sm">立即注册</a>

                @endauth
            </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <input type="search" class="form-control form-control-rounded" placeholder="Search" aria-label="Search">
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link font-weight-bold text-primary" href="{{route ('home.index')}}">
                        首页
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="{{route ('home.article.index')}}" >
                        文章列表
                    </a>

                </li>


            </ul>

        </div>

    </div> <!-- / .container -->
</nav>

<!-- MAIN CONTENT
================================================== -->
<div class="main-content ">
    @yield('content')
</div>

<footer class="container">

    <hr class="my-0">
    <div class="text-center py-6">
        <div>
            <p class="text-muted">我们的使命：一个人至少拥有一个梦想，有一个理由去坚强。心若没有栖息的地方，到哪里都是在流浪。。</p>
            <small class="small text-secondary">
                Copyright
                © 2010-2018 jiahao98.cn
                巨来电官网   京ICP备18058725号-1
            </small>
            <p class="small text-secondary">
                <i class="fa fa-phone-square" aria-hidden="true"></i> : 18673830211
                <i class="fa fa-telegram ml-2" aria-hidden="true"></i> :
                <a href="mailto:714438134@qq.com" class="text-secondary">
                   714438134@qq.com
                </a>
                <br>
            </p>
        </div>

    </div>
</footer>
<!-- JAVASCRIPT
================================================== -->
@include('layouts.hdjs')
<script>
    require(['bootstrap']);
</script>
@include('layouts.message')

@stack('js')


</body>
</html>
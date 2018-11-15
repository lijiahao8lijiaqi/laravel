
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

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset ('org/Dashkit-1.1.2/assets')}}/css/theme.min.css">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Dashkit</title>
</head>
<body class="d-flex align-items-center bg-white border-top-2 border-primary">

<!-- CONTENT

================================================== -->
<div class="container">

    <div class="row align-items-center">

        <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">

            <!-- Image -->
            <div class="text-center">
                <img src="{{asset ('org/Dashkit-1.1.2/assets')}}/img/illustrations/happiness.svg" alt="..." class="img-fluid">
            </div>

        </div>
        <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">

            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
               登陆
            </h1>

            <!-- Subheading -->
            <p class="text-muted text-center mb-5">
                Free access to our dashboard.
            </p>

            <!-- Form -->
            <form action="{{route ('login')}}" method="post">
            @csrf
            <!-- Email address -->

                <div class="form-group">

                    <!-- Label -->
                    <label>
                        邮箱
                    </label>

                    <!-- Input -->
                    <input type="email" name="email" value="714438134@qq.com" class="form-control" placeholder="请输入邮箱">

                </div>
                <!-- 密码 -->
                <div class="form-group">

                    <!-- Label -->
                    <label>
                        密码
                    </label>

                    <!-- Input group -->
                    <div class="input-group input-group-merge">

                        <!-- Input -->
                        <input type="password" name="password" class="form-control form-control-appended" placeholder="请输入密码">

                        <!-- Icon -->
                        <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fe fe-eye"></i>
                  </span>
                        </div>

                    </div>
                    <a href="{{route ('passwordReset')}}" style="font-size: 13px; float: right">忘记密码</a>
                </div>
                <button class="btn btn-lg btn-block btn-primary mb-3">

                    登陆账号
                </button>
                <!-- Link -->
                <div class="text-center">
                    <small class="text-muted text-center">

                        {{--<a href="{{route ('home')}}" style="font-size: 18px">返回首页</a><br><br>--}}
                        还没账号&nbsp|&nbsp <a href="{{route ('register')}}" style="font-size: 12px; color: red">去注册</a>.

                    </small>
                </div>

            </form>

        </div>
    </div> <!-- / .row -->
</div> <!-- / .container -->

@include('layouts.hdjs')
@include('layouts.message')

<script>
    require(['hdjs','bootstrap'], function (hdjs) {
        let option = {
            //按钮
            el: '#bt',
            //后台链接
            url: '{{route ('code.send')}}',
            //验证码等待发送时间
            timeout: 30,
            //表单，手机号或邮箱的INPUT表单
            input: '[name="email"]'
        };
        hdjs.validCode(option);
    })
</script>
</body>
</html>
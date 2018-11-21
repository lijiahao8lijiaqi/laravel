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
    <title>修改密码</title>
</head>
<body class="d-flex align-items-center bg-white border-top-2 border-primary">

<!-- CONTENT
================================================== -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-xl-4 my-5">

            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                修改密码
            </h1>

            <!-- Subheading -->
            <p class="text-muted text-center mb-5">

            </p>

            <!-- Form -->
            <form method="post" action="{{route ('passwordReset')}}">
            @csrf

                <div class="form-group">

                    <!-- Label -->
                    <label>邮箱</label>

                    <!-- Input -->
                    <input type="email" name="email" value="714438134@qq.com" class="form-control" placeholder="请输入邮箱">

                </div>
                <div class="form-group">

                    <!-- Label -->
                    <label>新密码</label>

                    <!-- Input -->
                    <input type="password" name="password" class="form-control form-control-appended " placeholder="输入新密码">

                </div>
                <div class="form-group">

                    <!-- Label -->
                    <label>确定新密码</label>

                    <!-- Input -->
                    <input type="password" name="password_confirmation" class="form-control form-control-appended" placeholder="再次输入新密码">

                </div>
                <div class="form-group">

                    <!-- Label -->
                    <label>验证码</label>

                    <!-- Input -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="请输入验证码" name="code" value="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="bt">发送验证码</button>
                        </div>
                    </div>

                </div>

                <!-- Submit -->
                <button class="btn btn-lg btn-block btn-primary mb-3">
                    修改密码
                </button>

                <!-- Link -->
                <div class="text-center">
                    <small class="text-muted text-center">
                    已经修改完成|去 <a href="{{route ('login')}}" style="color: red">登陆</a>
                    </small>
                </div>

            </form>

        </div>
    </div> <!-- / .row -->
</div> <!-- / .container -->

<!-- JAVASCRIPT
================================================== -->
@include('layouts.hdjs')
@include('layouts.message')

<script>
    require(['hdjs','bootstrap'], function (hdjs) {
        let option = {
            //按钮
            el: '#bt',
            //后台链接
            url: '{{route ('util.code.send')}}',
            //验证码等待发送时间
            timeout: 30,
            //表单，手机号或邮箱的INPUT表单
            input: '[name="email"]'
        };
        hdjs.validCode(option);
    })
</script>
{{--<!-- Libs JS -->--}}
{{--<script src="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/jquery/dist/jquery.min.js"></script>--}}
{{--<script src="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--<script src="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/chart.js/dist/Chart.min.js"></script>--}}
{{--<script src="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/chart.js/Chart.extension.min.js"></script>--}}
{{--<script src="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/highlight/highlight.pack.min.js"></script>--}}
{{--<script src="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/flatpickr/dist/flatpickr.min.js"></script>--}}
{{--<script src="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>--}}
{{--<script src="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/list.js/dist/list.min.js"></script>--}}
{{--<script src="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/quill/dist/quill.min.js"></script>--}}
{{--<script src="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/dropzone/dist/min/dropzone.min.js"></script>--}}
{{--<script src="{{asset ('org/Dashkit-1.1.2/assets')}}/libs/select2/dist/js/select2.min.js"></script>--}}

{{--<!-- Theme JS -->--}}


</body>
</html>
@extends('home.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
    @include('member.layouts.menu')
            <div class="col-sm-9">
    <div class="row justify-content-center  __web-inspector-hide-shortcut__">

        <input type="hidden" name="_token" value="meB8V3w51M6Fv2HJh2u70JUOzWk9CeaN2PFfdCeA">            <input type="hidden" name="_method" value="PUT">            <div class="card">
            <div class="card-header">
                <h4>头像设置</h4>
            </div>
            <div class="card-body  text-center">

                <div class="avatar avatar-xxl mb-2" style="cursor: pointer" onclick="upImagePc(this)">
                    <img src="{{$user->icon}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <br>
                <span class="help-block text-muted small">请上传 200X200 像素并小于200KB的JPG图片</span>
            </div>
        </div>
        <form id="editIcon" action="{{route ('member.user.update',$user)}}" method="post" class="col-sm-8" id="form-icon">
        @csrf @method('PUT')
            <input type="hidden" name="icon" value="{{$user->icon}}">
        </form>
    </div>
          </div>
        </div>
    </div>
    @endsection
@push('js')
<script>
    require(['hdjs','bootstrap']);
    //上传图片
    function upImagePc() {
        require(['hdjs'], function (hdjs) {
            var options = {
                multiple: false,//是否允许多图上传
                //data是向后台服务器提交的POST数据
                data: {name: '后盾人', year: 2099},
            };
            hdjs.image(function (images) {
                // alert(1);
                //上传成功的图片，数组类型
                $("[name='icon']").val(images[0]);
                 $(".avatar-img").attr('src', images[0]);
                $('#editIcon').submit();
            }, options)
        });
    }

</script>
    @endpush

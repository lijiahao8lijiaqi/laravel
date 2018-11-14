//正确弹窗
<script>
    @if (session()->has('danger'))
    require(['hdjs'], function (hdjs) {
        hdjs.swal({
            text: "{{session()->get('danger')}}",
            button:false,
            icon:'warning'
        });
    })
    @endif
</script>
//错误弹窗
<script>
    @if (session()->has('success'))
    require(['hdjs'], function (hdjs) {
        hdjs.swal({
            text: "{{session()->get('success')}}",
            button:false,
            icon:'success'
        });
    })
    @endif
</script>

<script>
    @if ($errors->any())
    require(['hdjs'], function (hdjs) {
        hdjs.swal({
            text: "@foreach ($errors->all() as $error) {{ $error }} @endforeach",
            button:false,
            icon:'warning'
        });
    })
    @endif
</script>
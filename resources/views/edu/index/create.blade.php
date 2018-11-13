<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
我是加载页面
<form action="{{route ('edu.index.store')}}" method="post">
    @csrf
    标题:<input type="text" name="title">
    <br>
    <button>提交</button>
</form>
</form>
</body>
</html>
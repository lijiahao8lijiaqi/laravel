<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
我是老二的模板

<form action="{{route ('article.store')}}" method="post">
    @csrf
    标题:<input type="text" name="tilte">
    <br>
    <button>提交</button>
</form>
</body>
</html>
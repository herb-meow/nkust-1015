@extends('layouts.base')

@section('title')
這是清單內容頁
@endsection

@section('content')
<h2>清單內容頁</h2>
<hr>

@auth
    <form method=post action='/addlist/'>
    @csrf
    清單名稱：<input type=text size=40 name=title>
    <input type=submit value=新增>
    </form>
@endif

<table class='table table-hover table-dark'>
<thead>
    <tr><th>ID</th><th>name</th>
    @auth 
    <th>管理</th>
    @endif 
    </tr>
</thead>
<tbody>
@forelse ($titles as $title)
    <tr>
    <td>{{ $title->id }}</td>
    <td><a href='/showlist/{{$title->id}}/'>{{ $title->name }}</a></td>
    @auth 
    <td><a href="/delete/{{$title->id}}/">刪除</a></td>
    @endif 
    </tr>
@empty
    <tr><td>目前沒有儲存任何清單</td></tr>
@endforelse
</tbody>
</table>

@endsection
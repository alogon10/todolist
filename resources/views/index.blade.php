<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <title>COACHTECH</title>
</head>

<body>
  <div class="content">

  <h1>Todo  List</h1>
    @if (count($errors) > 0)
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
    </ul>
  @endif
  <form action="/" method="POST">
    @csrf
    <input class="input" type="text" name="content" >
    <input class="button" type="submit" value="追加" >
  <table>
    <tr>
      <th>作成日</th>
      <th>タスク名</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
@foreach ($items as $item)
    <tr>
      <td>
        {{$item->created_at}}
      </td>
      <td>
        <input class="textbox" name="taskupdate" type="text" value={{$item->content}}>
      </td>
      <td>
        <input formaction="/todo/update" class="update" type="submit" value="更新" name="<?php $itemID = $item->id?>">
      </td>
      <td>
        <input formaction="/todo/delete" class="delete" type="submit" value="削除" name="delete">
        </form>
      </td>
    </tr>
@endforeach
  </table>

</div>
</body>

</html>
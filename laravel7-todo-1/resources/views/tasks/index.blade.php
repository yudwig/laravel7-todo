@extends('app')

@section('content')
    <div class="links">
        <a href="{{ route('categories.showEdit', ['id' => 1]) }}">カテゴリ1</a>
    </div>
    <hr>
    <table class="m-b-md" style="word-break: break-all;">
        <colgroup style="width: 300px;"></colgroup>
        <tr>
            <td>
                <div class="links">
                    <a href="{{ route('tasks.showEdit', ['id' => 1]) }}">タスク1</a>
                </div>
            </td>
            <td>
                <form method="post" action="{{ route('tasks.update', ['id' => 1]) }}">
                    @csrf
                    <input type="hidden" name="completed" value="1">
                    <div class="links">
                        <a href="javascript:void(0);" onclick="this.closest('form').submit();">完了</a>
                    </div>
                </form>
            </td>
        </tr>
        <tr>
            <td><div class="links"><a>タスク2</a></div></td>
            <td><div class="links"><a>完了</a></div></td>
        </tr>
        <tr>
            <td><div class="links"><a style="text-decoration: line-through;">タスク3</a></div></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><div class="links"><a href="{{ route('tasks.showCreate', ['id' => 1]) }}">追加</a></div></td>
        </tr>
    </table>
    <div class="links">
        <a href="{{ route('categories.showCreate') }}">追加</a>
    </div>
@endsection

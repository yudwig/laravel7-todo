@extends('app')

@section('content')
    @foreach ($categories as $category)
        <div class="links">
            <a href="{{ route('categories.showEdit', ['id' => $category->id]) }}">{{$category->title}}</a>
        </div>
        <hr>
        <table class="m-b-md" style="word-break: break-all;">
            <colgroup style="width: 300px;"></colgroup>
            @foreach ($category->task as $task)
                <tr>
                    <td>
                        <div class="links">
                            <a
                                @if ($task->completed) style="text-decoration: line-through;" @endif
                                href="{{ route('tasks.showEdit', ['id' => $task->id]) }}">
                                {{$task->title}}
                            </a>
                        </div>
                    </td>
                    <td>
                        @if (!$task->completed)
                            <form method="post" action="{{ route('tasks.update', ['id' => $task->id]) }}">
                                @csrf
                                <input type="hidden" name="completed" value="1">
                                <div class="links">
                                    <a href="javascript:void(0);" onclick="this.closest('form').submit();">完了</a>
                                </div>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td>
                    <div class="links">
                        <a href="{{ route('tasks.showCreate', ['id' => $category->id]) }}">追加</a>
                    </div>
                </td>
            </tr>
        </table>
    @endforeach
    <div class="links">
        <a href="{{ route('categories.showCreate') }}">追加</a>
    </div>
@endsection


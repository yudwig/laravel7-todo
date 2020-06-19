@extends('app')

@section('content')
    <h3>タスク編集</h3>
    <div class="m-b-md">
        <form name="updateForm" method="post" action="{{ route('tasks.update', ['id' => $task->id]) }}">
            @csrf
            <label>
                <input type="text" name="title" value="{{$task->title}}">
            </label>
            <input type="hidden" name="completed" value="0">
        </form>
        <form name="deleteForm" method="post" action="{{ route('tasks.delete', ['id' => $task->id]) }}">
            @csrf
        </form>
    </div>
    <div class="links">
        <a href="javascript:void(0);" onclick="document.updateForm.submit();">更新</a>
        <a href="javascript:void(0);" onclick="document.deleteForm.submit();">削除</a>
    </div>
@endsection


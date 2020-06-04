@extends('app')

@section('content')
    <h3>新規タスク</h3>
    <div class="m-b-md">
        <form name="createForm" method="post" action="{{ url()->current() }}">
            @csrf
            <label>
                <input type="text" name="title">
            </label>
            <input type="hidden" name="completed" value="0">
        </form>
    </div>
    <div class="links">
        <a href="javascript:void(0);" onclick="document.createForm.submit();">作成</a>
    </div>
@endsection


@extends('app')

@section('content')
    <h3>新規カテゴリ</h3>
    <div class="m-b-md">
        <form name="createForm" method="post" action="{{ route('categories.create') }}">
            @csrf
            <label>
                <input type="text" name="title">
            </label>
        </form>
    </div>
    <div class="links">
        <a href="javascript:void(0);" onclick="document.createForm.submit();">作成</a>
    </div>
@endsection


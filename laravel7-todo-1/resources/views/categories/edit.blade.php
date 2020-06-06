@extends('app')

@section('content')
    <h3>カテゴリ編集</h3>
    <div class="m-b-md">
        <form name="updateForm" method="post" action="{{ route('categories.update', ['id' => $category->id]) }}">
            @csrf
            <label>
                <input type="text" name="title" value="{{$category->title}}">
            </label>
        </form>
        <form name="deleteForm" method="post" action="{{ route('categories.delete', ['id' => $category->id]) }}">
            @csrf
        </form>
    </div>
    <div class="links">
        <a href="javascript:void(0);" onclick="document.updateForm.submit();">更新</a>
        <a href="javascript:void(0);" onclick="document.deleteForm.submit();">削除</a>
    </div>
@endsection


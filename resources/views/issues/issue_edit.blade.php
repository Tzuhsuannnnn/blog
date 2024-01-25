@extends('layout.app')

@section('content')


<div class="am-container">
    <div class="header">
        <div class="am-g">
            <h1>編輯活動</h1>
        </div>
        
    </div>

    <form class="am-form" action="{{route('issues.update',$issue->id)}}" method="post">
        <!--提交表單安全保護-->
        {{csrf_field() }}
        <!--讓laravel可以用put(更新)-->
        {{method_field('PUT')}}
	   <fieldset>
          <div class="am-form-group">
              <label>輸入新標題</label>
              <input type="text" placeholder="{{$issue->title}}" name="title" >
          </div>

          <div class="am-form-group">
              <label>輸入新内容</label>
              <textarea rows="5" name="content"> </textarea>
          </div>

          <button type="submit" class="am-btn am-btn-default">提交</button>
      </fieldset>
    </form>
</div>

@endsection
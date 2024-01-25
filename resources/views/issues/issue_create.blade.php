@extends('layout.app')

@section('content')


<div class="am-container">
    <div class="header">
        <div class="am-g">
            <h1>添加新活動</h1>
        </div>
        
    </div>

    <form class="am-form" action="{{route('issues.store')}}" method="post">
        <!--提交表單安全保護-->
        {{csrf_field() }}
	   <fieldset>
          <div class="am-form-group">
              <label>標題</label>
              <input type="text" placeholder="输入活动标题" name="title">
          </div>

          <div class="am-form-group">
              <label>内容</label>
              <textarea rows="5" name="content"></textarea>
          </div>

          <button type="submit" class="am-btn am-btn-default">提交</button>
      </fieldset>
    </form>
</div>

@endsection
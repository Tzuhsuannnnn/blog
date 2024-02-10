@extends('layout.app')

@section('content')

@if (auth()->check()) <!-- 檢查用戶是否已登入 -->

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
              <input type="text" placeholder="輸入活動標題" name="title">
          </div>

          <div class="am-form-group">
              <label>類型(category)</label>
              <select id="categorySelect" name="category">
              <option value="">請選擇類型</option>
                @foreach($categories as $category) 
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
          </div>
          
          <div class="am-form-group">
              <label>内容</label>
              <textarea rows="5" name="content"></textarea>
          </div>

          <input type="hidden" name="category_id" id="hiddenCategoryId">
          <button type="submit" class="am-btn am-btn-default">提交</button>
      </fieldset>
    </form>
</div>


@else <!--未登入-->
<script>
    alert('請先登入以添加新活動。');
    window.location.href = '/';
</script>
@endif


<script>
    // 當下拉選單改變時，將選擇的值設定到 hiddenCategoryId 欄位
    document.getElementById('categorySelect').addEventListener('change', function() {
        var hiddenCategoryId = document.getElementById('hiddenCategoryId');
        hiddenCategoryId.value = this.value;
    });
</script>

@endsection
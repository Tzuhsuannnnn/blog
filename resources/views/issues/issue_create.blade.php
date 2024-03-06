@extends('layout.app')

@section('content')

@if (auth()->check()) <!-- 檢查用戶是否已登入 -->

<div class="am-container">
    <div class="header">
        <div class="am-g">
            <h1>添加新活動</h1>
        </div>
        
    </div>

    <form class="am-form" action="{{route('issues.store')}}" method="post" enctype="multipart/form-data">
        <!--提交表單安全保護-->
        {{csrf_field() }}
	   <fieldset>
          <div class="am-form-group">
              <label>標題</label>
              <input type="text" placeholder="輸入活動標題" name="title" class="form-control">
          </div>

          <div class="am-form-group">
              <label>類型(category)</label>
              <select id="categorySelect" name="category" class="form-control">
              <option value="">請選擇類型</option>
                @foreach($categories as $category) 
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
          </div>

          <div class="am-form-group">
              <label>add tag</label>
              <select class="tags form-control" id="tags" name="tags[]" multiple=multiple>
              
            </select>
            @error('tags')
            <label class="text-danger">{{message}}</label>
            @enderror
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
    // Category list 當下拉選單改變時，將選擇的值設定到 hiddenCategoryId 欄位
    document.getElementById('categorySelect').addEventListener('change', function() {
        var hiddenCategoryId = document.getElementById('hiddenCategoryId');
        hiddenCategoryId.value = this.value;
    });
</script>


<script>
    // Tag list (Select2)
    $(document).ready(function(){


        $('#tags').select2({
            placeholder:'select tags',
            allowclear:true,
            ajax:{
                url:"{{route('get-tag')}}",
                type:"post",
                delay:250,
                dataType:'json',
                data: function(params){
                    return{
                        name:params.term,
                        "_token":"{{csrf_token()}}",
                    };
                },

                processResults:function(data){
                    return{
                        results: $.map(data,function(item){
                            return{
                                id:item.id,
                                text:item.name
                            }
                        })
                    }
                }

            }
        });

    })


</script>


@endsection
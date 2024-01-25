@extends('layout.app')

@section('content')
    <!--CSS-->
    <style>
        .border-box {
            border: 1px solid #ccc; /* 底框樣式和顏色 */
            padding: 10px; /* 可選，添加內邊距以提高內容可讀性 */
        }
    
    </style>

    <div class="issue-heading">
        <div class="am-container">
            {{$issue->title}}
            <!--刪除issue(傳入issue_id)-->
            <a href="{{route('issues.destroy', $issue->id)}}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?" type="button" class="am-btn am-btn-danger am-radius am-btn-sm">Destroy</a>     
            <a href="{{route('issues.edit', $issue->id)}}" data-token="{{csrf_token()}}" data-confirm="Are you sure?" type="button"  class="am-btn am-btn-primary am-radius am-btn-sm">Edit</a>
            
        </div>
    </div>

    <div class="am-container">
         <h2>活動描述</h2>


        <div class="border-box">
            <p>{{$issue->content}}</p>
        </div>
        <ul class="am-comments-list am-comments-list-flip">

        <h2>留言板</h2>
        @foreach($comments as $comment)

            <li class="am-comment" style="background-color: #f0f0f0; padding: 10px; margin-bottom: 10px;">
                <img src="/assets/img/avatar1.png" alt="" class="am-comment-avatar" width="100" height="100">
                <div class="am-comment-main">
                    <header class="am-comment-hd">
                        <div class="am-comment-meta">
                            <span class="am-comment-author">{{ $comment->name }}</span>
                            {{ $comment->created_at->diffForHumans() }}
                        </div>
                    </header>
                    <div class="am-comment-bd"><p>{{$comment->content}}</p></div>
                </div>
            </li>
        @endforeach    
            
        </ul>

        <form class="am-form" method="post" action="{{route('comments.store')}}">
        {{csrf_field() }}
        <!--傳入issue_id-->
        <input type="hidden" name="issue_id" value="{{ $issue->id }}" >
            <fieldset>
                <div class="am-form-group">
                    <label>留言</label>
                    <p>帳號名稱</p>
                    <input type="text" placeholder="輸入名稱" name="name">
                </div>

                <div class="am-form-group">
                    <p>email</p>
                    <input type="email" placeholder="輸入email" name="email">
                </div>

                <div class="am-form-group">
                    <textarea rows="5" name="content"></textarea>
                </div>

                <p>
                    <button type="submit" class="am-btn am-btn-default">提交</button>
                </p>
            </fieldset>
        </form>
    </div>

@endsection
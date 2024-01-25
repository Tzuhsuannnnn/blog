@extends('layout.app')

@section('content')

<div class="get">
    <div class="am-g">
        <div class="am-u-lg-12">
            <h1 class="get-title">It's Party Time!<br>Drink Up!</h1>
            <p>
                <a href="{{route('issues.create')}}" class="am-btn am-btn-default am-btn-secondary">發布新活動</a>
            </p>
        </div>
    </div>
</div>

<div class="detail">
    <div class="am-g am-container">
        <div class="am-u-lg-12">
            <h1 class="detail-h1">最新的活動</h1>
        </div>
    </div>
</div>

<div class="am-container">
    <div data-am-widget="list_news" class="am-list-news am-list-news-default">
        <!--列表標題-->
        <!--每一個事件-->
        <div class="am-list-news-bd">
            <ul class="am-list">
            
            <!--先取最後的issue-->
            @foreach($issues->reverse()->take(2) as $issue)
                <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                    <div class="am-u-sm-2 am-u-md-1 am-list-thumb">
                        <a href="/issues/{{$issue->id}}">
                            <img src="assets/img/avatar1.png" alt=""/>
                        </a>
                    </div>

                    <div class="am-u-sm-7 am-u-md-9 am-list-main">
                        <h3 class="am-list-item-hd">
                            <a href="{{route('issues.show', $issue->id)}}" class="">{{ $issue ['title'] }}</a>
                        </h3>

                        <div class="am-list-item-text">
                            <span class="am-badge am-badge-secondary am-radius">read</span>
                            <span class="meta-data">Aaron</span>
                            <!--從create_at時間到現在的時間差-->
                            {{ $issue->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="am-u-sm-3 am-u-md-2 issue-comment-count">
                        <span class="am-icon-comments"></span>
                        <a href="{{route('issues.show', $issue->id)}}">2</a>
                    </div>
                </li>
            
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection

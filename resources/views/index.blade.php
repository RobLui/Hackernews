@extends('layouts.app')

@section('content')
    <title>Hackernews</title>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include("common.messages")
                <div class="panel panel-default">
                    <div class="panel-heading">Article overview</div>
                    <div class="panel-content">
                        <ul class="article-overview">
                            @if(count($articles) > 0)
                                @foreach($articles as $article)
                                    <li>
                                        <tr>
                                            <th>
                                                @if(isset(Auth::user()->name))
                                                    <div class="vote">
                                                        @else
                                                            <div class="vote disabled">
                                                                @endif
                                                                <form class="form-group" action="/registerVote/{{$article->id}}" method="POST">
                                                                    @foreach($votes as $vote)
                                                                        @if(isset(Auth::user()->name))
                                                                            @if($article->id == $vote->article_id)
                                                                                @if($vote->voted_by == Auth::user()->name)
                                                                                    @if($vote->up_down == "up")
                                                                                        <div class="form-inline upvote disabled">
                                                                                            @endif
                                                                                            @if($vote->up_down == "down" || $vote->up_down == "default")
                                                                                                <div class="form-inline upvote">
                                                                                                    @endif
                                                                                                    @else

                                                                                                        <div class="form-inline upvote">
                                                                                                            @endif
                                                                                                            <button class="up-down" name="up" id="up"
                                                                                                                    value="up">
                                                                                                                <i class="fa fa-caret-up"></i>
                                                                                                            </button>
                                                                                                            {{ csrf_field() }}
                                                                                                        </div>
                                                                                                        @if($vote->voted_by == Auth::user()->name)
                                                                                                            @if($vote->up_down == "down")
                                                                                                                <div class="form-inline downvote disabled">
                                                                                                                    @endif
                                                                                                                    @if($vote->up_down == "up" || $vote->up_down == "default")
                                                                                                                        <div class="form-inline downvote">
                                                                                                                            @endif
                                                                                                                            @else
                                                                                                                                <div class="form-inline downvote">
                                                                                                                                    @endif
                                                                                                                                    <button class="up-down"
                                                                                                                                            name="down"
                                                                                                                                            id="down"
                                                                                                                                            value="down">
                                                                                                                                        <i class="fa fa-caret-down"></i>
                                                                                                                                    </button>
                                                                                                                                    {{ csrf_field() }}
                                                                                                                                </div>
                                                                                    @endif
                                                                                @endif
                                                                                @endforeach
                                                                </form>
                                                            </div>
                                                            <div class="url">&nbsp;
                                                                <a href="{{$article->url}}" class="urlTitle">{{$article->title}}</a>
                                                                @if(isset(Auth::user()->name))
                                                                    @if(Auth::user()->name == $article->posted_by)
                                                                        <a href="article/edit/{{$article->id}}"
                                                                           class="btn btn-primary btn-xs edit-btn">edit</a>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                            <div class="info"> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <?php $sum = 0; ?>
                                                                @foreach($votes as $vote)
                                                                    @if($vote->article_id == $article->id)
                                                                        <?php $sum += $vote->value ?>
                                                                    @endif
                                                                @endforeach
                                                                <?= $sum; ?>
                                                                @if($sum != 1 && $sum != -1)
                                                                    points
                                                                @else
                                                                    point
                                                                @endif
                                                                | posted by
                                                                @if(isset($article->posted_by))
                                                                    {{{$article->posted_by}}}
                                                                    <?php $i = 0; ?>
                                                                    @foreach($comments as $comment)
                                                                        @if($comment->post_id == $article->id)
                                                                            <?php $i++; ?>
                                                                        @endif
                                                                    @endforeach
                                                                    | <a href="comments/{{$article->id}}">{{$i}}
                                                                        @if( $i == 0 || $i > 1 )
                                                                            comments
                                                                        @else
                                                                            comment
                                                                        @endif
                                                                    </a>
                                                                @else not set @endif
                                                            </div>
                                            </th>
                                        </tr>
                                    </li>
                                @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

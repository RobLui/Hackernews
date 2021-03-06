@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <a href="/../home">← back to overview</a>
                <br><br>
                @include("common.errors")
                @include("common.messages")

                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        Article: @foreach($articles as $a) @if($a->id == $comments->post_id) {{$a->title}} @endif @endforeach
                        @foreach($articles as $article)
                            @if($article->id == $comments->post_id)
                                @if(isset(Auth::user()->name))
                                    @if(Auth::user()->name == $article->posted_by)
                                        <a href="/article/edit/{{$articles->id}}" class="btn btn-danger btn-xs pull-right">
                                            <i class="fa fa-btn fa-trash" title="delete"></i> delete article
                                            @endif
                                            @endif
                                            @endif
                                            @endforeach
                                        </a>
                    </div>
                    <div class="panel-content">
                        <div class="panel-body">
                            <ul class="article-overview">
                                <li>
                                    <tr>
                                        <th>
                                            <div class="vote">
                                                <div class="form-inline upvote">
                                                    <button class="up-down">
                                                        &#9650;
                                                    </button>
                                                </div>
                                                <div class="form-inline downvote">
                                                    <button class="up-down">
                                                        &#9660;
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="url">&nbsp;
                                                @foreach($articles as $article) @if($article->id == $comments->post_id)
                                                    <a href="{{$article->url}}" class="urlTitle">{{$article->title}}</a>
                                                @endif @endforeach
                                                @foreach($articles as $article)
                                                    @if($article->id == $comments->post_id)
                                                        @if(isset(Auth::user()->name))
                                                            @if(Auth::user()->name == $article->posted_by)
                                                                <a href="/article/edit/{{$articles->id}}"
                                                                   class="btn btn-primary btn-xs edit-btn">edit</a>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="info">
                                                &nbsp;&nbsp;
                                                {{$articles->votes}} point @if($articles->votes > 1)s @endif
                                                | posted by
                                                @foreach($articles as $article)
                                                    @if($article->id == $comments->post_id)
                                                        {{{$article->posted_by}}}
                                                    @endif
                                                @endforeach
                                                <?php $i = 0; ?>
                                                @foreach($comments as $comment)
                                                    @if($comment->post_id == $articles->id)
                                                        <?php $i++; ?>
                                                    @endif
                                                @endforeach | {{$i}}
                                                @if( $i == 0 || $i > 1 )
                                                    comments
                                                @else
                                                    comment
                                                @endif
                                            </div>
                                        </th>
                                    </tr>
                                </li>
                            </ul>
                            <div class="comments">
                                @if(count($comments) > 0)
                                    <ul>
                                        <div class="comment-body">
                                            @if(count($articles) > 0 && count($comments) > 0)
                                                @foreach($comments as $c)
                                                    @if($c->post_id == $articles->id)
                                                        <li>
                                                            {{$c->comment}}
                                                            <div class="comment-info">
                                                                Posted by
                                                                @if(isset($c->name))
                                                                    {{{$c->name}}}
                                                                @endif
                                                                on
                                                                {{$c->created_at}}
                                                                @if(isset(Auth::user()->name))
                                                                    @if(Auth::user()->name == $c->name)
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <a href="/comments/edit/{{$c->id}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                                                                        <a href="/comments/delete/{{$c->id}}" class="btn btn-danger btn-xs edit-btn">
                                                                            <i class="fa fa-btn fa-trash" title="delete"></i> delete
                                                                        </a>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </ul>
                                @else
                                    <div class="comments">
                                        <div>
                                            <p>No comments yet</p>
                                        </div>
                                    </div>
                                @endif
                                <div class="panel-content">
                                    <form action="/comments/add/{{$articles->id}}" method="POST" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- mismatch token error fix -->
                                        <div class="form-group">
                                            <label for="body" class="col-sm-3 control-label">Comment</label>
                                            <div class="col-sm-6">
                                                <textarea name="comment" id="comment" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-6">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fa fa-plus"></i> Add comment
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

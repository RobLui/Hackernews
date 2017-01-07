@extends('layouts.app')

@section('content')
<!-- Bootstrap Boilerplate... -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <a href="/../home">← back to overview</a>
          <br><br>

  <!--  display errors -->
  @include("common.errors")

    <div class="panel panel-default">
        <div class="panel-heading">
          Article: how do comments work?
<!-- NOG AAN TE PASSEN -->
          <a href="/article/delete" class="btn btn-danger btn-xs pull-right">
            <i class="fa fa-btn fa-trash" title="delete"></i> delete article
          </a>
        </div>
        <div class="panel-body">
           <div class="vote">
              <div class="form-inline upvote">
                <i class="fa fa-btn fa-caret-up disabled upvote" title="can't upvote your own articles"></i>
              </div>
              <div class="form-inline downvote">
                <i class="fa fa-btn fa-caret-down disabled" title="can't downvote your own articles"></i>
              </div>
           </div>

          <!--  URL -->
          <div class="url">
            <!--  ID nog aanpassen naar welke aan te passen -->
<!-- NOG AAN TE PASSEN -->
              <a href="/article/edit/{$article->id}" class="btn btn-primary btn-xs edit-btn">edit</a>
          </div>
          <!--  Info -->
          <div class="info">
            0 points  | posted by NOTRL :D | 0 comments
          </div>
          <!--  Comments -->
          <div class="comments">
            <div>
              <p>No comments yet</p>
            </div>
          </div>

            <!-- ADD comment -->
            <form action="/comments/add/{{$articles->id}}" method="POST" class="form-horizontal">
              {{ csrf_field() }}
              <input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- mismatch token error fix -->
            <!-- Comment data -->
            <div class="form-group">
              <label for="body" class="col-sm-3 control-label">Comment</label>
              <div class="col-sm-6">
                <textarea type="text" name="comment" id="comment" class="form-control"></textarea>
              </div>
            </div>
            <input type="hidden" name="article_id" value="5" pmbx_context="DB3B124C-4CD3-4DB1-833A-171DAB46884E">

            <!-- Add comment -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add comment
                    </button>
                </div>
            </div>
            </form>
</div>
@endsection

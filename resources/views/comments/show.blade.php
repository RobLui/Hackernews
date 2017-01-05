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
              <a href="/article/edit/{$articles->id}" class="btn btn-primary btn-xs edit-btn">edit</a>
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

            <!--  CAN POST TO PASCAL's WEBSITE :P with these placeholders :D -->
            <!-- New Task Form -->

            <form action="http://pascalculator.be/hackernews/public/comments/add" method="POST" class="form-horizontal" pmbx_context="56C6939A-0F81-498C-8484-F80FB3563DF9">
            <input type="hidden" name="_token" value="nr3Wp9VFlPbNRwMWUhMHSLqbeZ3oP98qB61DPSNa" pmbx_context="70857244-9F2B-4BDB-828C-0E802CDECE72">

            <!-- Comment data -->
            <div class="form-group">
              <label for="body" class="col-sm-3 control-label">Comment</label>
              <div class="col-sm-6"><textarea type="text" name="body" id="body" class="form-control"></textarea></div>
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

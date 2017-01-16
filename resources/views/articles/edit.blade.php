@extends('layouts.app')

@section('content')
<!-- Bootstrap Boilerplate... -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <!--  Deze true moet nog een vergelijking worden die ervoor zorgt dat de data enkel te zien is wanneer de andere delete knop is ingedrukt -->
          <div class="bg-danger clearfix">
            <br>
            @if("confirm")
              Are you sure you want to delete this article?
              <!--  Working delete =D -->
              <form action="../delete/{{$articles->id}}" method="POST" class="pull-right">
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button name="delete" class="btn btn-danger" value="7">
                    <i class="fa fa-btn fa-trash" title="delete"></i> confirm delete
                </button>
                <button name="cancel" class="btn" value="7">
                    <i class="fa fa-btn fa-trash" title="cancel"></i> cancel
                </button>
              </form>
              @endif
            </div>
          <br>
          <!--DELETE BUTTON  -->
          <a href="/../home">← back to overview</a>
            <br><br>
              <div class="panel panel-default">
                <div class="panel-heading">Edit article
                  <!--  Delete article button -->
                  <a href="../delete/{{$articles->id}}" class="btn btn-danger btn-xs pull-right" id="first_del" name="first_del">
                    <i class="fa fa-btn fa-trash"></i> delete article</a>
                </div>
                <br>
                <div class="panel-content">

                <!--  display errors -->
                @include("common.errors")

                <!-- Edit -->

                <form action="../edit/{{$articles->id}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- mismatch token error fix -->
                    <!-- article title -->
                    <div class="form-group">
                      <label for="titel" class="col-sm-3 control-label">Title (max 255 chars)</label>
                      <div class="col-sm-6">
                          <input type="text" name="title" id="title" class="form-control" value="{{$articles->title}}">
                      </div>
                    </div>
                    <!-- article url -->
                    <div class="form-group">
                      <label for="url" class="col-sm-3 control-label">URL</label>
                      <div class="col-sm-6">
                          <input type="text" name="url" id="url" class="form-control" value="{{$articles->url}}">
                      </div>
                    </div>
                    <!-- Edit article Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Edit Article
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

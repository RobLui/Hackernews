@extends('layouts.app')

@section('content')
<!-- Bootstrap Boilerplate... -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <!--  Deze true moet nog een vergelijking worden die ervoor zorgt dat de data enkel te zien is wanneer de andere delete knop is ingedrukt -->
          <div class="bg-danger clearfix">
            <br>
              Are you sure you want to delete this article?
              <!--  Deze action moet nog de juiste id meekrijgen dat er verwijdert moet worden, enkel moet de verwijdering nog een soft delete worden -->
              <form action="../delete/<?= basename($_SERVER["PHP_SELF"]); ?>" method="POST" class="pull-right">
                {{ csrf_field() }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button name="delete" class="btn btn-danger" value="7">
                    <i class="fa fa-btn fa-trash" title="delete"></i> confirm delete
                </button>
                <button name="cancel" class="btn" value="7">
                    <i class="fa fa-btn fa-trash" title="cancel"></i> cancel
                </button>
              </form>
            </div>
          <br>
          <a href="/../home">← back to overview</a>
          <!-- <form action="http://localhost:8000/article/edit/delete/8" method="POST" class="pull-right">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" >Delete</button>
          </form> -->
          <!-- <form action="http://localhost:8000/article/edit/8" method="POST" class="pull-right">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" name="delete_confirm" >DELETE CONFIRM</button>
          </form> -->
            <br><br>
              <div class="panel panel-default">
                <div class="panel-heading">Edit article
                  <!-- URL VOOR DELETE ARTICLE ------------------------->
                  <a href="../delete/" class="btn btn-danger   btn-xs pull-right">
                    <i class="fa fa-btn fa-trash"></i> delete article
                  </a>
                </div>
                <br>
                <div class="panel-content">

                <!--  display errors -->
                @include("common.errors")

                <!-- Edit -->
                <form action="../edit/" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- mismatch token error fix -->
                    <!-- article title -->
                    <div class="form-group">
                      <label for="titel" class="col-sm-3 control-label">Title (max 255 chars)</label>
                      <div class="col-sm-6">
                          <input type="text" name="title" id="title" class="form-control" value="">
                      </div>
                    </div>
                    <!-- article url -->
                    <div class="form-group">
                      <label for="url" class="col-sm-3 control-label">URL</label>
                      <div class="col-sm-6">
                          <input type="text" name="url" id="url" class="form-control">
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

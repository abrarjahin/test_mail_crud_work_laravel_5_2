@extends('layouts.app')

@section('content')
<div class="container spark-screen">
    <!-- Add Data Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                Add New Article
                </h4>
            </div>

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/add_articles') }}">
                {!! csrf_field() !!}
                <div class="modal-body">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="title">Title</label>
                      <div class="col-sm-10">
                        <input name="title" required type="text" class="form-control" placeholder="Enter Title">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="content">Content</label>
                      <div class="col-sm-10">          
                        <textarea name="content" required class="form-control" placeholder="Enter your content here.." rows="5"></textarea>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Add Article</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>

      </div>
    </div>

    <!-- Edit Data Modal -->
    <div id="editData" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                Edit Article
                </h4>
            </div>

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/my_articles_list/edit') }}">
                {!! csrf_field() !!}
                <div class="modal-body">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="title">Title</label>
                      <div class="col-sm-10">
                        <input type="hidden" id="edit_id" name="id" value="">
                        <input name="title" id="edit_title" required type="text" class="form-control" placeholder="Enter Title">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="content">Content</label>
                      <div class="col-sm-10">          
                        <textarea name="content" id="edit_content" required class="form-control" placeholder="Enter your content here.." rows="5"></textarea>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Edit Article</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>

      </div>
    </div>


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My Articles</div>

                <div class="panel-body">
                    @if($errors->any())
                        <div class="alert alert-success">
                          <strong>{{$errors->first()}}</strong>
                        </div>
                    @endif

                    <table id="my_articles"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                            <thead>
                                <tr>
                                    <th>Article Writer</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Writing Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                    </table>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <meta name="terget_ajax_url" content="{{ route('my_articles_list') }}">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

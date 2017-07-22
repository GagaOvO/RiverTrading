@include('layouts.header')
 <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">

                        <h4 class="page-title">Admin</h4>
                        <ol class="breadcrumb">
                            <li>Admin</a></li>
                            <li style="color:#639ace;">Small Stock</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                <button type="button" class="btn btn-primary" style="margin-bottom: 10px;margin-left: 10px;" data-toggle="modal" data-target="#myModal">Upload Bulk Stock</button>
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Items In Small Stock</b></h4>

                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>ID</th>
                                    <th>Item Code</th>
                                    <th>Item Name</th>
                                    <th>Item Description</th>
                                    <th>Size</th>
                                    <th>Cartons</th>
                                    <th>Piece Per Cartons</th>
                                    <th>Total</th>
                                    <th>Origin</th>
                                    <th>Approved By</th>
                                    <th>Comment</th>
                                    <th>Options</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($smallstock AS $value)
                                    <tr>
                                        <td>{{$value->created_at}}</td>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->item_code}}</td>
                                        <td>{{$value->item_name}}</td>
                                        <td>{{$value->item_desc}}</td>
                                        <td>{{$value->size}}</td>
                                        <td>{{$value->cartons}}</td>
                                        <td>{{$value->piece_per_cartons}}</td>
                                        <td>{{$value->total}}</td>
                                        <td>{{$value->origin}}</td>
                                        <td>{{$value->approved_by}}</td>
                                        <td>{{$value->comment}}</td>
                                        <td>
                                        <a class="edit-modal"
                                        data-info="{{$value->id}},{{$value->item_code}},{{$value->item_name}},{{$value->item_desc}},{{$value->item_size}},{{$value->cartons}},{{$value->piece_per_carton}},{{$value->total}},{{$value->origin}}
                                        ,{{$value->approved_by}},{{$value->comment}}" class="table-action-btn"><i class="md md-edit"></i></a>
                                        </td>
                                    </tr>
                               @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>

                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fid" disabled>
                            </div>
                        </div>
                        <div class="form-group m-b-20{{ $errors->has('item_code') ? ' has-error' : '' }}">
                            <label>Item Code<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="item_code" value="{{ old('item_code') }}" placeholder="#BIWCRC7889" name="item_code" required>
                        </div>

                        <div class="form-group m-b-20 {{ $errors->has('item_name') ? ' has-error' : '' }}"">
                            <label>Item Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="item_name" placeholder="Planche" name="item_name" required>
                        </div>

                        <div class="form-group m-b-20 {{ $errors->has('item_desc') ? ' has-error' : '' }}"">
                            <label>Item Description</label>
                            <textarea class="form-control" id="item_desc" rows="3" name="item_desc" placeholder="Please enter summary" required></textarea>
                        </div>
                        
                        <div class="form-group m-b-20 {{ $errors->has('item_size') ? ' has-error' : '' }}"">
                            <label>Item Size<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="item_size" name="item_size" placeholder="1.0 cm" required>
                        </div>

                        <div class="form-group m-b-20 {{ $errors->has('cartons') ? ' has-error' : '' }}"">
                            <label>Cartons<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="cartons" name="cartons" placeholder="50" required>
                        </div>

                        <div class="form-group m-b-20 {{ $errors->has('piece_per_carton') ? ' has-error' : '' }}"">
                            <label>Piece Per Carton<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="piece_per_carton" name="piece_per_carton" placeholder="20" required>
                        </div>

                        <div class="form-group m-b-20 {{ $errors->has('total') ? ' has-error' : '' }}"">
                            <label>Total<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="total" name="total" placeholder="100" required>
                        </div>

                        <div class="form-group m-b-20 {{ $errors->has('origin') ? ' has-error' : '' }}"">
                            <label>Origin<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="origin" name="origin" placeholder="Magerwa" required>
                        </div>

                        <div class="form-group m-b-20 {{ $errors->has('approved_by') ? ' has-error' : '' }}"">
                            <label>Approved By<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="approved_by" name="approved_by" placeholder="Manager" required>
                        </div>

                        <div class="form-group m-b-10 {{ $errors->has('comment') ? ' has-error' : '' }}"">
                            <label>Comment</label>
                            <textarea class="form-control" id="comment" rows="3" name="comment" placeholder="Please enter comment" required></textarea>
                        </div>
                        <p
                            class="salary_error error text-center alert alert-danger hidden"></p>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn actionBtn" data-dismiss="modal">
                            <span id="footer_action_button" class='glyphicon'> </span>
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for Bulk Stock -->
        <div class="container">
          <div class="modal fade" id="myModal" role="dialog" tabindex="-1" aria-labelledby="myModal" aria-hidden="true">
            <div class="modal-dialog">
                <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Import Stock Excel File</h4>
                </div>
                <div class="modal-body">
                  <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="/import_stock" class="form-horizontal" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <input type="file" name="import_file" />
                    <button class="btn btn-success">Import File</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!-- End Modal for Bulk Stock -->



@include('layouts.footer')
@include('layouts.header')
 <!-- jQuery  -->
 <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">

                        <h4 class="page-title">Stocker</h4>
                        <ol class="breadcrumb">
                            <li>Stocker</a></li>
                            <li style="color:#639ace;">Small Stock</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                <button type="button" class="btn btn-primary" style="margin-bottom: 10px;margin-left: 10px;" data-toggle="modal" data-target="#myModal">Upload Bulk Stock</button>
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>ID</th>
                                    <th>Item Code</th>
                                    <th>Item Name</th>
                                    <th>Item Description</th>
                                    <th>Quantity</th>
                                    <th>Size</th>
                                    <th>Cartons</th>
                                    <th>Piece Per Cartons</th>
                                    <th>Total</th>
                                    <th>Origin</th>
                                    <th>Approved By</th>
                                    <th>Comment</th>
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
                                        <td>{{$value->quantity}}</td>
                                        <td>{{$value->size}}</td>
                                        <td>{{$value->cartons}}</td>
                                        <td>{{$value->piece_per_cartons}}</td>
                                        <td>{{$value->total}}</td>
                                        <td>{{$value->origin}}</td>
                                        <td>{{$value->approved_by}}</td>
                                        <td>{{$value->comment}}</td>
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



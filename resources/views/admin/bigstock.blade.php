@include('layouts.header')

<body class="fixed-left">
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">ADMIN</h4>
                        <ol class="breadcrumb">
                            <li>Admin</li>
                            <li style="color:#639ace;">Big Stock</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Goods In Stock</b></h4>

                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Date & Time</th>
                                    <th>Item Code</th>
                                    <th>Item Name</th>
                                    <th>Item Description</th>
                                    <th>Item Size</th>
                                    <th>Cartons</th>
                                    <th>Pieces/Cartons</th>
                                    <th>Total</th>
                                    <th>Origin</th>
                                    <th>Approved By</th>
                                    <th>Options</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($items AS $value)
                                <tr>
                                    <td>{{$value->created_at}}</td>
                                    <td>{{$value->item_code}}</td>
                                    <td>{{$value->item_name}}</td>
                                    <td>{{$value->item_desc}}</td>
                                    <td>{{$value->item_size}}</td>
                                    <td>{{$value->cartons}}</td>
                                    <td>{{$value->piece_per_carton}}</td>
                                    <td>{{$value->total}}</td>
                                    <td>{{$value->origin}}</td>
                                    <td>{{$value->approved_by}}</td>
                                    <td>
                                        <a class="edit-modal"
                                        data-info="{{$value->id}},{{$value->item_code}},{{$value->item_name}},{{$value->item_desc}},{{$value->item_size}},{{$value->cartons}},{{$value->piece_per_carton}},{{$value->total}},{{$value->origin}}
                                        ,{{$value->approved_by}},{{$value->comment}}" class="table-action-btn"><i class="md md-edit"></i></a>
                                    </td>


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
                                                    {{ csrf_field () }}
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2" for="id">ID</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="fid" name="fid" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Item Code<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="item_code" value="{{ old('item_code') }}" placeholder="#BIWCRC7889" name="item_code" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Item Name<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="item_name" placeholder="Planche" name="item_name" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Item Description</label>
                                                            <textarea class="form-control" id="item_desc" rows="3" name="item_desc" placeholder="Please enter summary" required></textarea>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Item Size<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="item_size" name="item_size" placeholder="1.0 cm" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Cartons<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="cartons" name="cartons" placeholder="50" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Piece Per Carton<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="piece_per_carton" name="piece_per_carton" placeholder="20" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Total<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="total" name="total" placeholder="100" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Origin<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="origin" name="origin" placeholder="Magerwa" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Approved By<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="approved_by" name="approved_by" placeholder="Manager" required>
                                                        </div>

                                                        <div class="form-group m-b-10">
                                                            <label>Comment</label>
                                                            <textarea class="form-control" id="comment" rows="3" name="comment" placeholder="Please enter comment" required></textarea>
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn actionBtn" data-dismiss="modal">
                                                                <span id="footer_action_button" class='glyphicon'> </span>
                                                            </button>
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                                <span class='glyphicon glyphicon-remove'></span> Close
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer">
            © 2017. All rights reserved.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->



</div>
@include('layouts.footer')
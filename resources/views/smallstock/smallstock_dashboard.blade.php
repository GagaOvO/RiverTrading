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
                <a href="/small_stock" style="margin-left: 10px;margin-top: 10px;margin-bottom: 10px;" class="btn btn-default btn-sm waves-effect waves-light">View All</a>
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table class="table table-striped table-bordered">
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
                                @foreach ($smallstocks AS $value)
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

@include('layouts.footer')



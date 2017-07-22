@include('layouts.header')
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
                            <li>Small Stock</a></li>
                            <li style="color:#639ace;">Goods Taken Out</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Goods Taken Out from Small stock</b></h4>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>ID</th>
                                    <th>Item Code</th>
                                    <th>Item Name</th>
                                    <th>Item Desription</th>
                                    <th>Quantity Taken Out</th>
                                    <th>Destination</th>
                                    <th>Approved By</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach ($taken_out AS $value)
                                    <tr>
                                        <td>{{$value->created_at}}</td>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->item_code}}</td>
                                        <td>{{$value->item_name}}</td>
                                        <td>{{$value->item_desc}}</td>
                                        <td>{{$value->quantity_out}}</td>
                                        <td>{{$value->item_destination}}</td>
                                        <td>{{$value->approved_by}}</td>
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


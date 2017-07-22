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
                    <a href="/bigstock"  style="margin-left: 10px;margin-top: 10px;margin-bottom: 10px;" class="btn btn-default btn-sm waves-effect waves-light">View All</a>
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Goods In Stock</b></h4>

                            <table class="table table-striped table-bordered">
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
</body>
@include('layouts.footer')


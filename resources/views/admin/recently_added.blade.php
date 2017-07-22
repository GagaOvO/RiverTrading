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
                            <li>
                                <a href="tables-datatable.html#">Admin</a>
                            </li>
                            <li>
                                <a href="tables-datatable.html#">Big Stock</a>
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Recently Added</b></h4>

                             <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Item Code</th>
                                    <th>Item Name</th>
                                    <th>Quantity Added</th>
                                    <th>Origin</th>
                                    <th>Approved By</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach ($items AS $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->item_code}}</td>
                                        <td>{{$value->item_name}}</td>
                                        <td>{{$value->quantity_added}}</td>
                                        <td>{{$value->origin}}</td>
                                        <td>{{$value->approved_by}}</td>
                                        <td>{{$value->created_at}}</td>
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
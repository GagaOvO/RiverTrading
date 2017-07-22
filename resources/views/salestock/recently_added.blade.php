@include('layouts.header')
 <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">

                        <h4 class="page-title">Sale Stock</h4>
                        <ol class="breadcrumb">
                            <li>River Trading Ltd</a></li>
                            <li style="color:#639ace;">Added New Stock</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Added New Stock</b></h4>

                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Item Code</th>
                                    <th>Item Name</th>
                                    <th>Quantity Added</th>
                                    <th>Approved By</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                     @foreach ($added_stock AS $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->item_code}}</td>
                                        <td>{{$value->item_name}}</td>
                                        <td>{{$value->quantity_added}}</td>
                                        <td>{{$value->approved_by}}</td>
                                        <td>{{$value->created_at}}</td>
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

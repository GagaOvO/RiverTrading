@include('layouts.header')

  <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">

                                <h4 class="page-title">Update Existing Stock</h4>
                                <ol class="breadcrumb">
                                    <li>Admin</a></li>
                                    <li style="color:#639ace;">Existing Stock Edit</li>
                                </ol>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-12">


                                    <form action="/update_existing_stock" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card-box">
                                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>General</b></h5>

                                                    <div class="form-group m-b-20{{ $errors->has('bigstock_id') ? ' has-error' : '' }}">
                                                    <label>Item Code<span class="text-danger">*</span></label>
                                                    <select class="form-control" name="bigstock_id" value="{ old('bigstock_id') }}" name="bigstock_id">
                                                        <option value="0">Item Code</option>
                                                        @foreach($new_stock AS $value)
                                                        <option value="{{$value->id}}">{{$value->item_code}}</option>
                                                        @endforeach
                                                    </select>
                                                            @if ($errors->has('item_code'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('item_code') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>

                                                    <div class="form-group m-b-20 {{ $errors->has('quantity_added') ? ' has-error' : '' }}"">
                                                        <label>New Quantity<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="quantity_added" placeholder="New Quantity In" required>

                                                            @if ($errors->has('quantity_added'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('quantity_added') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>

                                                    <div class="form-group m-b-20 {{ $errors->has('approved_by') ? ' has-error' : '' }}"">
                                                        <label>Approved By<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="approved_by" placeholder="e.g :Manager" required>

                                                            @if ($errors->has('approved_by'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('approved_by') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>

                                                </div>
                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="col-sm-12">
                                                <hr />
                                                <div class="text-center p-20">
                                                     <button type="submit" class="btn w-sm btn-success btn-block waves-effect waves-light">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                   River Trading Ltd © 2017. All rights reserved.
                </footer>

            </div>
            
            
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

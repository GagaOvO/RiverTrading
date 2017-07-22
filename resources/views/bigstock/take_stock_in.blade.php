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

								<h4 class="page-title">Take Stock In</h4>
								<ol class="breadcrumb">
									<li>Stocker</a></li>
                                    <li style="color:#639ace;">Take Stock In</li>
								</ol>
							</div>
						</div>



                        <div class="row">
                            <div class="col-sm-12">


                                    <form action="/stocker_save" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card-box">
                                                    <h5 class="text-muted text-uppercase m-t-0 m-b-20"><b>General</b></h5>

                                                    <div class="form-group m-b-20{{ $errors->has('item_code') ? ' has-error' : '' }}">
                                                        <label>Item Code<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" value="{{ old('item_code') }}" placeholder="#BIWCRC7889" name="item_code" required>

                                                        	@if ($errors->has('item_code'))
                                    							<span class="help-block">
                                        							<strong>{{ $errors->first('item_code') }}</strong>
                                    							</span>
                                							@endif
                                                    </div>

                                                    <div class="form-group m-b-20 {{ $errors->has('item_name') ? ' has-error' : '' }}"">
                                                        <label>Item Name<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Planche" name="item_name" required>

	                                                        @if ($errors->has('item_name'))
	                                							<span class="help-block">
	                                    							<strong>{{ $errors->first('item_name') }}</strong>
	                                							</span>
	                                						@endif
                                                    </div>

                                                    <div class="form-group m-b-20 {{ $errors->has('item_desc') ? ' has-error' : '' }}"">
                                                        <label>Item Description</label>
                                                        <textarea class="form-control" rows="3" name="item_desc" placeholder="Please enter summary" required></textarea>

	                                                        @if ($errors->has('item_desc'))
	                                							<span class="help-block">
	                                    							<strong>{{ $errors->first('item_desc') }}</strong>
	                                							</span>
	                                						@endif
                                                    </div>
                                                    
                                                    <div class="form-group m-b-20 {{ $errors->has('item_size') ? ' has-error' : '' }}"">
                                                        <label>Item Size<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="item_size" placeholder="1.0 cm" required>

                                                            @if ($errors->has('item_size'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('item_size') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>

                                                    <div class="form-group m-b-20 {{ $errors->has('cartons') ? ' has-error' : '' }}"">
                                                        <label>Cartons<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="cartons" placeholder="50" required>

                                                            @if ($errors->has('cartons'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('cartons') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>

                                                    <div class="form-group m-b-20 {{ $errors->has('piece_per_carton') ? ' has-error' : '' }}"">
                                                        <label>Piece Per Carton<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="piece_per_carton" placeholder="20" required>

                                                            @if ($errors->has('piece_per_carton'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('piece_per_carton') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>

                                                    <div class="form-group m-b-20 {{ $errors->has('total') ? ' has-error' : '' }}"">
                                                        <label>Total<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="total" placeholder="100" required>

                                                            @if ($errors->has('total'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('total') }}</strong>
                                                                </span>
                                                            @endif
                                                    </div>

                                                    <div class="form-group m-b-20 {{ $errors->has('origin') ? ' has-error' : '' }}"">
                                                        <label>Origin<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="origin" placeholder="Magerwa" required>

                                                        	@if ($errors->has('origin'))
	                                							<span class="help-block">
	                                    							<strong>{{ $errors->first('origin') }}</strong>
	                                							</span>
	                                						@endif
                                                    </div>

                                                    <div class="form-group m-b-20 {{ $errors->has('approved_by') ? ' has-error' : '' }}"">
                                                        <label>Approved By<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="approved_by" placeholder="Manager" required>

                                                        	@if ($errors->has('approved_by'))
	                                							<span class="help-block">
	                                    							<strong>{{ $errors->first('approved_by') }}</strong>
	                                							</span>
	                                						@endif
                                                    </div>

                                                    <div class="form-group m-b-10 {{ $errors->has('comment') ? ' has-error' : '' }}"">
                                                        <label>Comment</label>
                                                        <textarea class="form-control" rows="3" name="comment" placeholder="Please enter comment" required></textarea>

                                                        	@if ($errors->has('comment'))
	                                							<span class="help-block">
	                                    							<strong>{{ $errors->first('comment') }}</strong>
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
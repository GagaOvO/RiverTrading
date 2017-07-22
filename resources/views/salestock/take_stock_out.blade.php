@include('layouts.header')
 <!-- The login Container Codes -->
    <section class="m-b-lg">
      <div class="panel panel-default">
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

                                <h4 class="page-title">Sale Stock</h4>
                                <ol class="breadcrumb">
                                    <li>River Trading Ltd</a></li>
                                    <li>Sale Stock</a></li>
                                    <li style="color:#639ace;">Take Goods Out</li>
                                </ol>
                            </div>
                        </div>
                        <ul class="nav nav-tabs nav-justified" style="padding-bottom: 20px;">
                          <li class="active tab-title"><a href="#cartons" data-toggle="tab">Cartons</a></li>
                          <li class="tab-title"><a href="#pieces" data-toggle="tab" style="color:white;">Pieces</a></li>
                          
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="cartons">
                            <form action="/salestockcartons" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card-box">
                                                <ol class="breadcrumb">
                                                <li class="text-muted text-uppercase m-t-0 m-b-20"><b>General</b>
                                                    <li style="color:#639ace;">Take Cartons Out</li>
                                                </li>
                                                </ol>

                                                <div class="form-group m-b-20{{ $errors->has('smallstock_id') ? ' has-error' : '' }}">
                                                <label>Item Code<span class="text-danger">*</span></label>
                                                <select class="form-control" value="{ old('smallstock_id') }}" name="salestock_id">
                                                    <option value="0">Item Code</option>
                                                    @foreach($sell AS $value)
                                                    <option value="{{$value->id}}">{{$value->item_code}}</option>
                                                    @endforeach
                                                </select>
                                                        @if ($errors->has('item_code'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('item_code') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>

                                                <div class="form-group m-b-20 {{ $errors->has('quantity_out') ? ' has-error' : '' }}"">
                                                    <label>Quantity Out<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="quantity_out" placeholder="Quantity to be sold" required>

                                                        @if ($errors->has('quantity_out'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('quantity_out') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>

                                                <div class="form-group m-b-20 {{ $errors->has('total') ? ' has-error' : '' }}"">
                                                    <label>Total Remaining In Stock<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="total" placeholder="Quantity In" required>

                                                        @if ($errors->has('total'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('total') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>


                                                <div class="form-group m-b-20 {{ $errors->has('item_destination') ? ' has-error' : '' }}"">
                                                    <label>Destination<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="item_destination" placeholder="Quantity In" required>

                                                        @if ($errors->has('item_destination'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('item_destination') }}</strong>
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


                          <div class="tab-pane" id="pieces">
                            <form action="/salestockpieces" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-box">
                                        <ol class="breadcrumb">
                                                <li class="text-muted text-uppercase m-t-0 m-b-20"><b>General</b>
                                                    <li style="color:#639ace;">Take Pieces Out</li>
                                                </li>
                                                </ol>

                                            <div class="form-group m-b-20{{ $errors->has('smallstock_id') ? ' has-error' : '' }}">
                                            <label>Item Code<span class="text-danger">*</span></label>
                                            <select class="form-control" value="{ old('smallstock_id') }}" name="salestock_id">
                                                <option value="0">Item Code</option>
                                                @foreach($sell AS $value)
                                                <option value="{{$value->id}}">{{$value->item_code}}</option>
                                                @endforeach
                                            </select>
                                                    @if ($errors->has('item_code'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('item_code') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>

                                            <div class="form-group m-b-20 {{ $errors->has('quantity_out') ? ' has-error' : '' }}"">
                                                <label>Quantity Out<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="quantity_out" placeholder="Quantity to be sold" required>

                                                    @if ($errors->has('quantity_out'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('quantity_out') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>
                                            
                                            <div class="form-group m-b-20 {{ $errors->has('total') ? ' has-error' : '' }}"">
                                                <label>Total Remaining In Stock<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="total" placeholder="Quantity In" required>

                                                    @if ($errors->has('total'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('total') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>

                                            <div class="form-group m-b-20 {{ $errors->has('item_destination') ? ' has-error' : '' }}"">
                                                <label>Destination<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="item_destination" placeholder="Quantity In" required>

                                                    @if ($errors->has('item_destination'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('item_destination') }}</strong>
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
                    </div> 
                  </div>
                </section>
              </div>
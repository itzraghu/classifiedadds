@extends('layouts.webfront.webfront')
@section('page-content')

<div class="main-container">
  <div class="container">
    <div class="row">
      <div class="col-md-9 page-content">
        <div class="inner-box category-content">
          <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post a Free Classified
            Ad</strong></h2>
            <div class="row">
              <div class="col-sm-12">
                @if(Session::has('success'))
                <div class="alert alert-success">
                  {{Session::get('success') }}
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </div>
                @endif
                <form class="form-horizontal" action="/post_free_add" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <fieldset>

                    <div class="form-group">
                      <label class="col-md-3 control-label" for="category_id">Category</label>
                      <div class="col-md-8">
                        <select name="category_id" id="category_id" class="form-control">
                          <option value="" selected="selected"> Select a category...</option>
                          @foreach ($categories as $category)
                          <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                          @endforeach
                          
                        </select>
                        @if($errors->first('category_id')) 
                        <p class="label label-danger" >
                          {{ $errors->first('category_id') }} 

                        </p>
                        @endif
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 control-label">Add Type</label>
                      <div class="col-md-8">
                        <label class="radio-inline" for="radios-0">
                          <input name="adds_type" id="radios-0" value="Private" checked="checked" type="radio">
                          Private </label>
                          <label class="radio-inline" for="radios-1">
                            <input name="adds_type" id="radios-1" value="Business" type="radio">
                            Business </label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label" for="adds_title">Ad title</label>
                          <div class="col-md-8">
                            <input id="adds_title" name="adds_title" value="{{Request::old('adds_title')}}" placeholder="Ad title" class="form-control input-md"  type="text">
                            @if($errors->first('adds_title')) 
                            <p class="label label-danger" >
                              {{ $errors->first('adds_title') }} 
                            </p>
                            @endif
                            <span class="help-block">A great title needs at least 60 characters. </span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label" for="adds_description">Describe ad </label>
                          <div class="col-md-8">
                            <textarea class="form-control" id="adds_description" value="{{Request::old('adds_description')}}" name="adds_description"></textarea>
                            @if($errors->first('adds_description')) 
                            <p class="label label-danger" >
                              {{ $errors->first('adds_description') }} 

                            </p>
                            @endif
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label" for="price">Price</label>
                          <div class="col-md-4">
                            <div class="input-group"><span class="input-group-addon">Rs</span>
                              <input id="price" name="price" value="{{Request::old('price')}}" class="form-control" placeholder="placeholder"  type="text">
                              @if($errors->first('price')) 
                              <p class="label label-danger" >
                                {{ $errors->first('price') }} 

                              </p>
                              @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox">
                                Negotiable </label>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label" for="textarea"> Picture </label>
                            <div class="col-md-8">
                              <div class="mb10">
                                <input id="input-upload-img1" name="file1" type="file" class="file" data-preview-file-type="text"> 
                              </div>
                              <div class="mb10">
                                <input id="input-upload-img1" name="file2" type="file" class="file" data-preview-file-type="text"> 
                              </div>
                              <div class="mb10">
                                <input id="input-upload-img1" name="file3" type="file" class="file" data-preview-file-type="text"> 
                              </div>
                              <div class="mb10">
                               <input id="input-upload-img1" name="file4" type="file" class="file" data-preview-file-type="text"> 
                             </div>
                             <div class="mb10">
                               <input id="input-upload-img1" name="file5" type="file" class="file" data-preview-file-type="text"> 
                             </div>

                             <!--   <div class="mb10">
                                <span class="file-input file-input-new"><div class="file-preview ">
                                 <div class="close fileinput-remove text-right">×</div>
                                 <div class="file-preview-thumbnails"></div>
                                 <div class="clearfix"></div>   <div class="file-preview-status text-center text-success"></div>
                                 <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                               </div>
                               <div class="input-group ">
                                 <div tabindex="-1" class="form-control file-caption  kv-fileinput-caption">
                                   <div class="file-caption-name" style="width: 248.92px;"></div>
                                 </div>
                                 <div class="input-group-btn">
                                   <button type="button" class="btn btn-default fileinput-remove fileinput-remove-button"><i class="glyphicon glyphicon-ban-circle"></i> Remove</button>
                                   <div class="btn btn-primary btn-file"> <i class="glyphicon glyphicon-folder-open"></i> &nbsp;Browse … <input id="input-upload-img2" type="file" class="file" data-preview-file-type="text"></div>
                                 </div>
                               </div></span>
                             </div>
                             <div class="mb10">
                              <span class="file-input file-input-new"><div class="file-preview ">
                               <div class="close fileinput-remove text-right">×</div>
                               <div class="file-preview-thumbnails"></div>
                               <div class="clearfix"></div>   <div class="file-preview-status text-center text-success"></div>
                               <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                             </div>
                             <div class="input-group ">
                               <div tabindex="-1" class="form-control file-caption  kv-fileinput-caption">
                                 <div class="file-caption-name" style="width: 248.92px;"></div>
                               </div>
                               <div class="input-group-btn">
                                 <button type="button" class="btn btn-default fileinput-remove fileinput-remove-button"><i class="glyphicon glyphicon-ban-circle"></i> Remove</button>
                                 <div class="btn btn-primary btn-file"> <i class="glyphicon glyphicon-folder-open"></i> &nbsp;Browse … <input id="input-upload-img3" type="file" class="file" data-preview-file-type="text"></div>
                               </div>
                             </div></span>
                           </div>
                           <div class="mb10">
                            <span class="file-input file-input-new"><div class="file-preview ">
                             <div class="close fileinput-remove text-right">×</div>
                             <div class="file-preview-thumbnails"></div>
                             <div class="clearfix"></div>   <div class="file-preview-status text-center text-success"></div>
                             <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                           </div>
                           <div class="input-group ">
                             <div tabindex="-1" class="form-control file-caption  kv-fileinput-caption">
                               <div class="file-caption-name" style="width: 248.92px;"></div>
                             </div>
                             <div class="input-group-btn">
                               <button type="button" class="btn btn-default fileinput-remove fileinput-remove-button"><i class="glyphicon glyphicon-ban-circle"></i> Remove</button>
                               <div class="btn btn-primary btn-file"> <i class="glyphicon glyphicon-folder-open"></i> &nbsp;Browse … <input id="input-upload-img4" type="file" class="file" data-preview-file-type="text"></div>
                             </div>
                           </div></span>
                         </div>
                         <div class="mb10">
                          <span class="file-input file-input-new"><div class="file-preview ">
                           <div class="close fileinput-remove text-right">×</div>
                           <div class="file-preview-thumbnails"></div>
                           <div class="clearfix"></div>   <div class="file-preview-status text-center text-success"></div>
                           <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                         </div>
                         <div class="input-group ">
                           <div tabindex="-1" class="form-control file-caption  kv-fileinput-caption">
                             <div class="file-caption-name" style="width: 248.92px;"></div>
                           </div>
                           <div class="input-group-btn">
                             <button type="button" class="btn btn-default fileinput-remove fileinput-remove-button"><i class="glyphicon glyphicon-ban-circle"></i> Remove</button>
                             <div class="btn btn-primary btn-file"> <i class="glyphicon glyphicon-folder-open"></i> &nbsp;Browse … <input id="input-upload-img5" type="file" class="file" data-preview-file-type="text"></div>
                           </div>
                         </div></span>
                       </div> -->
                       <p class="help-block">Add up to 5 photos. Use a real image of your
                        product, not catalogs.</p>
                      </div>
                    </div>
                    <div class="content-subheading"><i class="icon-user fa"></i> <strong>Seller
                      information</strong></div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="seller_name">Name</label>
                        <div class="col-md-8">
                          <input id="seller_name" name="seller_name" value="{{Request::old('seller_name')}}" placeholder="Seller Name" class="form-control input-md"  type="text">
                          @if($errors->first('seller_name')) 
                          <p class="label label-danger" >
                            {{ $errors->first('seller_name') }} 
                          </p>
                          @endif
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label" for="seller_email"> Seller
                          Email</label>
                          <div class="col-md-8">
                            <input id="seller_email" name="seller_email" value="{{Request::old('seller_email')}}" class="form-control" placeholder="Email"  type="text">
                            @if($errors->first('seller_email')) 
                            <p class="label label-danger" >
                              {{ $errors->first('seller_email') }} 
                            </p>
                            @endif
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="">
                                <small> Hide the phone number on this ads.</small>
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label" for="seller_number">Phone
                            Number</label>
                            <div class="col-md-8">
                              <input id="seller_phone" name="seller_phone" value="{{Request::old('seller_phone')}}" placeholder="Phone Number" class="form-control input-md"  type="text">
                              @if($errors->first('seller_number')) 
                              <p class="label label-danger" >
                                {{ $errors->first('seller_number') }} 
                              </p>
                              @endif
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label" for="location">Location</label>
                            <div class="col-md-8">
                              <select name="location" id="location" class="form-control">
                                <option value="" selected="selected"> Select a Location...</option>
                                @foreach ($locations as $location)
                                <option value="{{$location->id}}">{{$location->location_name}}</option>
                                @endforeach

                              </select>
                              @if($errors->first('location')) 
                              <p class="label label-danger" >
                                {{ $errors->first('location') }} 

                              </p>
                              @endif
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label" for="city">City</label>
                            <div class="col-md-8">
                              <select id="city" name="city" class="form-control">
                                <option value="">Select City</option>
                                <option value="1">Option one</option>
                                <option value="2">Option two</option>
                              </select>
                              @if($errors->first('city')) 
                              <p class="label label-danger" >
                                {{ $errors->first('city') }} 

                              </p>
                              @endif
                            </div>
                          </div>
                  {{-- 
        <div class="well">
                            <h3><i class=" icon-certificate icon-color-1"></i> Make your Ad Premium
                            </h3>
                            <p>Premium ads help sellers promote their product or service by getting
                              their ads more visibility with more
                              buyers and sell what they want faster. <a href="http://templatecycle.com/demo/bootclassified-v1.4/dist/help.html">Learn
                              more</a></p>
                              <div class="form-group">
                                <table class="table table-hover checkboxtable">
                                  <tbody><tr>
                                    <td>
                                      <div class="radio">
                                        <label>
                                          <input type="radio" name="optionsRadios" id="optionsRadios0" value="option0" checked="">
                                          <strong>Regular List </strong> </label>
                                        </div>
                                      </td>
                                      <td><p>$00.00</p></td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                                            <strong>Urgent Ad </strong> </label>
                                          </div>
                                        </td>
                                        <td><p>$10.00</p></td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <div class="radio">
                                            <label>
                                              <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                              <strong>Top of the Page Ad </strong> </label>
                                            </div>
                                          </td>
                                          <td><p>$20.00</p></td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                <strong>Top of the Page Ad + Urgent Ad </strong>
                                              </label>
                                            </div>
                                          </td>
                                          <td><p>$40.00</p></td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <div class="form-group">
                                              <div class="col-md-8">
                                                <select class="form-control" name="Method" id="PaymentMethod">
                                                  <option value="2">Select Payment Method</option>
                                                  <option value="3">Credit / Debit Card</option>
                                                  <option value="5">Paypal</option>
                                                </select>
                                              </div>
                                            </div>
                                          </td>
                                          <td><p><strong>Payable Amount : $40.00</strong></p></td>
                                        </tr>
                                      </tbody></table>
                                    </div>
                                  </div>
                                  --}}

                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Terms</label>
                                    <div class="col-md-8">
                                      <label class="checkbox-inline" for="checkboxes-0">
                                        <input name="Terms" id="checkboxes-0" value="1" type="checkbox">
                                        Remember above contact information. </label><br>
                                        @if($errors->first('Terms')) 
                                        <p class="label label-danger" >
                                          {{ $errors->first('Terms') }} 

                                        </p>
                                        @endif

                                      </div>
                                      <br>
                                      <br>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-8"><input type="submit" class="btn btn-success btn-lg" value="Submit"></div>
                                      </div>
                                    </fieldset>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-3 reg-sidebar">
                            <div class="reg-sidebar-inner text-center">
                              <div class="promo-text-box"><i class=" icon-picture fa fa-4x icon-color-1"></i>
                                <h3><strong>Post a Free Classified</strong></h3>
                                <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur
                                  adipiscing elit. </p>
                                </div>
                                <div class="panel sidebar-panel">
                                  <div class="panel-heading uppercase">
                                    <small><strong>How to sell quickly?</strong></small>
                                  </div>
                                  <div class="panel-content">
                                    <div class="panel-body text-left">
                                      <ul class="list-check">
                                        <li> Use a brief title and description of the item</li>
                                        <li> Make sure you post in the correct category</li>
                                        <li> Add nice photos to your ad</li>
                                        <li> Put a reasonable price</li>
                                        <li> Check the item before publish</li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>

                        </div>

                      </div>

                      @endsection                }
                    }

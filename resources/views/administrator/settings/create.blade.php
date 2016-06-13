@extends('administrator.layouts.master')

@section('content')
	<div class="page page-gallery">
		<div class="pageheader">
		    <h2>Setting</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">setting</a>
		            </li>
		        </ul>

		        <div class="page-toolbar">
		            <a role="button" tabindex="0" class="btn btn-lightred no-border pickDate">
		                <i class="fa fa-calendar"></i>&nbsp;&nbsp;<span></span>&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
		            </a>
		        </div>

		    </div>
		</div>
		<div class="row">
			<form class="form" id="form" action="{{ (count($setting) != 0 && ($setting != null)) ? route('admin.settings.update', $setting->id) : route('admin.settings.create') }}" method="post" enctype="multipart/form-data">
				{{ (count($setting) != 0 && ($setting != null)) ? method_field('PUT') : method_field('POST') }}
				{{ csrf_field() }}
				<section class="tile">
					<div class="tile-header dvd dvd-btm">
		                <h1 class="custom-font"><strong>Main </strong>Form</h1>
		                <ul class="controls">
		                    <li class="dropdown">
		                        <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
		                            <i class="fa fa-cog"></i>
		                            <i class="fa fa-spinner fa-spin"></i>
		                        </a>
		                        <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
		                            <li>
		                                <a role="button" tabindex="0" class="tile-toggle">
		                                    <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
		                                    <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
		                                </a>
		                            </li>
		                            <li>
		                                <a role="button" tabindex="0" class="tile-refresh">
		                                    <i class="fa fa-refresh"></i> Refresh
		                                </a>
		                            </li>
		                            <li>
		                                <a role="button" tabindex="0" class="tile-fullscreen">
		                                    <i class="fa fa-expand"></i> Fullscreen
		                                </a>
		                            </li>
		                        </ul>

		                    </li>
		                </ul>
		            </div>
					<fieldset>
						<div class="tile-body">
					        <div class="form-group">
								<label class="formLeft" for="param_name">Tên hệ thống:<span class="req">*</span></label>
								<div class="formRight">
									<span class="oneTwo">
										<input class="form-control" name="name" id="param_name" type="text" value="{{ old('name', $setting ? $setting->name : null) }}" />
									</span>
									<span name="name_autocheck" class="autocheck"></span>
									<div name="name_error" class="clear error">
										@if($errors->has('name'))
											{{ $errors->first('name') }}
										@endif
									</div>
								</div>
								<div class="clear"></div>
							</div>
									
							<div class="form-group">
								<label class="formLeft" for="param_name">Title:<span class="req">*</span></label>
								<div class="formRight">
									<span class="oneTwo">
										<input class="form-control" name="title" id="param_name" _autocheck="true" type="text" value="{{ old('title', $setting ? $setting->title : null) }}" />
									</span>
									<span name="name_autocheck" class="autocheck"></span>
									<div name="name_error" class="clear error">
										@if($errors->has('title'))
											{{ $errors->first('title') }}
										@endif
									</div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="form-group">
								<label class="formLeft" for="param_name">Keywords:</label>
								<div class="formRight">
									<span class="oneTwo">
										<input class="form-control" name="keyword" id="param_name" _autocheck="true" type="text" value="{{ e(old('keyword', $setting ? $setting->keyword : null)) }}" />
									</span>
									<span name="name_autocheck" class="autocheck"></span>

									<div name="image_error" class="clear error">
										@if($errors->has('keyword'))
											{{ $errors->first('keyword') }}
										@endif
									</div>
								</div>
								<div class="clear"></div>
							</div>


							<div class="form-group">
								<label class="formLeft" for="param_sale">Description:</label>
								<div class="formRight">
									<span class="oneTwo">
										<textarea class="form-control" name="description" id="param_sale" rows="4" cols="">{{ e(old('description', $setting ? $setting->description : null)) }}</textarea>
									</span>
									<span name="sale_autocheck" class="autocheck"></span>
									<div name="image_error" class="clear error">
										@if($errors->has('description'))
											{{ $errors->first('description') }}
										@endif
									</div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="form-group">
								<label class="formLeft">Logo:<span class="req">*</span></label>
								<div class="formRight">
									<div style="margin: 10px 0;">
										<img id="holder"  width='390' height="109" src="{{ $setting ? url($setting->logo) : '' }}">
									</div>
									<div class="left">
										<span class="input-group-btn">
									        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
									          <i class="fa fa-picture-o"></i> Choose
									        </a>
									    </span>
									    <input class="form-control" id="thumbnail" class="form-control" type="text" value="{{$setting->logo}}" name="logo">
									</div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="form-group">
								<label class="formLeft">Logo Footer:<span class="req">*</span></label>
								<div class="formRight">
									<div style="margin: 10px 0;">
										<img id="holder-footer"  width='390' height="109" src="{{ $setting ? url($setting->logo_footer) : '' }}">
									</div>
									<div class="left">
										<span class="input-group-btn">
									        <a id="lfm-footer" data-input="thumbnail-footer" data-preview="holder-footer" class="btn btn-primary">
									          <i class="fa fa-picture-o"></i> Choose
									        </a>
									    </span>
									    <input class="form-control" id="thumbnail-footer" class="form-control" type="text" value="{{$setting->logo_footer}}" name="logo_footer">
									</div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="form-group">
								<label class="formLeft" for="param_sale">Content:</label>
								<div class="formRight">
									<span class="oneTwo">
										<textarea name="content" class="form-control" id="param_sale" rows="4" cols="">{{ e(old('content', $setting ? $setting->content : null)) }}</textarea>
									</span>
									<span name="sale_autocheck" class="autocheck"></span>
									<div name="image_error" class="clear error">
										@if($errors->has('content'))
											{{ $errors->first('content') }}
										@endif
									</div>
								</div>
								<div class="clear"></div>
							</div>

								 
							<div class="form-group">
								<label class="formLeft" for="param_site_title">Email:</label>
								<div class="formRight">
									<span class="oneTwo">
										<input class="form-control" name="email" id="param_name" _autocheck="true" type="text" value="{{ old('email', $setting ? $setting->email : null) }}" />
									</span>
									<span name="sale_autocheck" class="autocheck"></span>
									<div name="image_error" class="clear error">
										@if($errors->has('email'))
											{{ $errors->first('email') }}
										@endif
									</div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="form-group">
								<label class="formLeft" for="param_meta_desc">Số ĐT:</label>
								<div class="formRight">
									<span class="oneTwo">
										<input class="form-control" name="phone" _autocheck="true" type="text" value="{{ old('phone', $setting ? $setting->phone : null) }}" />
									</span>
									<span name="sale_autocheck" class="autocheck"></span>
									<div name="image_error" class="clear error">
										@if($errors->has('phone'))
											{{ $errors->first('phone') }}
										@endif
									</div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="form-group">
								<label class="formLeft" for="param_meta_desc">Địa chỉ liên hệ:</label>
								<div class="formRight">
									<span class="oneTwo">
										<input class="form-control" name="address" _autocheck="true" type="text" value="{{ old('address', $setting ? $setting->address : null) }}" />
									</span>
									<span name="sale_autocheck" class="autocheck"></span>
									<div name="image_error" class="clear error">
										@if($errors->has('address'))
											{{ $errors->first('address') }}
										@endif
									</div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="form-group">
								<label class="formLeft" for="param_meta_desc">Facebook:</label>
								<div class="formRight">
									<span class="oneTwo">
										<input class="form-control" name="facebook" _autocheck="true" type="text" value="{{ old('facebook', $setting ? $setting->facebook : null) }}" />
									</span>
								</div>
								<div class="clear"></div>
							</div>

							<div class="form-group">
								<label class="formLeft" for="param_meta_desc">Twitter:</label>
								<div class="formRight">
									<span class="oneTwo">
										<input class="form-control" name="twitter" _autocheck="true" type="text" value="{{ old('twitter', $setting ? $setting->twitter : null) }}" />
									</span>
								</div>
								<div class="clear"></div>
							</div>

							<div class="form-group">
								<label class="formLeft" for="param_meta_desc">Flickr:</label>
								<div class="formRight">
									<span class="oneTwo">
										<input class="form-control" name="flickr" _autocheck="true" type="text" value="{{ old('flickr', $setting ? $setting->flickr : null) }}" />
									</span>
								</div>
								<div class="clear"></div>
							</div>

							<div class="form-group">
								<label class="formLeft" for="param_meta_desc">Google:</label>
								<div class="formRight">
									<span class="oneTwo">
										<input class="form-control" name="google" _autocheck="true" type="text" value="{{ old('google', $setting ? $setting->google : null) }}" />
									</span>
								</div>
								<div class="clear"></div>
							</div>

							<div class="form-group">
								<label class="formLeft" for="param_meta_desc">Dribbble:</label>
								<div class="formRight">
									<span class="oneTwo">
										<input class="form-control" name="dribbble" _autocheck="true" type="text" value="{{ old('dribbble', $setting ? $setting->dribbble : null) }}" />
									</span>
								</div>
								<div class="clear"></div>
							</div>

				    		<div class="formSubmit">
				       			<button type="submit" class="btn btn-primary">Cập nhật</button>
				       			<button type="reset" class="btn btn-default">Hủy bỏ</button>
				       		</div>
				    		<div class="clear"></div>
						</div>
					</fieldset>
				</section>
			</form>
		</div>		
	</div>
	
@endsection

@push('scripts')
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script>
		$('#lfm').filemanager('image');
		$('#lfm-footer').filemanager('image');
	</script>
@endpush
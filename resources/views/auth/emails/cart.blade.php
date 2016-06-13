<body>
	<style type="text/css">
		table tr td {
		    vertical-align: middle;
		    padding: 0 35px;
		}
	</style>
	<p><b>Xin chào</b> {{ $data->name }}!</p>
	<p>Đơn hàng của bạn đã được tiếp nhận, chúng tôi sẽ nhanh chóng liên hệ với bạn.</p>
	<p>Hoặc liên lệ với chúng tôi:</p>
	<table>
		<tr>
			<td style="padding: 0 35px;"><img src="{{ url($setting->logo) }}" width="100" height="60"></td>
			<td style="padding: 0 35px;"><b>E-mail:</b> {{ $setting->email }}</td>
			<td style="padding: 0 35px;"><b>Số ĐT:</b> <span style="letter-spacing: 1px">{{ $setting->phone }}</span></td>
		</tr>
	</table>
	<h3>Thông tin đơn hàng của bạn:</h3>
	<p> <b>Mã đơn hàng:</b> #{{$data->id}}	<b>Ngày tạo:</b> {{$data->created_at}}</p>
	<div class="row col-md-12 cart-item">
	    <div class="table-responsive cart_info">
	        <table style="boder: 1px solid #ccc; text-align: center;">
	            <thead>
	                <tr style="background: #1F79A7; color: #FFF;">
	                    <th>Mã đơn hàng</th>
	                    <th class="image" width="80">Sản phẩm</th>
	                    <th width="170"></th>
	                    <th class="">Giá thuê</th>
	                </tr>
	            </thead>
                <tbody>
                    <tr>
                        <td>
                        	#{{$data->id}}
                        </td>
                        <td class="cart_product">
                        	<img src="{{ $data->carriage->image }}" class="img-responsive" alt="" width="65" height="80" />
                        </td>
                        <td class="cart_description">
                            <h4><a href="{{ route('client.posts', [ $data->carriage->slug, $data->slug ]) }}">{{$data->name}}</a></h4>
                        </td>
                        <td class="cart_price text-center">
                            <p>{{$data->price}}</p>
                        </td>
                    </tr>
                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
</body>
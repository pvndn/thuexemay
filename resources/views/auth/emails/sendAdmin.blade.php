<body>
	<p>Xin chào Admin Luxury.com!</p>
	<p>{{ $data->name }} đã gửi 1 yêu cầu đặt hàng đến hệ thống, {{ $data->created_at }}</p>

	<a href="">Chi tiết đơn hàng #{{ $data->id }}</a>

	<p>Thông tin liên hệ</p>
	<table>
		<tr>
			<td>Họ tên:</td>
			<td>{{ $data->name }}</td>
		</tr>
		<tr>
			<td>Email:</td>
			<td>{{ $data->email }}</td>
		</tr>
		<tr>
			<td>Số ĐT:</td>
			<td>{{ $data->phone }}</td>
		</tr>
	</table>

	<h5>Thông tin đơn hàng của {{ $data->name }}</h5>
	<div class="row col-md-12 cart-item">
	    <div class="table-responsive cart_info">
	        <table style="boder: 1px solid #ccc; text-align: center;">
	            <thead>
	                <tr style="background: #1F79A7; color: #FFF;">
	                    <th class="image" width="80">Sản phẩm</th>
	                    <th width="170"></th>
	                    <th class="">Giá thuê</th>
	                </tr>
	            </thead>
                <tbody>
                    <tr>
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
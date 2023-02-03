<html>
	<title>Invoice</title>
	<head>	
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>	
	</head>
	<body>

<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
            
		</style>
<div id="content" class="bg-container">
    <div class="row">
			<table style="width:100%">
                <tr>
                    <td colspan="2">oben</td>
                    <td colspan="2"><strong>Order Id:{{$data->orderid}}</strong></td>
                </tr>
                <tr>
                    <td><strong>Customer Name </strong><br/>{{$data->fname}} {{$data->lname}}</td>
                    <td ><strong>Email </strong><br/>{{$data->email}}</td>
                    <td ><strong>mobile </strong><br/>{{$data->mobile}}</td>
                </tr>
                <tr>
                    <td ><strong>Shipping Address</strong><br/>{{$data->address}},{{$data->emirates}},{{$data->area}} </td>
                    <td ><strong>Payment Mode</strong>: @if($data->payment_mode==1)
                    Online
                    @else
                    Offline
                    @endif
                </td>
                </tr>
                
            </table>
            <table class="table table-bordered" style="width:100% !important;">
                    <thead>
                        <tr>
                            <th>Sl.no</th>
                            <th>Product Title</th>
                            <th>Qty</th>
                            <th>Amount</th>
                        </tr>                        
                    </thead>
                    <tbody>
                        <?php $i=0; 
                        $total_price = 0;
                        ?>
                        @foreach($product_details as $product)
                        <?php $i++; 
                        $total_price+=$product->quantity*$product->sale_price;
                        $amt = $product->quantity*$product->sale_price;
                        ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$product->product_title}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$amt}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><strong>Subtotal</strong></td>
                            <td>{{$total_price}}</td>
                        </tr>
                        <tr>
                            <td colspan="3"><strong>total</strong></td>
                            <td>{{$total_price}}</td>
                        </tr>
                    </tfoot>
                </table>
		</div>
        </div>        
		</body>
		</html>
<html>

<head>
	<meta charset="utf-8">
	<title>Invoice</title>
	<link rel="stylesheet" href="<?php echo SITE_CSS_PATH?>style3.css">
	<script src="<?php echo SITE_JS_PATH?>invoice.js"></script>
</head>

<body>
	<header>
		<h1>Invoice</h1>
		<address contenteditable>
			<p>Jonathan Neal</p>
			<p>101 E. Chapman Ave<br>Orange, CA 92866</p>
			<p>(800) 555-1234</p>
		</address>
		<span><img alt="" src="<?php echo SITE_IMG_PATH?>open_logo.png" width="60%"><input type="file" accept="image/*"></span>
	</header>
	<article>
		<h1>Recipient</h1>
		<address contenteditable>
			<p>Some Company<br>c/o Some Guy</p>
		</address>
		<table class="meta">
			<tr>
				<th><span contenteditable>Invoice #</span></th>
				<td><span contenteditable>101138</span></td>
			</tr>
			<tr>
				<th><span contenteditable>Date</span></th>
				<td><span contenteditable>January 1, 2020</span></td>
			</tr>
			<tr>
				<!-- <th><span contenteditable>Amount Due</span></th>
				<td><span id="prefix" contenteditable>$</span><span>600.00</span></td> -->
			</tr>
		</table>
		<table class="inventory">
			<thead>
				<tr>
					<th><span contenteditable>Title</span></th>
					<th><span contenteditable>Artist</span></th>
					<!-- <th><span contenteditable>Rate</span></th>
					<th><span contenteditable>Quantity</span></th> -->
					<th><span contenteditable>Price</span></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><a class="cut">-</a><span contenteditable>Front End Consultation</span></td>
					<td><span contenteditable>Experience Review</span></td>
					<!-- <td><span data-prefix>$</span><span contenteditable>150.00</span></td>
					<td><span contenteditable>4</span></td> -->
					<td><span data-prefix>$</span><span>600.00</span></td>
				</tr>
			</tbody>
		</table>
		<a class="add">+</a>
		<table class="balance">
			<!-- <tr>
				<th><span contenteditable>Total Gross</span></th>
				<td><span data-prefix>$</span><span>600.00</span></td>
			</tr>
			<tr>
				<th><span contenteditable>Discount</span></th>
				<td><span data-prefix>$</span><span contenteditable>0.00</span></td>
			</tr> -->
			<tr>
				<th><span contenteditable>Total</span></th>
				<td><span data-prefix>$</span><span>600.00</span></td>
			</tr>
		</table>
	</article>
	<!-- <aside>
		<h1><span contenteditable>Additional Notes</span></h1>
		<div >
			<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
		</div>
	</aside> -->
</body>

</html>
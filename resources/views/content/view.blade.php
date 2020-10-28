<!DOCTYPE html>
<html>
<head>
	<title> {{ $product['title'] }} </title>
	<style type="text/css">
		table,td,tr,th{
			border:2px solid black;
			padding: 5px;
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<th>title</th>
			<th>username</th>
			<th>added</th>
		</tr>
			<tr>
				<td>{{ $product['title']}}</td>
				<td>{{ $username }}</td>
				<td>{{ $product["created_at"]->diffForHumans() }}</td>
			</tr>
	</table>
	<p>{{ $product['description'] }}</p>
	<img src="{{ $product['image'] }}" height="500px">
</body>
</html>
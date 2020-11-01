<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
  <tr>
    <th>id</th>
    <th>name</th>
    <th>age</th>
    <th>Description</th>
  </tr>
  @foreach($datas as $data)
  <tr>
  	<td>{{ $data->id }}</td>
    <td>{{ $data->name }}</td>
    <td>{{ $data->age }}</td>
    <td>{{ $data->description }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>
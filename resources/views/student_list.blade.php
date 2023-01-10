<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table >
        <thead>
            <th>
                <td>Name</td>
                <td>Address</td>
                <td>phone number</td>
                <td>Picture</td>

            </th>
        </thead>
        <tbody>
            @foreach ($data as $student )
            <tr>
                <td>{{$student->name}}</td>
                <td>{{$student->address}}</td>
                <td>{{$student->phone_number}}</td>
                <td>
                    <img src="{{ asset('assets/uploads/profile_pictures/'.$student->file_upload)}}" width="60%" height="100px" alt="image">
                </td>
                <td><a href="{{ route('edit.data', ['id' => $student->id])}}">edit</td>
                <td><a href="{{ route('delete.data', ['id' => $student->id])}}">delete</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

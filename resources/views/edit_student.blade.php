<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('update.data',['id' => $student->id])}}" method='POST' >
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $student->name}}" required>
        </div>
        <div>
            <label for="address">address</label>
            <input type="text" name="address" value="{{ $student->address}}"required>
        </div>
        <div>
            <label for="phone_number">Phone number</label>
            <input type="text" name="phone_number" value="{{ $student->phone_number}}"  required>
        </div>
        <input type="submit">
    </form>
</body>
</html>

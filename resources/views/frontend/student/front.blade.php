<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Image</title>
</head>
<style>
    html,
    body {
        height: 100vh;
    }

    body {
        display: grid;
        place-items: center;
    }
</style>

<body>
    <div>

        {!! $qr !!}
        <div>
            <h3>Student Name - {{ $name }}</h3>
            <p>Student Number - {{ $no }}</p>
            <p>Education - {{ $education }}</p>
            <p>Batch Number - {{ $batch }}</p>
            <p>University Name - {{ $university }}</p>
        </div>
    </div>
</body>

</html>

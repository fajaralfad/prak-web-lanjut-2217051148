<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    
    <form action="/user/store" method="POST">
    @csrf
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama"><br>

    <label for="npm">NPM:</label>
    <input type="text" id="npm" name="npm"><br>

    <label for="kelas">Kelas:</label>
    <input type="text" id="kelas" name="kelas"><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>

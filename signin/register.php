<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <form action="signin.php" class="mb-3" method="POST">

    <div>
    Insert name
    <input type="text" name="nome" required>
    </div>

    <div>
    Insert surname
    <input type="text" name="cognome" required>
    </div>

    <div>
    Insert username
    <input type="text" name="username" required>
    </div>

    <div>
    Insert email
    <input type="email" name="email" required>
    </div>

    <div>
    Insert password
    <input type="password" name="password" required>
    </div>

    <button type="submit" class="btn btn-success" required>Login</button>
    </form>

</body>
</html>
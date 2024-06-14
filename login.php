<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            color: #ffffff;
        }
        .card {
            background-color: #212529;
            border: 1px solid #343a40;
            border-radius: 15px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.5rem;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 25px;
        }
        .form-control {
            background-color: #495057;
            border: 1px solid #6c757d;
            color: white;
            border-radius: 25px;
        }
        .form-control:focus {
            background-color: #495057;
            color: white;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .container {
            margin-top: 10%;
        }
        .title {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="title">JURNAL PRAKERIN</div>
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="index.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Successful</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            background: #ffffff;
        }
        .card-header {
            background-color: orange;
            color: white;
            text-align: center;
            border-radius: 15px 15px 0 0;
            font-size: 28px;
            font-weight: bold;
            padding: 20px;
        }
        .card-body {
            padding: 30px;
            text-align: center;
        }
        .btn-custom {
            background-color: orange;
            color: white;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
        }
        .btn-custom:hover {
            background-color: #ff7518;
            color:white;
        }
        .reservation-details {
            text-align: left;
            margin-top: 20px;
            background-color: #fff3e6;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .reservation-details p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Reservation Successful!
                    </div>
                    <div class="card-body">
                        <p class="card-text">Thank you for your reservation. We have successfully received your request.</p>
                        <p class="card-text">We look forward to serving you at Indie Zaika.</p>
                        <div class="reservation-details">
                            <h4>Reservation Details:</h4>
                            <p><strong>Name:</strong> <?php echo htmlspecialchars($_GET['name']); ?></p>
                            <p><strong>Email:</strong> <?php echo htmlspecialchars($_GET['email']); ?></p>
                            <p><strong>Phone:</strong> <?php echo htmlspecialchars($_GET['phone']); ?></p>
                            <p><strong>Date:</strong> <?php echo htmlspecialchars($_GET['date']); ?></p>
                            <p><strong>Time:</strong> <?php echo htmlspecialchars($_GET['time']); ?></p>
                            <p><strong>Number of Guests:</strong> <?php echo htmlspecialchars($_GET['guests']); ?></p>
                        </div>
                        <div class="mt-4">
                            <a href="index.html" class="btn btn-custom">Back to Home</a>
                            <a href="index.html" class="btn btn-custom">Make Another Reservation</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

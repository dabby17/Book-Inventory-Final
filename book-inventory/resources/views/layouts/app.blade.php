<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Inventory</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #667eea, #764ba2);
      min-height: 100vh;
      padding: 30px 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
    }

    .container {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      padding: 40px 30px;
      border-radius: 15px;
      max-width: 600px;
      width: 100%;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
      animation: fadeIn 1s ease;
    }

    h1 {
      text-align: center;
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 30px;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .mb-3 {
      margin-bottom: 1.5rem;
    }

    .form-label {
      font-size: 1rem;
      font-weight: 600;
      margin-bottom: 8px;
      display: block;
    }

    .form-control,
    .form-select {
      padding: 12px 15px;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.2);
      border: none;
      color: #fff;
      transition: 0.3s ease;
      margin-bottom: 20px;
    }

    .form-control::placeholder {
      color: #eee;
    }

    .form-control:focus,
    .form-select:focus {
      background: rgba(255, 255, 255, 0.3);
      outline: none;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.5);
    }

    .alert {
      background: rgba(255, 99, 71, 0.8);
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 20px;
      font-size: 1rem;
    }

    .btn {
      border-radius: 8px;
      padding: 12px 20px;
      text-transform: uppercase;
      font-weight: bold;
      transition: 0.3s ease;
      font-size: 1rem;
      border: none;
      margin-right: 10px;
    }

    .btn-success {
      background-color: #28a745;
      color: white;
    }

    .btn-success:hover {
      background-color: #218838;
      transform: translateY(-2px);
    }

    .btn-secondary {
      background-color: #6c757d;
      color: white;
    }

    .btn-secondary:hover {
      background-color: #5a6268;
      transform: translateY(-2px);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 600px) {
      .container {
        padding: 30px 20px;
      }
      h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>
  @yield('content')
</body>
</html>

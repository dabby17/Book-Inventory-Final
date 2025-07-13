<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Inventory Report</title>
    <style>
        /* Reset styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling */
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(45deg, #00b5e2, #ff6b6b);
            color: #fff;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        /* Heading styles */
        h1 {
            font-size: 3rem;
            color: #fff;
            margin-bottom: 30px;
            font-weight: 700;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: slideIn 1s ease-out;
        }

        /* Table styling */
        table {
            width: 1000%;
            max-width: 2000px !important;
            margin-top: 20px;
            border-collapse: collapse;
            border-radius: 10px;
            background-color: rgba(0, 0, 0, 0.6);
            box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 12px 20px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            font-size: 1rem;
            transition: transform 0.3s ease-in-out;
        }

        th {
            background-color: #333;
            color: #ff6b6b;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            background-color: #222;
        }

        /* Row hover effect */
        tr:hover {
            background-color: #333;
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        /* 3D hover effect for cells */
        th:hover, td:hover {
            background-color: #4e4e4e;
            color: #ffeb3b;
            transform: scale(1.05);
        }

        /* Animation for header */
        @keyframes slideIn {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Small screen responsiveness */
        @media (max-width: 768px) {
            table {
                width: 90%;
            }
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <h1>Book Inventory Report</h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->quantity }}</td>
                    <td>{{ $book->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

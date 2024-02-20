<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Dashboard</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10  shadow p-3 mb-5 bg-white rounded p-4">
                <div class="row m-2">
                    <div class="col-4"><a href=""><button type="button" class="btn btn-info">Refresh</button></a></div>
                    <div class="col-4 text-center">
                        <h3>Data from API</h3>
                    </div>
                    <div class="col-4 text-end"> 
                        <a href="logout"><button type="button" class="btn btn-secondary">Logout</button></a>
                    </div>
                </div>
                <div class="p-5">
                    @foreach($datas as $data)
                    <h4>{{ $data}}</h4>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>
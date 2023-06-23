<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/assets/bootstrap.min.css">
    <title>View Logger</title>
</head>

<body style="margin:50px auto;">
    <div class="container">
        <div class="card-header">
            <h2>Log Viewer</h2>
        </div>
        <div class="card-body">
            <input type="hidden" id="page" value="1">
            <form class="row m-4">
                <div class="form-group col-8">
                    <input type="text" class="form-control" name="path" placeholder="/path/to/file" value="<?= $_GET['path'] ?>">
                </div>
                <div class="form-group col-4">
                    <button type="submit" class="btn btn-outline-primary btn-block" id="view">View</button>
                </div>
            </form>
            <div class="table row m-4" id="data">

            </div>
        </div>
        <div class=" card-footer text-center">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-secondary active first_page">
                    <input type="radio" id="first_page">
                    &lt;&lt;
                </label>
                <label class="btn btn-secondary previous">
                    <input type="radio" id="previous">
                    &lt;
                </label>
                <label class="btn btn-secondary next">
                    <input type="radio" id="next">
                    &gt;
                </label>
                <label class="btn btn-secondary last_page">
                    <input type="radio">
                    &gt;&gt;
                </label>
            </div>
        </div>
    </div>

    <script src="/public/assets/code.jquery.com_jquery-3.7.0.min.js"></script>
    <script src="/public/assets/bootstrap.min.js"></script>
    <script type="text/javascript" src="/public/assets/calls.js"></script>
</body>

</html>

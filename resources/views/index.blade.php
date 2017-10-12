<!DOCTYPE html>
<html lang="th-TH">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <style type="text/css">
        div {
            border-style: solid;
            border-color: #fff;
        }
        div.base {
            background-color: {{ $backgroundColors['base']  }};
        }
        div.alternate {
            background-color: {{ $backgroundColors['alternate'] }};
        }
    </style>
    <title>Display</title>
</head>
<body>
    <div class="container-fluid">
    @foreach($data as $text => $class)
        <div class="{{ $class }} col-lg-3 col-md-4 col-sm-6">
            {{ $text }}
        </div>
    @endforeach
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>phones sell</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

    <style type="text/css">
    div {
      border-style: solid;
      border-color: gray;
    }
    </style>
</head>
<body>
  <div class="container-fluid">
          @foreach ($sells as $sell)
            @foreach ($prices as $price)
              @if($price['name']==$sell['name'])
                @if(($price['price']) >= 19500)
                  <div class="col-sm-6 col-md-4 col-lg-3" style="background-color: red">{{ $sell['name'] }} ราคา {{ $sell['sell'] }} บาท</div>
                @else
                  <div class="col-sm-6 col-md-4 col-lg-3" style="background-color: green">{{ $sell['name'] }} ราคา {{ $sell['sell'] }} บาท</div>
                @endif
              @endif
              @endforeach
          @endforeach
  </div>
</body>
</html>

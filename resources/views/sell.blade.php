<!DOCTYPE html>
<html>
<head>
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

          @foreach ($items as $item)
          @if(($item['sell']) >= 19500)
              <div class="col-sm-6 col-md-4 col-lg-3" style="background-color:red">{{ $item['name'] }} ราคา {{ $item['sell'] }} บาท</div>
          @else
              <div class="col-sm-6 col-md-4 col-lg-3">{{ $item['name'] }} ราคา {{ $item['sell'] }} บาท</div>
          @endif

          @endforeach
  </div>
</body>
</html>

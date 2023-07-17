<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .transform-middle {
            transform: translateY(50%);
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-12 col-sm-4 m-auto transform-middle">
            <div class="card">
                <div class="card-header">
                    Simply Calculator
                </div>
                <div class="card-body">
                    @isset($result)
                    Result is : {{$result}}
                    @endisset
                    <form method="post" action="{{route('calculator.index')}}">  
                        <div class="row">
                            @csrf
                            <div class="form-group">
                                <label for="type">Select Type</label>
                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="">Select Option</option>
                                    <option value="sum" @selected(@$request['type'] == 'sum')>sum</option>
                                    <option value="minus" @selected(@$request['type'] == 'minus')>minus</option>
                                    <option value="multiply" @selected(@$request['type'] == 'multiply')>multiply</option>
                                    <option value="division" @selected(@$request['type'] == 'division')>division</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="first">1st number</label>
                                <input type="number" name="value1" class="form-control @error('value1') is-invalid @enderror" value="{{old('value1', $request['value1'] ?? '')}}" placeholder="Enter 1st number">
                            </div>
                            <div class="form-group">
                                <label for="second">2nd number</label>
                                <input type="number" name="value2" class="form-control @error('value2') is-invalid @enderror" value="{{old('value2', $request['value2'] ?? '')}}" placeholder="Enter 2nd number">
                            </div>

                            <div class="form-group my-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
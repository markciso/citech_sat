
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PnC Admission</title>
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>
    :root {
        --mdc-theme-primary: #176203;
        --mdc-theme-secondary: #219b1a;
        --mdc-theme-on-primary: #176203;
        --mdc-theme-on-secondary: #176203;
        mdc-textfield-label-color : #176203;
    }

    .mdc-floating-label--float-above{
        color:  #176203 !important;
    }
    .mdc-floating-label--shake{
        color:  #176203 !important;
    }

</style>
<body>
<div class="container">
    <div class="mdc-card m-5">
        <img src="{{asset('images/banner.jpg')}}" alt="" class="img-fluid">
        <div class="row p-3">
            <div class="col-sm-12">
                <p class="mdc-typography--body1">Good day! {{$data->lname. ', ' . $data->fname}}</p>

                <p class="mdc-typography--body1">Your application is being processed. Wait for further announcement on exam schedule. Schedule will be posted on our website and facebook pages.</p>
                <div class="row p-3">
                    <div class="col-sm-12 text-center">
                        <div class="mdc-card alert alert-success mx-4 mt-3" role="alert">
                            <strong class="mdc-typography--headline2 font-weight-bolder">{{$data->ref_number}}</strong>
                            <strong class="mdc-typography--body1 font-weight-bolder">REFERENCE NUMBER</strong>
                        </div>
                        <strong class="mdc-typography--body1 ">Please remember this as your reference number and print the copy of the application which you will use when you submit your requirements to get your test permit before the examination day.</strong>
                    </div>
                </div>
{{--                <div class="row">--}}
{{--                    <div class="col-sm-12 d-flex justify-content-center">--}}
{{--                        <div class="row p-4">--}}
{{--                            <a href="{{ url('download')  }}" class="mdc-button mdc-button--raised text-white">DOWNLOAD APPLICATION FORM</a>--}}
{{--                        </div>.'/'. $data->ref_number--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
</body>
</html>


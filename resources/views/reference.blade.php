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
        <div class="row p-3">
            <div class="col-sm-12 text-center">
                <h1 class="mdc-typography--headline5  font-weight-bolder">CITECH-SAT APPLICATION SUBMITTED</h1>
                <div class="mdc-card alert alert-warning mx-4 mt-3" role="alert">
                    <strong class="mdc-typography--headline2 font-weight-bolder" style="color:#3707fa;">{{$ref}}</strong>
                    <strong class="mdc-typography--body1 font-weight-bolder" style="color:black;">REFERENCE NUMBER</strong>
                </div>
                <strong class="mdc-typography--body1 ">Please remember this as your reference number and print the copy of the application which you will use when you submit your requirements to get your test permit before the examination day.</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center">
                <div class="row p-4">
                    <a href="{{ url('print') .'/'. $ref }}" class="mdc-button mdc-button--raised text-white">PRINT APPLICATION FORM</a>
                </div>
                <div class="row p-4">
                    <a href="{{ url('download') .'/'. $ref }}" class="mdc-button mdc-button--raised text-white">DOWNLOAD APPLICATION FORM</a>
                </div>
            </div>
        </div>
        <div class="mdc-card alert alert-danger mx-4 mt-3" role="alert">
            <strong>IMPORTANT REMINDERS:</strong>
            <br>
            Submission of the following to be announced:
            <ul>
                <li>Printed filled-out online registration form (with scanned photo on white background).</li>
                <li>Photocopy of valid Grade 10 report card. (with grades for 2nd grading period).</li>
                <li>Photocopy and original voter's ID (Applicant or Parent).</li>
                <li>Original copy of certification (Top 10 of the class) - for non-cabuyenos</li>


            </ul>




        </div>
    </div>
</div>
</body>
</html>

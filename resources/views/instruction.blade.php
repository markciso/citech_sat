
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CITech - Admission</title>
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
        <img src="{{asset('images/citech-sat.png')}}" alt="" class="img-fluid">
        <hr>
        <div class="row p-3">
            <div class="col-sm-12">
                <h1 class="mdc-typography--headline6" style="color:#3b9140;"><strong>Who may take the CITech-Senior High Admission Test (CITECH-SAT)?</strong></h1>
                <ul>
                    <li><h1 class="mdc-typography--body1">Those who are currently enrolled in Grade 10 (public or private school).</h1></li>
                    <li><h1 class="mdc-typography--body1">Those who are registered voters of Cabuyao City or whose parents are registered voters of Cabuyao City (please note that Cabuyenos will be given priority)</h1></li>
                    <li><h1 class="mdc-typography--body1">NOTE FOR NON-CABUYENOS or THOSE COMING FROM OTHER CITIES OR PROVINCES: only those who belong to the Top 10 of their class will be allowed to take the admission test (a certification from the school registrar will be required)</h1></li>
                </ul>
                
                <h1 class="mdc-typography--headline6" style="color:#3b9140;"><strong>Privacy Statement</strong></h1>
                <h1 class="mdc-typography--body1">I agree with the institute’s Data Privacy Statement and express my consent for the Cabuyao Institute of Technology (CITech), to collect, record, organize, update or modify, retrieve, consult, use, consolidate, block, erase or destruct my personal data as part of my information. </h1>
                <h1 class="mdc-typography--body1">I hereby affirm my right to be informed, object to processing, access and rectify, suspend or withdraw my personal data, and be indemnified in case of damages pursuant to the provisions of the Republic Act No. 10173 of the Philippines, Data Privacy Act of 2012 and its corresponding Implementing Rules and Regulations.</h1>
                
                <div class="row p-4 align-content-center">
                    <div class="text-center">
                        <a href="{{ url('registration') }}" class="mdc-button mdc-button--raised text-uppercase text-white">PROCEED TO CITECH ADMISSION</a>
                    </div>
                </div>
                <div class="row p-4 align-content-center">
                    <div class="text-center">
                        <a href="#"><strong>Forgot your Reference Number?</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


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
               <center><h1><strong>Entrance Exam Application is already done!</strong></h1></center>
               <br><br>
               <h3>For concerns and further announcements, you can visit the following:</h3>
               <br><br>
               <ul>
                    <li><a href="https://www.facebook.com/citech2019"><h4>Cabuyao Institute of Technology Official Facebook Page</h4></a></li>
                    <li><a href="https://www.facebook.com/citechhelpdesk"><h4>Cabuyao Institute of Technology Helpdesk</h4></a></li>
                    <li><a href="https://www.facebook.com/groups/540238332698922/"><h4>Pamantasan ng Cabuyao Official Facebook Page</h4></a></li>
               </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>

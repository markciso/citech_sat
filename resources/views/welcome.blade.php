<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CITech - Admission</title>
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
<div class="mdc-dialog" id="dialog-loading">
    <div class="mdc-dialog__container">
        <div class="mdc-dialog__surface"
             role="alertdialog"
             aria-modal="true"
             aria-labelledby="my-dialog-title"
             aria-describedby="my-dialog-content">
            <div class="mdc-dialog__content" id="my-dialog-content">
                Submitting Admission Please Wait.....
            </div>
        </div>
    </div>
    <div class="mdc-dialog__scrim"></div>
</div>

<form method="POST" action="{{url('/submit-admission')}}" enctype="multipart/form-data" id="formAdmission">
    @csrf
    <input type="hidden" id="admissiontype" name="admissiontype" value="<?php echo ($type=='College'?0:1);?>">

    <div class="container">
        <div class="mdc-card m-4">
            <img src="{{asset('images/citech-sat.png')}}" alt="" class="img-fluid">
        </div>
        <div class="mdc-card alert alert-warning mx-4" role="alert">
            <strong>NOTE : </strong><span>All fields with asterisk(*) are required. Please leave all fields without asterisk(*) blank if the information is not available.</span>
        </div>


        <div class="mdc-card m-4 p-4">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="mdc-typography--headline6" style="color:#3b9140; font-weight:bold;">Basic Information</h1>
                </div>
            </div>

            <div class="mdc-card">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-3 text-center">
                        <img src="{{asset('images/avatar.png')}}" alt="" class="shadow-sm bg-white rounded w-100 mt-4 mb-2" id="image_preview" style="border: 1px solid black;">
                        <input type="file" accept="image/x-png,image/jpeg" name="image" id="image" class="form-control-file "
                               required>
                        <h1 class="mdc-typography--caption" style="color:#d9c221;">Select your picture (passport size in white background) must be less than 1mb</h1>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Learning Reference Number (LRN)</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="lrn" type="text" class="mdc-text-field__input" name="lrn" value="" required="" autocomplete="">
                    </label>
                </div>
                 <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Do you have Voucher/ESC/QVR?</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <select id="barangay" type="text" class="mdc-text-field__input" name="voucher" value="">
                            <option value="" disabled selected></option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Voucher/ESC/QVR No.</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="voucher_no" type="text" class="mdc-text-field__input" name="voucher_no" value="" required="" autocomplete="" >
                    </label>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Lastname</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="lastname" type="text" class="mdc-text-field__input" name="lastname" value="" required="" autocomplete="lastname" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Firstname</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="firstname" type="text" class="mdc-text-field__input" name="firstname" value="" required="" autocomplete="firstname including extension name" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Middlename</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="middlename" type="text" class="mdc-text-field__input" name="middlename" value="" autocomplete="middlename" >
                    </label>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                                  <span class="mdc-notched-outline">
                                    <span class="mdc-notched-outline__leading"></span>
                                    <span class="mdc-notched-outline__notch">
                                      <span class="mdc-floating-label" id="my-label-id">Birthday</span>
                                    </span>
                                        <span class="mdc-notched-outline__trailing"></span>
                                    </span>
                        <input id="date_of_birth" type="date" class="mdc-text-field__input" name="date_of_birth" value="" required="" autocomplete="date_of_birth">
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Place of Birth</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="place_of_birth" type="text" class="mdc-text-field__input" name="place_of_birth" value="" required="" autocomplete="place_of_birth" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Citizenship</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="citizenship" type="text" class="mdc-text-field__input" name="citizenship" value="" required="" autocomplete="citizenship" >
                    </label>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-6">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Present Address</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="present_address" type="text" class="mdc-text-field__input" name="present_address" value="" required="" autocomplete="present_address" >
                    </label>
                </div>
                <div class="col-sm-3">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Religion</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="religion" type="text" class="mdc-text-field__input" name="religion" value="" autocomplete="religion" >
                    </label>
                </div>
                <div class="col-sm-3">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Sex</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <select id="sex" type="text" class="mdc-text-field__input" name="sex" value="" required="" >
                            <option value="" disabled selected></option>
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                        </select>
                    </label>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-5">
                    <label class="mdc-text-field mdc-text-field--outlined  d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label " id="my-label-id">Are you a registered voter of Cabuyao City?</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <select id="is_voter" type="text" class="mdc-text-field__input" name="is_voter" value="" required="" >
                            <option value="" disabled selected></option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Where?</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <select id="barangay" type="text" class="mdc-text-field__input" name="barangay" value="">
                            <option value="" disabled selected></option>
                            <option value="Baclaran">Baclaran</option>
                            <option value="Banay-Banay">Banay-Banay</option>
                            <option value="Banlic">Banlic</option>
                            <option value="Bigaa">Bigaa</option>
                            <option value="Butong">Butong</option>
                            <option value="Casile">Casile</option>
                            <option value="Diezmo">Diezmo</option>
                            <option value="Gulod">Gulod</option>
                            <option value="Mamatid">Mamatid</option>
                            <option value="Marinig">Marinig</option>
                            <option value="Niugan">Niugan</option>
                            <option value="Pittland">Pittland</option>
                            <option value="Pulo">Pulo</option>
                            <option value="Sala">Sala</option>
                            <option value="San Isidro">San Isidro</option>
                            <option value="Barangay I Poblacion">Barangay I Poblacion</option>
                            <option value="Barangay II Poblacion">Barangay II Poblacion</option>
                            <option value="Barangay III Poblacion">Barangay III Poblacion</option>
                        </select>
                    </label>
                </div>
                <div class="col-sm-3">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Since</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="name" type="number" min="1900" max="2021" class="mdc-text-field__input" name="voter_since" value=""  placeholder="ex. 2012, 2013">
                    </label>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-8">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Last School Attended?</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="last_shs" type="text" class="mdc-text-field__input" name="last_shs" value="" required="" autocomplete="last_shs" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">School Type</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <select id="school_type" type="text" class="mdc-text-field__input" name="school_type" value="" required="" >
                            <option value="" disabled selected></option>
                            <option value="1">Public</option>
                            <option value="0">Private</option>
                        </select>
                    </label>
                </div>
            </div>
        </div>

        <div class="mdc-card m-4 p-4">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="mdc-typography--headline6" style="color:#3b9140; font-weight:bold;">Contact Information</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Mobile No.</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="mobile_no" type="text" class="mdc-text-field__input" name="mobile_no" value="" />
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Telephone No.</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="telephone_no" type="text" class="mdc-text-field__input" name="telephone_no" value="" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">E-mail Address</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="email" type="email" class="mdc-text-field__input" name="email" value=""  required>
                    </label>
                </div>
            </div>
        </div>
        <div class="mdc-card m-4 p-4">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="mdc-typography--headline6" style="color:#3b9140; font-weight:bold;">Educational Background</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Junior High School (NO ACRONYMS)</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="jhs" type="text" class="mdc-text-field__input" name="jhs" value="" required="" autocomplete="jhs" >        </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Year Graduated</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="jhs_graduated" type="number" min="1900" max="2021" placeholder="ex. 2018, 2019" class="mdc-text-field__input" name="jhs_graduated" value="" required="" >       </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Honors Received</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="jhs_honors" type="text" class="mdc-text-field__input" name="jhs_honors" value="" autocomplete="jhs_honors" >    </label>
                </div>
                <div class="col-sm-12 mt-3">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Junior High School Address</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="jhs_address" type="text" class="mdc-text-field__input" name="jhs_address" value="" autocomplete="jhs_honors" >    </label>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Elementary School (NO ACRONYMS)</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="elem" type="text" class="mdc-text-field__input" name="elem" value="" required="" autocomplete="elem" >        </label></div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Year Graduated</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="elem_graduated" type="number" min="1900" max="2021" placeholder="ex. 2018, 2019" class="mdc-text-field__input" name="elem_graduated" value="" required="" autocomplete="elem_graduated" >  </label></div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Honors Received</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="elem_honors" type="text" class="mdc-text-field__input" name="elem_honors" value="" autocomplete="elem_honors" ></label></div>
                <div class="col-sm-12 mt-3">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Elementary School Address</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="elem_address" type="text" class="mdc-text-field__input" name="elem_address" value="">
                    </label>

                </div>
            </div>
        </div>

        <div class="mdc-card m-4 p-4">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="mdc-typography--headline6" style="color:#3b9140; font-weight:bold;">Family Background</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Civil Status</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <select id="civil_status" type="text" class="mdc-text-field__input" name="civil_status" value="" required="" autocomplete="civil_status">
                            <option value="" disabled selected></option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Separated">Separated</option>
                            <option value="Widow">Widow</option>
                            <option value="Widower">Widower</option>
                        </select>
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Spouse Name</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="spouse_name" type="text" class="mdc-text-field__input" name="spouse_name" value="" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Spouse Legal Residence</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="spouse_residence" type="text" class="mdc-text-field__input" name="spouse_residence" value="" >
                    </label>
                </div>
            </div>
            <hr>
            <h4>Father's Information</h4>
            <div class="row">
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Father's Name</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="father_name" type="text" class="mdc-text-field__input" name="father_name" value="" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Highest Educational Attainment</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <select id="father_attainment" type="text" class="mdc-text-field__input" name="father_attainment" value="" autocomplete="father_attainment" >
                            <option value="" disabled selected></option>
                            <option value="Elementary">Elementary</option>
                            <option value="High School">High School</option>
                            <option value="Vocational">Vocational</option>
                            <option value="College">College</option>
                            <option value="Post Graduate">Post Graduate</option>
                        </select>
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Birthday</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="father_birthday" type="date" class="mdc-text-field__input" name="father_birthday" value="" >
                    </label>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Contact No.</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="father_contact" type="text" class="mdc-text-field__input" name="father_contact" value="" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Occupation</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="father_occupation" type="text" class="mdc-text-field__input" name="father_occupation" value="" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Monthly Income</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="father_income" type="number" class="mdc-text-field__input" name="father_income" value="" >
                    </label>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Company</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="father_company" type="text" class="mdc-text-field__input" name="father_company" value="" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Company Address</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="father_company_add" type="text" class="mdc-text-field__input" name="father_company_add" value="" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Status</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <select id="father_status" type="text" class="mdc-text-field__input" name="father_status" value="" autocomplete="father_status"  onchange="toggleGuardian();">
                            <option value="" disabled selected></option>
                            <option value="Employed">Employed</option>
                            <option value="Unemployed">Unemployed</option>
                            <option value="OFW">OFW</option>
                            <option value="Separated">Separated</option>
                            <option value="Deceased">Deceased</option>
                        </select>
                    </label>
                </div>
            </div>
            <hr>
            <h4>Mother's Information</h4>
            <div class="row">
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Mother's Name</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="mother_name" type="text" class="mdc-text-field__input" name="mother_name" value="" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Highest Educational Attainment</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <select id="mother_attainment" type="text" class="mdc-text-field__input" name="mother_attainment" value="" autocomplete="mother_attainment" >
                            <option value="" disabled selected></option>
                            <option value="Elementary">Elementary</option>
                            <option value="High School">High School</option>
                            <option value="Vocational">Vocational</option>
                            <option value="College">College</option>
                            <option value="Post Graduate">Post Graduate</option>
                        </select>
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Birthday</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="mother_birthday" type="date" class="mdc-text-field__input" name="mother_birthday" value="" >
                    </label>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Contact No.</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="mother_contact" type="text" class="mdc-text-field__input" name="mother_contact" value="" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Occupation</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="mother_occupation" type="text" class="mdc-text-field__input" name="mother_occupation" value="" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Monthly Income</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="mother_income" type="number" class="mdc-text-field__input" name="mother_income" value="" >
                    </label>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Company</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="mother_company" type="text" class="mdc-text-field__input" name="mother_company" value="" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Company Address</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="mother_company_add" type="text" class="mdc-text-field__input" name="mother_company_add" value="" >
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Status</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <select id="mother_status" type="text" class="mdc-text-field__input" name="mother_status" value="" autocomplete="mother_status"  onchange="toggleGuardian();">
                            <option value="" disabled selected></option>
                            <option value="Employed">Employed</option>
                            <option value="Unemployed">Unemployed</option>
                            <option value="OFW">OFW</option>
                            <option value="Separated">Separated</option>
                            <option value="Deceased">Deceased</option>
                        </select>
                    </label>
                </div>
            </div>
            <hr>
            <div id="guardian_layout">
                <h4>Guardian's Information</h4>
                <div class="row">
                    <div class="col-sm-4">
                        <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                          <span class="mdc-notched-outline">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch">
                              <span class="mdc-floating-label" id="my-label-id">Guardian's Name</span>
                            </span>
                                <span class="mdc-notched-outline__trailing"></span>
                            </span>
                            <input id="guardian_name" type="text" class="mdc-text-field__input" name="guardian_name" value="" >
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                          <span class="mdc-notched-outline">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch">
                              <span class="mdc-floating-label" id="my-label-id">Highest Educational Attainment</span>
                            </span>
                                <span class="mdc-notched-outline__trailing"></span>
                            </span>
                            <select id="guardian_attainment" type="text" class="mdc-text-field__input" name="guardian_attainment" value="" autocomplete="guardian_attainment" >
                                <option value="" disabled selected></option>
                                <option value="Elementary">Elementary</option>
                                <option value="High School">High School</option>
                                <option value="Vocational">Vocational</option>
                                <option value="College">College</option>
                                <option value="Post Graduate">Post Graduate</option>
                            </select>
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                          <span class="mdc-notched-outline">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch">
                              <span class="mdc-floating-label" id="my-label-id">Birthday</span>
                            </span>
                                <span class="mdc-notched-outline__trailing"></span>
                            </span>
                            <input id="guardian_birthday" type="date" class="mdc-text-field__input" name="guardian_birthday" value="" >
                        </label>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                          <span class="mdc-notched-outline">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch">
                              <span class="mdc-floating-label" id="my-label-id">Contact No.</span>
                            </span>
                                <span class="mdc-notched-outline__trailing"></span>
                            </span>
                            <input id="guardian_contact" type="text" class="mdc-text-field__input" name="guardian_contact" value="" >
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                          <span class="mdc-notched-outline">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch">
                              <span class="mdc-floating-label" id="my-label-id">Occupation</span>
                            </span>
                                <span class="mdc-notched-outline__trailing"></span>
                            </span>
                            <input id="guardian_occupation" type="text" class="mdc-text-field__input" name="guardian_occupation" value="" >
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                          <span class="mdc-notched-outline">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch">
                              <span class="mdc-floating-label" id="my-label-id">Monthly Income</span>
                            </span>
                                <span class="mdc-notched-outline__trailing"></span>
                            </span>
                            <input id="guardian_income" type="number" class="mdc-text-field__input" name="guardian_income" value="" >
                        </label>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                          <span class="mdc-notched-outline">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch">
                              <span class="mdc-floating-label" id="my-label-id">Company</span>
                            </span>
                                <span class="mdc-notched-outline__trailing"></span>
                            </span>
                            <input id="guardian_company" type="text" class="mdc-text-field__input" name="guardian_company" value="" >
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                          <span class="mdc-notched-outline">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch">
                              <span class="mdc-floating-label" id="my-label-id">Company Address</span>
                            </span>
                                <span class="mdc-notched-outline__trailing"></span>
                            </span>
                            <input id="guardian_company_add" type="text" class="mdc-text-field__input" name="guardian_company_add" value="" >
                        </label>
                    </div>
                    <div class="col-sm-4">
                        <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                          <span class="mdc-notched-outline">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__notch">
                              <span class="mdc-floating-label" id="my-label-id">Status</span>
                            </span>
                                <span class="mdc-notched-outline__trailing"></span>
                            </span>
                            <select id="guardian_status" type="text" class="mdc-text-field__input" name="guardian_status" value="" autocomplete="father_status">
                                <option value="" disabled selected></option>
                                <option value="Employed">Employed</option>
                                <option value="Unemployed">Unemployed</option>
                                <option value="OFW">OFW</option>
                                <option value="Separated">Separated</option>
                                <option value="Deceased">Deceased</option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>    
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Are your parents registered voters of Cabuyao City? </span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <select id="is_parents_voters" type="text" class="mdc-text-field__input" name="is_parents_voters" value="" required="" >
                            <option value="" disabled selected></option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Number of children in the family</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input id="num_of_children" type="number" class="mdc-text-field__input" name="num_of_children" value="" required=""  onchange="birthOrder();">
                    </label>
                </div>
                <div class="col-sm-4">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Birth Order</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <select id="birth_order" type="text" class="mdc-text-field__input" name="birth_order" value="" required="" autocomplete="birth_order" >
                            <option value="" disabled selected></option>
                            <option value="1">Eldest</option>
                            <option value="2">Middle</option>
                            <option value="3">Youngest</option>
                        </select>
                    </label>
                </div>
            </div>
        </div>


        <div class="mdc-card m-4 p-4">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="mdc-typography--headline6" style="color:#3b9140; font-weight:bold;">Course</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">First Choice</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input type="hidden" name="first_choice_text" id="first_choice_text">
                        <select id="first_choice" type="text" class="mdc-text-field__input" name="first_choice" value="" required="" >
                            <option value="" disabled selected></option>
                            <option value="STEM-ENGINEERING">(STEM-ENGINEERING) - Science, Technology, Engineering, and Mathematics</option>
                            <option value="STEM-COMPUTING">(STEM-COMPUTING) - Science, Technology, Engineering, and Mathematics</option>
                            <option value="HUMSS">(HUMSS) - Humanities and Social Science</option>
                            <option value="ABM">(ABM) - Accountancy, Business and Management</option>
                            <option value="TVL">(TVL) - Technical-Vocational Livelihood</option>
                        </select>
                    </label>
                </div>
                <div class="col-sm-6">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Second Choice</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <input type="hidden" name="second_choice_text" id="second_choice_text">
                        <select id="second_choice" type="text" class="mdc-text-field__input" name="second_choice" value="" required="" >
                            <option value="" disabled selected></option>
                            <option value="STEM-ENGINEERING">(STEM-ENGINEERING) - Science, Technology, Engineering, and Mathematics</option>
                            <option value="STEM-COMPUTING">(STEM-COMPUTING) - Science, Technology, Engineering, and Mathematics</option>
                            <option value="HUMSS">(HUMSS) - Humanities and Social Science</option>
                            <option value="ABM">(ABM) - Accountancy, Business and Management</option>
                            <option value="TVL">(TVL) - Technical-Vocational Livelihood</option>n>
                        </select>
                    </label>
                </div>
                
                <div class="col-sm-6 mt-3">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Whose choice is your First Choice of course?</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <select id="whose_first_choice" type="text" class="mdc-text-field__input" name="whose_first_choice" value="" required="" >
                            <option value="" disabled selected></option>
                            <option value="1">My own choice</option>
                            <option value="2">My parent's choice</option>
                            <option value="3">My relative's choice</option>
                            <option value="4">No one in particular</option>
                        </select>
                    </label>
                </div>
                
                <div class="col-sm-6 mt-3">
                    <label class="mdc-text-field mdc-text-field--outlined d-block" data-mdc-auto-init="MDCTextField">
                      <span class="mdc-notched-outline">
                        <span class="mdc-notched-outline__leading"></span>
                        <span class="mdc-notched-outline__notch">
                          <span class="mdc-floating-label" id="my-label-id">Whose choice is your Second Choice of course?</span>
                        </span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                        <select id="whose_second_choice" type="text" class="mdc-text-field__input" name="whose_second_choice" value="" required="">
                            <option value="" disabled selected></option>
                            <option value="1">My own choice</option>
                            <option value="2">My parent's choice</option>
                            <option value="3">My relative's choice</option>
                            <option value="4">No one in particular</option>
                        </select>
                    </label>
                </div>
            </div>
        </div>

        <div class="mdc-card m-4 p-4">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="mdc-typography--headline6" style="color:#3b9140; font-weight:bold;">User Agreement</h1>
                </div>
            </div>

            <div class="mdc-form-field">
                <div class="mdc-checkbox">
                    <input type="checkbox"
                           class="mdc-checkbox__native-control"
                           value="option1"
                           id="user_agree"
                           required/>

                    <div class="mdc-checkbox__background">
                        <svg class="mdc-checkbox__checkmark"
                             viewBox="0 0 24 24">
                            <path class="mdc-checkbox__checkmark-path"
                                  fill="none"
                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                        </svg>
                        <div class="mdc-checkbox__mixedmark"></div>
                    </div>
                    <div class="mdc-checkbox__ripple"></div>
                </div>
                <label for="checkbox-1" class="mdc-typography--body1">This is to certify that all information that I have provided herein are true and correct and I am giving the Institute the consent to use my provided information.</label>
            </div>

            <div class="row p-4 align-content-end">
                <button class="mdc-button mdc-button--raised mt-3" type="submit">
                    <span class="mdc-button__label text-white">SUBMIT APPLICATION</span>
                </button>
            </div>

        </div>
    </div>
</form>
</body>
<script>
    mdc.autoInit();

    $(document).ready(function (){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#guardian_layout').hide();
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#image').change(function () {
        readURL(this);
    });

    $('#second_choice').change(function (){
        $('#second_choice_text').val($('#second_choice option:selected').text())
    });

    $('#first_choice').change(function (){
        $('#first_choice_text').val($('#first_choice option:selected').text())
    });

    $('#formAdmission').on('submit', function (event) {
        event.preventDefault();
        const dialogEle = document.getElementById('dialog-loading');
        const dialog = new mdc.dialog.MDCDialog(dialogEle);

        if ($('#formAdmission')[0].checkValidity()) {
            $.ajax({
                url: "{{ url('submit-admission') }}",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    dialog.escapeKeyAction = "";
                    dialog.scrimClickAction = "";
                    dialog.open();
                },
                complete: function () {

                },  
                success: function (data) {
                    console.log(data);
                    if (data.message === 'success') {
                        location.href = '{{url('reference')}}/'+ data.ref
                    }
                },
                error : function (jqXHR, exception)
                {
                    console.log(jqXHR.responseText)
                    let message = JSON.parse(jqXHR.responseText);
                    if(jqXHR.status === 400)
                    {
                        $.each(message.errors,function(index,item){
                            alert(item[0]);
                            // dialog.close();
                        });
                    }
                }
            })
        }
    });

    function birthOrder() {
        var numOfChildren = $('#num_of_children');
        var selectOrder = $('#birth_order');
        selectOrder.empty();

        if (numOfChildren.val() > 1) {
            for (var i = 0, l = numOfChildren.val(); i < l; i++) {
                var opt = document.createElement('option');
                opt.value = ordinal_suffix_of(i + 1);
                opt.innerHTML = ordinal_suffix_of(i + 1);
                selectOrder.append(opt);
            }
        } else {
            var opt = document.createElement('option');
            opt.value = ordinal_suffix_of('Only Child');
            opt.innerHTML = ordinal_suffix_of('Only Child');
            selectOrder.append(opt);
        }
    }

    function toggleGuardian() {
        var mother_status = $('#mother_status').val();
        var father_status = $('#father_status').val();
        var menu = $('#guardian_layout')

        var mother = false;
        var father = false;

        mother = isGuardianValid(mother_status);
        father = isGuardianValid(father_status);
        if (mother && father)
        {
            menu.show();
        }
        else {
            menu.hide();
        }
    }

    function isGuardianValid(text)
    {
        var isValid = false;
        if(text === 'Deceased' || text === 'Separated' || text === 'OFW')
        {
            isValid = true;
        }
        return isValid;
    }

    function ordinal_suffix_of(i) {
        var j = i % 10,
            k = i % 100;
        if (j == 1 && k != 11) {
            return i + "st";
        }
        if (j == 2 && k != 12) {
            return i + "nd";
        }
        if (j == 3 && k != 13) {
            return i + "rd";
        }
        return i + "th";
    }
</script>
</html>

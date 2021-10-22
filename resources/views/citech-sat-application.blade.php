@extends('layouts.pdf')

@section('content')
    <table style="width:100%;">
        <td style="width:80%">
            <div style="float:left; z-index: 100; width:80px; height: 90px;">
                <img src="{{URL::asset('images/citech.png')}}" height="100%" width="100%">
            </div>
            <br><center><label style="color:#3b9140;font-size: 14pt;"><strong>CABUYAO INSTITUTE OF TECHNOLOGY</strong></label></center>
            <center><label>SENIOR HIGH APPLICATION FORM</label></center>
            <center><label>REFERENCE NUMBER: <strong><span style="color:blue;font-size: 14pt;">{{ $ref }}</span></strong></label></center>
            <br><br>
            <div style="font-size:10pt;">
                <table class="table">
                    <tr>
                        <td colspan="6"><strong>NAME:</strong> <span class="underlined">{{ $information->lname }}, {{ $information->fname }} {{ $information->mname }}</span></td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td colspan="3"><strong>LRN:</strong> <span class="underlined">{{ $information->lrn }}</span></td>
                        <td colspan="3"><strong>WITH VOUCHER?</strong> <span class="underlined">{{ ($information->voucher == 1 ? "YES" : "NO") }}</span></td>
                    </tr>
                </table>
                <?php
                $date=date_create($information->date_of_birth);
                $date_of_birth = date_format($date,"F j, Y");
                ?>
                <table class="table">
                    <tr>
                        <td colspan="3"><strong>DATE OF BIRTH:</strong>  <span class="underlined">{{ strtoupper($date_of_birth) }}</span></td>
                        <td colspan="3"><strong>PLACE OF BIRTH:</strong>  <span class="underlined">{{ $information->place_of_birth }}</span></td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td colspan="6"><strong>PRESENT ADDRESS:</strong>  <span class="underlined">{{ $information->address }}</span></td>
                    </tr>
                </table>
                <table class="table">
                    <tr>
                        <td colspan="2"><strong>CITIZENSHIP:</strong>  <span class="underlined">{{ $information->citizenship }}</span></td>
                        <td colspan="2"><strong>RELIGION:</strong>  <span class="underlined">{{ $information->religion }}</span></td>
                        <td colspan="2"><strong>SEX:</strong>  <span class="underlined">{{ ($information->sex == 1 ? "MALE" : "FEMALE") }}</span></td>
                    </tr>
                </table>
            </div>
        </td>

        <td style="width:20%;">
            <center><label>CITECH-OL FORM-1</label></center>
            <div style="float:right;width:144px; height: 192px; border:2px solid black;">
                <img src="{{asset( $information->image_url )}}" height="100%" width="100%">
            </div>
        </td>
    </table><br><br>
    <div style="font-size:10pt;">
        <table class="table">
            <tr>
                <td colspan="2"><strong>ARE YOU A REGISTERED VOTER OF CABUYAO CITY?:</strong>  <span class="underlined">{{ ($information->is_voter == 1 ? "YES" : "NO") }}</span></td>
                <td colspan="2"><strong>WHERE?:</strong>  <span class="underlined">{{ $information->voting_address }}</span></td>
                <td colspan="2"><strong>SINCE?:</strong>  <span class="underlined">{{ $information->voter_since }}</span></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td colspan="3"><strong>MOBILE NO.:</strong>  <span class="underlined">{{ $information->mobile_no }}</span></td>
                <td colspan="3"><strong>TELEPHONE NO.:</strong>  <span class="underlined">{{ $information->tel_no }}</span></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td colspan="6"><strong>EMAIL ADDRESS:</strong>  <span class="underlined">{{ $information->email }}</span></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td colspan="6"><strong>LAST SCHOOL ATTENDED.:</strong>  <span class="underlined">{{ $information->last_school_attended }}</span></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td colspan="2"><strong>JUNIOR HIGH SCHOOL:</strong>  <span class="underlined">{{ $information->junior_high_school }}</span></td>
                <td colspan="2"><strong>YEAR GRADUATED:</strong>  <span class="underlined">{{ $information->jhs_year_graduated }}</span></td>
                <td colspan="2"><strong>HONORS RECEIVED:</strong>  <span class="underlined">{{ $information->jhs_honors }}</span></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td colspan="2"><strong>ELEMENTARY:</strong>  <span class="underlined">{{ $information->elementary_school }}</span></td>
                <td colspan="2"><strong>YEAR GRADUATED:</strong>  <span class="underlined">{{ $information->elem_year_graduated }}</span></td>
                <td colspan="2"><strong>HONORS RECEIVED:</strong>  <span class="underlined">{{ $information->elem_honors }}</span></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td colspan="2"><strong>CIVIL STATUS:</strong>  <span class="underlined">{{ $information->civil_stat }}</span></td>
                <td colspan="2"><strong>SPOUSE NAME:</strong>  <span class="underlined">{{ $information->spouse_name }}</span></td>
                <td colspan="2"><strong>SPOUSE LEGAL ADDRESS:</strong>  <span class="underlined">{{ $information->spouse_address }}</span></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td colspan="2"><strong>FATHER'S NAME:</strong>  <span class="underlined">{{ $information->fathers_name }}</span></td>
                <td colspan="2"><strong>HIGHEST EDUCATIONAL ATTAINMENT:</strong>  <span class="underlined">{{ $information->fathers_highest_education }}</span></td>
                <td colspan="2"><strong>AGE:</strong>  <span class="underlined">{{ $information->fathers_age }}</span></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td colspan="2"><strong>CONTACT #:</strong>  <span class="underlined">{{ $information->fathers_contact_no }}</span></td>
                <td colspan="2"><strong>OCCUPATION:</strong>  <span class="underlined">{{ $information->fathers_occupation }}</span></td>
                <td colspan="2"><strong>MONTHY INCOME:</strong>  <span class="underlined">{{ $information->fathers_monthly_income }}</span></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td colspan="2"><strong>COMPANY:</strong>  <span class="underlined">{{ $information->fathers_company }}</span></td>
                <td colspan="4"><strong>COMPANY ADDRESS:</strong>  <span class="underlined">{{ $information->fathers_company_address }}</span></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td colspan="2"><strong>MOTHER'S NAME:</strong>  <span class="underlined">{{ $information->mothers_name }}</span></td>
                <td colspan="2"><strong>HIGHEST EDUCATIONAL ATTAINMENT:</strong>  <span class="underlined">{{ $information->mothers_highest_education }}</span></td>
                <td colspan="2"><strong>AGE:</strong>  <span class="underlined">{{ $information->mothers_age }}</span></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td colspan="2"><strong>CONTACT #:</strong>  <span class="underlined">{{ $information->mothers_contact_no }}</span></td>
                <td colspan="2"><strong>OCCUPATION:</strong>  <span class="underlined">{{ $information->mothers_occupation }}</span></td>
                <td colspan="2"><strong>MONTHY INCOME:</strong>  <span class="underlined">{{ $information->mothers_monthly_income }}</span></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td colspan="2"><strong>COMPANY:</strong>  <span class="underlined">{{ $information->mothers_company }}</span></td>
                <td colspan="4"><strong>COMPANY ADDRESS:</strong>  <span class="underlined">{{ $information->mothers_company_address }}</span></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td colspan="2"><strong>ARE YOUR PARENTS REGISTERED VOTERS OF CABUYAO CITY?:</strong>  <span class="underlined">{{ ($information->is_parents_voters == 1 ? "YES" : "NO") }}</span></td>
                <td colspan="2"><strong>NUMBER OF CHILDREN IN THE FAMILY:</strong>  <span class="underlined">{{ $information->number_of_children_in_family }}</span></td>
                <td colspan="2"><strong>BIRTH ORDER:</strong>  <span class="underlined">{{ $information->birth_order }}</span></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <td colspan="3"><strong>FIRST CHOICE:</strong>  <span class="underlined">{{ $information->first_choice }}</span></td>
                <td colspan="3"><strong>SECOND CHOICE:</strong>  <span class="underlined">{{ $information->second_choice }}</span></td>
            </tr>
            <tr>
                <td colspan="3"><strong>(1ST) WHOSE CHOICE:</strong>  <span class="underlined">{{ config("whose." . $information->whose_first_choice)  }}</span></td>
                <td colspan="3"><strong>(2ND) WHOSE CHOICE:</strong>  <span class="underlined">{{ config("whose." . $information->whose_second_choice)  }}</span></td>
            </tr>
        </table>
    </div><br>
    <div style="font-size:10pt;">
        <table style="width:100%;">
            <td style="width:80%">
                 <table class="table">
                    <tr><th style="text-align: center;">CODE</th><th style="text-align: center;">STRAND</th></tr>
                    <tr><td  style="height:50px;text-align: center;">STEM-ENGINEERING</td><td>Science, Technology, Engineering, and Mathematics (Specialization: Engineering)</td></tr>
                    <tr><td  style="height:50px;text-align: center;">STEM-COMPUTING</td><td>Science, Technology, Engineering, and Mathematics (Specialization: CS/IT)</td></tr>
                    <tr><td  style="height:50px;text-align: center;">HUMSS</td><td>Humanities and Social Science</td></tr>
                    <tr><td  style="height:50px;text-align: center;">ABM</td><td>Accountancy, Business and Management</td></tr>
                    <tr><td  style="height:50px;text-align: center;">TVL</td><td>Technical-Vocational Livelihood</td></tr>
                </table>
            </td>
            <td style="width:20%">
                <table class="table table-bordered" style="margin-bottom: -1px; text-align: center;">
                    <tr><th style="height:30px;">EXAM</th></tr>
                    <tr><td style="height:50px;"></td></tr>
                    <tr><th style="height:30px;">G.A</th></tr>
                    <tr><td style="height:50px;"></td></tr>
                    <tr><th style="height:30px;">F.A.G</th></tr>
                    <tr><td style="height:50px;"></td></tr>
                </table>

            </td>
        </table>
    </div>
    <br>
    <i>I certify that the information I have given above and the credentials I have submitted are true, correct, and complete to the best of my knowledge.</i>
    <br>
    <br>
    <br>
    <br>
    <div class="pull-bottom"><strong>ATTESTED:</strong>
        <br>
        <br>
        <div class="pull-left">
            <span>________________________________________________________</span><br>
            <span>(SIGNATURE OF PARENT/GUARDIAN OVER PRINTED NAME)</span>
        </div>
        <div class="pull-right">
            <span>______________________________________</span><br>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(SIGNATURE OF APPLICANT)</span>
        </div>
        <br>
        <!--<label>Appointment Date: {{ base_path() }}<strong></strong></label>-->
    </div>

@endsection

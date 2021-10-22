<?php

namespace App\Http\Controllers;

use App\Jobs\EmailSendJob;
use App\Models\Admission;
use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AdmissionController extends Controller
{

    function index()
    {
        return view('instruction',["type" => "college"]);
    }

    function registration(){
        return view('welcome', ["type" => "College"]);
    }

    function reference($ref){
        $ref = Crypt::decrypt($ref);

        return view('reference',compact('ref'));
    }
    
    function getAge($dob){ 
        $birthdate = new \DateTime(date("Y-m-d",  strtotime(implode('-', array_reverse(explode('/', $dob))))));
        $today= new \DateTime();           
        $age = $birthdate->diff($today)->y;
    
        return $age;
    }


    function create(Request $request)
    {

        $input_data = $request->all();

        $validator = Validator::make(
            $input_data, [
            'image' => 'required|mimes:jpg,jpeg,png,bmp|max:1000',
        ],[
                'image.required' => 'Please upload an image',
                'image.mimes' => 'Only jpeg images are allowed',
                'image.max' => 'Sorry! Maximum allowed size for an image is 1mb',
            ]
        );

        if($validator->fails())
        {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ) , 400);
        }
        else{
            $ref_num = date("mdhis") . rand(0, 9);
            $images = $request->file('image');
            $image_name = $ref_num . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('students/'), $image_name);

            $isSuccess = DB::table('admissions')->insert(
                [
                    'year' => config("yearsem.YEAR") ?? '',
                    'sem' => config("yearsem.SEM") ?? '',
                    'lname' => $request['lastname'] ?? '',
                    'fname' => $request['firstname'] ?? '',
                    'mname' => $request['middlename'] ?? '',
                    'date_of_birth' => $request['date_of_birth'] ?? '',
                    'place_of_birth' => $request['place_of_birth'] ?? '',
                    'citizenship' => $request['citizenship'] ?? '',
                    'sex' => $request['sex'] ?? '',
                    'religion' => $request['religion'] ?? '',
                    'address' => $request['present_address'] ?? '',
                    'mobile_no' => $request['mobile_no'] ?? '',
                    'tel_no' => $request['telephone_no'] ?? '',
                    'email' => $request['email'] ?? '',
                    'last_school_attended' => $request['last_shs'] ?? '',
                    'shs_strand' => $request['shs_strand'] ?? '',
                    'junior_high_school' => $request['jhs'] ?? '',
                    'jhs_address' => $request['jhs_address'] ?? '',
                    'jhs_year_graduated' => $request['jhs_graduated'] ?? '',
                    'jhs_honors' => $request['jhs_honors'] ?? '',
                    'elementary_school' => $request['elem'] ?? '',
                    'elem_year_graduated' => $request['elem_graduated'] ?? '',
                    'elem_address' => $request['elem_address'] ?? '',
                    'elem_honors' => $request['elem_honors'] ?? '',
                    'is_voter' => $request['is_voter'] ?? '',
                    'voting_address' => $request['barangay'] ?? '',
                    'voter_since' => $request['voter_since'] ?? '',
                    'civil_stat' => $request['civil_status'] ?? '',
                    'spouse_name' => $request['spouse_name'] ?? '',
                    'spouse_address' => $request['spouse_residence'] ?? '',
                    'fathers_name' => $request['father_name'] ?? '',
                    'fathers_highest_education' => $request['father_attainment'] ?? '',
                    'fathers_birthday' => $request['father_birthday'] ?? '',
                    'fathers_age' => $this->getAge($request['father_birthday']) ?? '',
                    'fathers_occupation' => $request['father_occupation'] ?? '',
                    'fathers_company' => $request['father_company'] ?? '',
                    'fathers_company_address' => $request['father_company_add'] ?? '',
                    'fathers_monthly_income' => $request['father_income'] ?? '',
                    'fathers_contact_no' => $request['father_contact'] ?? '',
                    'fathers_status' => $request['father_status'] ?? '',
                    'mothers_name' => $request['mother_name'] ?? '',
                    'mothers_highest_education' => $request['mother_attainment'] ?? '',
                    'mothers_birthday' => $request['mother_birthday'] ?? '',
                    'mothers_age' => $this->getAge($request['mother_birthday']) ?? '',
                    'mothers_occupation' => $request['mother_occupation'] ?? '',
                    'mothers_company' => $request['mother_company'] ?? '',
                    'mothers_company_address' => $request['mother_company_add'] ?? '',
                    'mothers_monthly_income' => $request['mother_income'] ?? '',
                    'mothers_contact_no' => $request['mother_contact'] ?? '',
                    'mothers_status' => $request['mother_status'] ?? '',
                    'guardians_name' => $request['guardian_name'] ?? '',
                    'guardians_highest_education' => $request['guardian_attainment'] ?? '',
                    'guardians_age' => $request['guardian_age'] ?? '',
                    'guardians_occupation' => $request['guardian_occupation'] ?? '',
                    'guardians_company' => $request['guardian_company'] ?? '',
                    'guardians_company_address' => $request['guardian_company_add'] ?? '',
                    'guardians_monthly_income' => $request['guardian_income'] ?? '',
                    'guardians_contact_no' => $request['guardian_contact'] ?? '',
                    'is_parents_voters' => $request['is_parents_voters'] ?? '',
                    'number_of_children_in_family' => $request['num_of_children'] ?? '',
                    'birth_order' => $request['birth_order'] ?? '',
                    'first_choice_text' => $request['first_choice_text'] ?? '',
                    'second_choice_text' => $request['second_choice_text'] ?? '',
                    'first_choice' => $request['first_choice'] ?? '',
                    'second_choice' => $request['second_choice'] ?? '',
                    'whose_first_choice' => $request['whose_first_choice'] ?? '',
                    'whose_second_choice' => $request['whose_second_choice'] ?? '',
                    'image_url' => 'students/' . $image_name,
                    'ref_number' => $ref_num,
                    'type' => $request['admissiontype'],
                    'lrn' => $request['lrn'] ?? '',
                    'voucher' => $request['voucher'] ?? '',
                    'voucher_no' => $request['voucher_no'] ?? '',
                    'school_type' => $request['school_type'] ?? '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );

            if( $isSuccess)
            {
                $data = DB::table('admissions')->where('ref_number','=',$ref_num)->first();
                // $this->dispatch(new EmailSendJob($data));
                return response()->json(['message' => 'success',"ref" => Crypt::encrypt($ref_num)]);
            } else {
                return response()->json(['message' => 'error']);
            }
//
//
//            return view('reference',["ref" => $ref_num]);
        }

//        try{
//            $this->validate($request,[
//                'image' => 'required|mimes:jpeg,png|max:20000'
//            ]);
//
//            $imagePath = $request['image']->store('uploads', 'public');
//
//            $ref_num = date("mdhis") . rand(0, 9);
//            DB::table('admissions')->insert(
//                [
//                    'year' => config("yearsem.YEAR") ?? '',
//                    'sem' => config("yearsem.SEM") ?? '',
//                    'lname' => $request['lastname'] ?? '',
//                    'fname' => $request['firstname'] ?? '',
//                    'mname' => $request['middlename'] ?? '',
//                    'date_of_birth' => $request['date_of_birth'] ?? '',
//                    'place_of_birth' => $request['place_of_birth'] ?? '',
//                    'citizenship' => $request['citizenship'] ?? '',
//                    'sex' => $request['sex'] ?? '',
//                    'religion' => $request['religion'] ?? '',
//                    'address' => $request['present_address'] ?? '',
//                    'mobile_no' => $request['mobile_no'] ?? '',
//                    'tel_no' => $request['telephone_no'] ?? '',
//                    'email' => $request['email'] ?? '',
//                    'last_school_attended' => $request['last_shs'] ?? '',
//                    'shs_strand' => $request['shs_strand'] ?? '',
//                    'junior_high_school' => $request['jhs'] ?? '',
//                    'jhs_address' => $request['jhs_address'] ?? '',
//                    'jhs_year_graduated' => $request['jhs_graduated'] ?? '',
//                    'jhs_honors' => $request['jhs_honors'] ?? '',
//                    'elementary_school' => $request['elem'] ?? '',
//                    'elem_year_graduated' => $request['elem_graduated'] ?? '',
//                    'elem_address' => $request['elem_address'] ?? '',
//                    'elem_honors' => $request['elem_honors'] ?? '',
//                    'is_voter' => $request['is_voter'] ?? '',
//                    'voting_address' => $request['barangay'] ?? '',
//                    'voter_since' => $request['voter_since'] ?? '',
//                    'civil_stat' => $request['civil_status'] ?? '',
//                    'spouse_name' => $request['spouse_name'] ?? '',
//                    'spouse_address' => $request['spouse_residence'] ?? '',
//                    'fathers_name' => $request['father_name'] ?? '',
//                    'fathers_highest_education' => $request['father_attainment'] ?? '',
//                    'fathers_age' => $request['father_age'] ?? '',
//                    'fathers_occupation' => $request['father_occupation'] ?? '',
//                    'fathers_company' => $request[''] ?? '',
//                    'fathers_company_address' => $request['father_company_add'] ?? '',
//                    'fathers_monthly_income' => $request['father_income'] ?? '',
//                    'fathers_contact_no' => $request['father_contact'] ?? '',
//                    'fathers_status' => $request['father_status'] ?? '',
//                    'mothers_name' => $request['mother_name'] ?? '',
//                    'mothers_highest_education' => $request['mother_attainment'] ?? '',
//                    'mothers_age' => $request['mother_age'] ?? '',
//                    'mothers_occupation' => $request['mother_occupation'] ?? '',
//                    'mothers_company' => $request['mother_company'] ?? '',
//                    'mothers_company_address' => $request['mother_company_add'] ?? '',
//                    'mothers_monthly_income' => $request['mother_income'] ?? '',
//                    'mothers_contact_no' => $request['mother_contact'] ?? '',
//                    'mothers_status' => $request['mother_status'] ?? '',
//                    'guardians_name' => $request['guardian_name'] ?? '',
//                    'guardians_highest_education' => $request['guardian_attainment'] ?? '',
//                    'guardians_age' => $request['guardian_age'] ?? '',
//                    'guardians_occupation' => $request['guardian_occupation'] ?? '',
//                    'guardians_company' => $request['guardian_company'] ?? '',
//                    'guardians_company_address' => $request['guardian_company_add'] ?? '',
//                    'guardians_monthly_income' => $request['guardian_income'] ?? '',
//                    'guardians_contact_no' => $request['guardian_contact'] ?? '',
//                    'is_parents_voters' => $request['is_parents_voters'] ?? '',
//                    'number_of_children_in_family' => $request['num_of_children'] ?? '',
//                    'birth_order' => $request['birth_order'] ?? '',
//                    'first_choice_text' => $request['first_choice_text'] ?? '',
//                    'second_choice_text' => $request['second_choice_text'] ?? '',
//                    'first_choice' => $request['first_choice'] ?? '',
//                    'second_choice' => $request['second_choice'] ?? '',
//                    'image_url' => $imagePath,
//                    'ref_number' => $ref_num,
//                    'type' => $request['admissiontype']
//                ]
//            );
//
//            return view('reference',["ref" => $ref_num]);
//        }catch(Exception $e){
//            return 'Error while processing Application. Please try again';
//        }
    }

    function print_form($ref){
        ini_set('max_execution_time', 0);

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('tempDir',public_path());

        $dompdf = new Dompdf($options);
        $information = Admission::find($ref);

        $viewhtml = View::make('citech-sat-application',compact('ref','information'));
        $dompdf->loadHtml($viewhtml);
        $dompdf->setPaper("8.5x14", "portrait");
        $dompdf->render();
        $dompdf->stream($ref.'.pdf',array("Attachment" => false));
    }


    function download_form($ref){
        ini_set('max_execution_time', 0);

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('tempDir',public_path());

        $dompdf = new Dompdf($options);
        $information = Admission::find($ref);
//
//        dd($information);

        $viewhtml = View::make('citech-sat-application',compact('ref','information'));
        $dompdf->loadHtml($viewhtml);
        $dompdf->setPaper("8.5x14", "portrait");
        $dompdf->render();
        $dompdf->stream($ref.'.pdf',array("Attachment" => true));
    }

    function endapp(){
        return view('end_application');
    }

}

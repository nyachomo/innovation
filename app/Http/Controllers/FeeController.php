<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\Setting;
use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf; // Import the Dompdf class
use Illuminate\Support\Facades\View;

class FeeController extends Controller
{
    //
    public function showFees(Request $request){
        $user_id = $request->query('user_id'); // Get the exam ID from query parameters
        $user=User::with('course')->find($user_id);
        $fees=Fee::where('user_id',$user_id)->get();
        $debit=$user->course->course_price;
        $credit=Fee::where('user_id',$user_id)->sum('amount_paid');
        $balance=$debit-$credit;
        return view('fees.showFees',compact('fees','user_id','user','debit','credit','balance'));
        
    }

    public function addFees(Request $request){
        $add=Fee::create($request->all());
        if($add){
            return redirect()->back()->with('success','Data saved succesfully');
            }else{
                return redirect()->back()->with('Failed','Could not  saved');
            }
    }

    public function updateFees(Request $request){
        
        $fee=Fee::find($request->id);
        $update=$fee->update($request->all());
        if($update){
            return redirect()->back()->with('success','Data updated succesfully');
            }else{
                return redirect()->back()->with('Failed','Could not  update');
            }
    }

    
    public function deleteFees(Request $request){
        
        $fee=Fee::find($request->id);
        $delete=$fee->delete();
        if($delete){
            return redirect()->back()->with('success','Data deleted succesfully');
            }else{
                return redirect()->back()->with('Failed','Could not  delete');
            }
    }

    public function downloadReceipt($id){
        //GET NAME OF THE PERSON THAT LOGINS 
        if(Auth::check()){
            if(Auth::user()->role=="Trainee"){

                //AMOUNT PAID
                $payment=Fee::where('id',$id)->first();
                $user_id=Auth::user()->id;
                $debit=Auth::user()->course->course_price?? 0;
                $credit=Fee::where('user_id',$user_id)->sum('amount_paid');
                $balance=$debit-$credit;

                $user=User::with('course','clas')->where('id',Auth::user()->id)->first();
                $setting=Setting::latest()->first();
                $imagePath = public_path('images/logo/' . $setting->company_logo);
                $imageData = base64_encode(file_get_contents($imagePath));
                $imageSrc = 'data:image/jpeg;base64,' . $imageData;

                $imagePath2 = public_path('images/receipt/receipt.jpeg');
                $imageData2 = base64_encode(file_get_contents($imagePath2));
                $imageSrc2 = 'data:image/jpeg;base64,' . $imageData2;

                // Fetch all records from the `fees` table
                $fees = Fee::where('user_id', Auth::user()->id)
                ->select('user_id', 'amount_paid', 'date_paid', 'payment_method', 'payment_ref_no')
                ->orderBy('created_at', 'asc') // Orders by oldest first
                ->get();

                // Load the view and pass the data
                $html = View::make('fees.studentReceipt', compact('imageSrc', 'fees','user','imageSrc2','balance','payment'))->render();
                //$html = View::make('fees.studentReceipt', compact(['imageSrc' => $imageSrc,'fees'=> $fees]))->render();

                // Convert the view to a PDF
                $dompdf = new \Dompdf\Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();

                // Stream or download the PDF
                return response($dompdf->output(), 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="Receipt.pdf"',
                ]);




            }
        }
 
    }




    public function admindownloadReceipt2($id){
        //GET NAME OF THE PERSON THAT LOGINS 
        if(Auth::check()){
            if(Auth::user()->role=="Admin"){

                //AMOUNT PAID
                
                $payment=Fee::with('user')->where('id',$id)->first();
                $user_id=$payment->user->id;
                $user=User::with('course','clas')->where('id',$user_id)->first();
                $credit=Fee::where('user_id',$user_id)->sum('amount_paid');
            
                $debit=$user->course->course_price?? 0;
                $balance=$debit-$credit;

                $setting=Setting::latest()->first();
                $imagePath = public_path('images/logo/' . $setting->company_logo);
                $imageData = base64_encode(file_get_contents($imagePath));
                $imageSrc = 'data:image/jpeg;base64,' . $imageData;

                $imagePath2 = public_path('images/receipt/receipt.jpeg');
                $imageData2 = base64_encode(file_get_contents($imagePath2));
                $imageSrc2 = 'data:image/jpeg;base64,' . $imageData2;

                // Fetch all records from the `fees` table
                $fees = Fee::where('user_id', $user_id)
                ->select('user_id', 'amount_paid', 'date_paid', 'payment_method', 'payment_ref_no')
                ->orderBy('created_at', 'asc') // Orders by oldest first
                ->get();

                // Load the view and pass the data
                $html = View::make('fees.adminDownloadStudentFeeReceipt', compact('imageSrc', 'fees','user','imageSrc2','balance','payment'))->render();
                //$html = View::make('fees.studentReceipt', compact(['imageSrc' => $imageSrc,'fees'=> $fees]))->render();

                // Convert the view to a PDF
                $dompdf = new \Dompdf\Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();

                // Stream or download the PDF
                return response($dompdf->output(), 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="Fee.pdf"',
                ]);




            }
        }
 
    }



    public function admindownloadReceipt($id){
        //GET NAME OF THE PERSON THAT LOGINS 
        if(Auth::check()){
            if(Auth::user()->role=="Admin"){
    
                //AMOUNT PAID
                $payment = Fee::with('user')->where('id', $id)->first();
                $user_id = $payment->user->id;
                $user = User::with('course', 'clas')->where('id', $user_id)->first();
                $credit = Fee::where('user_id', $user_id)->sum('amount_paid');
            
                $debit = $user->course->course_price ?? 0;
                $balance = $debit - $credit;
    
                $setting = Setting::latest()->first();
                $imagePath = public_path('images/logo/' . $setting->company_logo);
                $imageData = base64_encode(file_get_contents($imagePath));
                $imageSrc = 'data:image/jpeg;base64,' . $imageData;
    
                $imagePath2 = public_path('images/receipt/receipt.jpeg');
                $imageData2 = base64_encode(file_get_contents($imagePath2));
                $imageSrc2 = 'data:image/jpeg;base64,' . $imageData2;
    
                // Fetch all records from the `fees` table
                $fees = Fee::where('user_id', $user_id)
                    ->select('user_id', 'amount_paid', 'date_paid', 'payment_method', 'payment_ref_no')
                    ->orderBy('created_at', 'asc') // Orders by oldest first
                    ->get();
    
                // Load the view and pass the data
                $html = View::make('fees.adminDownloadStudentFeeReceipt', compact('imageSrc', 'fees', 'user', 'imageSrc2', 'balance', 'payment'))->render();
    
                // Convert the view to a PDF
                $dompdf = new \Dompdf\Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
    
                // Ensure the filename contains the student's name
                $fileName = str_replace(' ', '_', $user->firstname) . '_FeeReceipt.pdf';
    
                // Stream or download the PDF
                return response($dompdf->output(), 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
                ]);
            }
        }
    }

    




    public function traineePrintingReceiptForRegistration(){
                //GET NAME OF THE PERSON THAT LOGINS 
        if(Auth::check()){
            if(Auth::user()->role=="Trainee"){


                $user=User::with('course','clas')->where('id',Auth::user()->id)->first();
                $setting=Setting::latest()->first();
                $imagePath = public_path('images/logo/' . $setting->company_logo);
                $imageData = base64_encode(file_get_contents($imagePath));
                $imageSrc = 'data:image/jpeg;base64,' . $imageData;


                $imagePath2 = public_path('images/receipt/receipt.jpeg');
                $imageData2 = base64_encode(file_get_contents($imagePath2));
                $imageSrc2 = 'data:image/jpeg;base64,' . $imageData2;


                // Fetch all records from the `fees` table
                $fees = Fee::where('user_id', Auth::user()->id)
                ->select('user_id', 'amount_paid', 'date_paid', 'payment_method', 'payment_ref_no')
                ->orderBy('created_at', 'asc') // Orders by oldest first
                ->get();

                // Load the view and pass the data
                $html = View::make('fees.traineePrintingReceiptForRegistration', compact('imageSrc', 'fees','user','imageSrc2'))->render();
                //$html = View::make('fees.studentReceipt', compact(['imageSrc' => $imageSrc,'fees'=> $fees]))->render();

                // Convert the view to a PDF
                $dompdf = new \Dompdf\Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();

                // Stream or download the PDF
                return response($dompdf->output(), 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="Receipt.pdf"',
                ]);




            }
        }




    }


}

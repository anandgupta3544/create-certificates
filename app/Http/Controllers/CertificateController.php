<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use Exception;
use Illuminate\Support\Facades\Mail;
use PDF;
use App\Mail\CertificateEmail;

class CertificateController extends Controller
{
    public function handle()
    {
        try {
            $certificates = Certificate::with(['user'])->get();

            foreach ($certificates as $certificate) {
                $emailTemplateData = [
                    'userFullName' => $certificate->user->full_name,
                    'orgName' => $certificate->organizer_name,
                    'certificateNumber' => $certificate->certificate_number,
                    'websiteUrl' => $certificate->website_url,
                    'orgSignature' => 'Ogranization Signature',
                    'address' => 'Ogranization address',
                ];
                $emailTemplate = view('emailTemplate', $emailTemplateData)->render();

                $certificateTemplateData = [
                    'userFullName' => $certificate->user->full_name,
                    'headName' => $certificate->head_name,
                    'mentorName' => $certificate->mentor_name,
                ];

                $pdf = PDF::loadView('certificateTemplate', $certificateTemplateData);

                $pfdUrl = storage_path("app/public/certificates/{$certificate->certificate_number}.pdf");

                if (!file_exists($pfdUrl)) {
                    $pdf->save(storage_path("app/public/certificates/{$certificate->certificate_number}.pdf"));
                }

                Mail::to($certificate->user->email)->send(new CertificateEmail($pfdUrl, $emailTemplate));
            }
            return redirect()->route('home')->with('success', 'Certificates sent successfully!');
        } catch (Exception $e) {
            return redirect()->route('home')->with('error', 'Something went wrong!');
        }
    }
}

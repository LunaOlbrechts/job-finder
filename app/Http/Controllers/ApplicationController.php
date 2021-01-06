<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationFase;
use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Student;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function showListOfAllApplications($companyId)
    {
        $applications = Application::select('applications.*')
            ->join('internships', 'internships.id', '=', 'applications.internship_id')
            ->with(['internship', 'student', 'applicationFase'])
            ->where('internships.company_id', $companyId)
            ->get();

        return view('companies/filter')->withApplications( $applications);
    }

    public function filterApplications(Request $request, $companyId)
    {
        $application = Application::get()->where('id', auth()->id());

        if ($request->label) {
            $application->whereHas('label', function ($q) use ($request) {
                $q->where('label', $request->label);
            });
        }

        if ($request->keyword) {
            $application->whereHas('internship', 'LIKE', '%' . $request->keyword . '%');
        }

        //return view('companies/filter')->withApplications($data);
    }

    public function editApplicationFase(Request $request, $applicationId)
    {

        // if application is declined then update label as declined
        if (isset($_POST['decline'])) {
            Application::where('id', $applicationId)
                        ->update(['label' => 'declined']);

            return redirect()->back();
        } elseif (isset($_POST['approve'])) {
            $applicationFases = Application::with('applicationFase')
                                ->where('id', $applicationId)->first();

            /* if application fase = second review then update label approved
            * because there is no higher fase
            */
            if ($applicationFases->applicationFase->title == "second interview") {
                Application::where('id', $applicationId)
                    ->update(['label' => 'approved']);

                return redirect()->back();
            }

            /* if application fase = asignment then
            *  update fase to second interview (fase_id 3)
            */
            if ($applicationFases->applicationFase->title == "asignment") {
                Application::where('id', $applicationId)
                            ->update(['fase_id' => '3', 'label' => 'approved']);

                return redirect()->back();
            }

            /* if application fase = first interview then
            *  update fase to asignment (fase_id 2)
            */
            if ($applicationFases->applicationFase->title == "first interview") {
                Application::where('id', $applicationId)
                            ->update(['fase_id' => '2', 'label' => 'approved']);

                return redirect()->back();
            }

            return redirect()->back();
        }

        return redirect()->back();
    }
}

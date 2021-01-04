<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Application;
use Illuminate\Support\Facades\Http;
use Goutte\Client;

class StudentController extends Controller
{
    public function getAllStudents()
    {
        $data['student'] = Student::all();
        return view('students/index', $data);
    }

    public function apiGetAllDribbbleShots($studentId)
    {
        $student= Student::where('id', $studentId)->first();

        //nieuwe Goutte crawler starten
        $client = new Client();
        //Ingevulde dribbble username ophalen uit DB + dribbble url ophalen
        $dribbbleUser = $student->dribbble;
        $dribbbleUrl = "https://dribbble.com/" . $dribbbleUser;
        $crawler = $client->request('GET', $dribbbleUrl);
        //Images ophalen
        $getAllShotImages = $crawler->filter('.shot-thumbnail-placeholder > noscript > img')->each(function ($node) {
            $dribbbleImage = $node->getNode(0)->getAttribute('src');
            return $dribbbleImage;
        });
        //Titles ophalen
        $getAllShotTitles = $crawler->filter('.shot-title')->each(function ($node) {
            $dribbbleTitle = $node->text();
            return $dribbbleTitle;
        });
        //Links ophalen
        $getAllShotLinks = $crawler->filter('.shot-thumbnail-link')->each(function ($node) {
            $dribbbleLink = $node->getNode(0)->getAttribute('href');
            return $dribbbleLink;
        });
                
        //Van al deze arrays de eerste 8 nemen
        $images = array_slice($getAllShotImages, 0, 8);
        $titles = array_slice($getAllShotTitles, 0, 8);
        $links = array_slice($getAllShotLinks, 0, 8);
        //Deze arrays allemaal in een omringende array zetten voor makkelijk gebruik in de view
        for ($i=0; $i < count($images); $i++) {
            $dribbbleShots[$i] = array(
                "image" => $images[$i],
                "title" => $titles[$i],
                "link" => $links[$i]
            );
        }
        return $dribbbleShots;
    }

    public function showStudentProfile($studentId)
    {
        //alle data van studenten en internships ophalen
        $student= Student::where('id', $studentId)->first();
        $application = Application::where('student_id', $studentId)->with(['student', 'applicationFase'])->get();
        
        return view('students/profile')->withApplications($application)->withStudent($student);
    }

    public function showAllInfoForUpdateProfile(Student $student)
    {
        $data['student'] = $student;
        return view('students/update', $data);
    }

    public function updateStudentProfile(Request $request, $studentId)
    {
        //Alle huidige informatie van de huidige student ophalen
        $user = Student::where('id', $studentId)->first();
        //Als er geen user gevonden wordt met de id: terugsturen
        if (!$user) {
            return redirect()->back();
        }
        //Alle data van de huidige user valideren
        if ($user) {
            $request->validate([
                'name' => 'required|min:2',
                'email' => 'required|email',
                'age' => 'required|min:2',
                'bio' => 'nullable',
                'preference' => 'nullable',
                'tools' => 'nullable',
                //'cv' => 'nullable|file',
                'portfolio' => 'nullable|url',
                'location' => 'nullable',
                'linkedin' => 'nullable|url'
            ]);

            //location optimizer
            $request->flash();
            $adress = $request['location'];
            $url = "https://autocomplete.geocoder.ls.hereapi.com/6.2/suggest.json?apiKey=luU8UTYMpklXDLiQjJLL6bABVPbs8dEJGnRfevERRxg&query=$adress";
            $response = Http::get($url)->json();
            //locatie niet gevonden
            if ($response == 'Unauthorized') {
                $myresponse = $request['location'];
            } elseif ($response == null) {
                $myresponse = "";

            //locatie wel gevonden -> verder aanvullen
            } elseif ($response['suggestions'] == null) {
                $myresponse = $request['location'];
            } else {
                $myresponse = $response['suggestions'][0]['label'];
            }

            //Alles toevoegen aan db
            Student::where('id', $studentId)->update($request->except('_token', 'location', 'submit'));
            Student::where('id', $studentId)->update(['location' => $myresponse]);
            //success boodschap printen
            $request->session()->flash('success', 'Your details have now been updated.');
            return redirect()->back();
        }
    }
}

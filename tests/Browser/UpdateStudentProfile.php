<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Student;

class UpdateStudentProfile extends DuskTestCase
{
 
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function updateStudentPofile()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(Student::find(6))
                ->visit('/students/6/update')
                //->assertAuthenticated()
                //->screenshot('logedin')
                ->assertSee('Update')
                ->assertSelectHasOption('preference', 'Design')
                ->type('age', '21')
                ->type('dribbble', 'janlosert')
                ->type('bio', 'Just getting by again')
                //Random dropdown value selecteren
                ->select('preference')
                ->type('portfolio', 'https://binara.be')
                ->type('location', 'Minderhout')
                ->screenshot('updateProfileBefore')
                ->assertButtonEnabled('submit')
                ->click('#app .py-4 .container .row .col-md-8 .card .card-body form .form-group div > button')
                ->assertPathIs('/students/6/update')
                ->screenshot('updateProfileSubmit');
            });

           
    }
}

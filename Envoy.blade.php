@servers(['web' => 'deploybot@139.162.146.220'])

@story('deploy')
    git
    composer
@endstory

@task('git')
    cd /home/deploybot/job-finder
    git pull origin master
@endtask

@task('composer')
    composer install
@endtask

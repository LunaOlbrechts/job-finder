@servers(['web' => 'deploybot@139.162.146.220'])

@task('deploy')
    cd /home/deploybot/job-finder
    git pull 
@endtask

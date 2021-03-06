<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'Ridge');

// Project repository
set('repository', 'git@github.com:randriamazaoro/ridge.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('178.62.107.10')
    ->user('deployer')
    ->multiplexing(false)
    ->identityFile('~/.ssh/deployerkeyv2')
    ->set('deploy_path', '/var/www/html/ridge');  
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate:fresh');


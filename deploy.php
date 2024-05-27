<?php
namespace Deployer;

require 'recipe/symfony.php';

// Config

set('repository', 'git@github.com:pabloferreiradias/pokemon-tcg.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('ubuntu@ec2-3-143-220-117.us-east-2.compute.amazonaws.com')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/app');

// Hooks

after('deploy:failed', 'deploy:unlock');

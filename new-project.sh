#!/bin/bash

# Create laravel project
docker compose run --rm composer create-project laravel/laravel laravel

# Move to root folder
shopt -s dotglob
mv laravel/* ./   # your current approach

# Delete folder and sh file.
rmdir laravel

# Create messages success/fail
if test -d laravel; 
  then
    echo "There error"
  else
    echo "New project initiated!"
    
    # Self destruct
    rm -r new-project.sh
fi
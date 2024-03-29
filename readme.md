# The-Mentcare-System
A patient information system to support mental healthcare for the purpose of CP3407 - Advanced Software Engineering, James Cook University.

### Team Members
- [Daniel Archer](https://github.com/danarcher96)
- [Isabelle Carlsson](https://github.com/IsabelleCarlsson)
- [Thoman Leumann](https://github.com/tomaslemon)
- [Craig Morris](https://github.com/CraigMorris1986)
- [Matthew Spina](https://github.com/matthewspina)

### Framework
- [Laravel](https://laravel.com)

## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- That's it: launch the main URL. 
- You can login to adminpanel with default credentials __admin@admin.com__ - __password__

## Environment Setup using Vagrant

- Download and install [VirtualBox](https://www.virtualbox.org/)
- Download and install [Vagrant](https://www.vagrantup.com/)
- Add the homstead vagrant files using `git clone https://github.com/laravel/homestead.git`.
- Run `init.bat` in the homestead directory.

### In homstead.yml:
- Remove authentication and ssh otherwise generate a ssh key and point to the file.
- Create a folder where you would like your synced filed and point to it. 

##### homstead.yml example

```
ip: "192.168.10.10"
memory: 2048
cpus: 2
provider: virtualbox

folders:
    - map: C:\Users\YourUser\Documents\Web-Projects\
      to: /home/vagrant/code/

sites:
    - map: mentcare.test
      to: /home/vagrant/code/mentcare/public
```

- Run `vagrant up` in the homestead folder.
- Clone the repository to your synced folder (for example "C:\Users\YourUser\Documents\Web-Projects\Mentcare") using `git clone https://github.com/IsabelleCarlsson/The-Mentcare-System.git .`.
- SSH into your machine using `vagrant ssh` .
- Create a database using `mysql -u root -p`; enter `secret` and `create database mentcare;` .
- Make sure the .env file in your mentcare directory points to your database.

##### .env example
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mentcare
DB_USERNAME=root
DB_PASSWORD=secret
```

- Optionally add mentcare.test to your hosts files, otherwise access the website at [192.168.10.10](http://192.168.10.10)


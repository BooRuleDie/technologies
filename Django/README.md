
# Commands

## Setting Up Virtual Environment
```powershell
python -m venv venv
```

## Activate the Virtual Environment
```powershell
.\venv\scripts\Activate.ps1
```

## Install the Django
```powershell
pip install Django
```

## Check the Django Version
```powershell
django-admin --version
# 4.1.7
```

## Initiate Django Project
```powershell
django-admin startproject <project_name>
```

## Start the Development Web Server
```powershell
# go under the project directory

python manage.py runserver
# Starting development server at http://127.0.0.1:8000/
```

## Inititate Django App
```powershell
# Go under the project directory

django-admin startapp <app_name>
```

## Open the DJango API shell
```powershell
python manage.py shell
# now we're able to access the models and perform all CRUD operations
```

## Insert Data Django API shell
```powershell
(venv) ➜ project1 git:(main) python manage.py shell
(InteractiveConsole)
>>> from members import models # import model
>>> models.Member.objects.all() # fetch all Member objects | Data in Member Table
<QuerySet []> # there is no member object
>>> member1 = models.Member(firstname = "Saul", lastname = "Goodman") # insert a Member Object
>>> member1.save() # Commit the changes to the database
>>> models.Member.objects.all() # fetch all Member objects
<QuerySet [<Member: Member object (1)>]>
>>> models.Member.objects.all().values() # fetch all Member object with the field values
<QuerySet [{'id': 1, 'firstname': 'Saul', 'lastname': 'Goodman'}]>
```

## Update Data Django API shell
```powershell
(venv) ➜ project1 git:(main) python manage.py shell
(InteractiveConsole)
>>> from members import models 
>>> models.Member.objects.all()[0]
<Member: Member object (1)>
>>> member1 = models.Member.objects.all()[0] 
>>> member1.firstname
'Saul'
>>> member1.lastname 
'Goodman'
>>> member1.firstname = "Gus"
>>> member1.lastname = "Fring" 
>>> member1.save()
>>> models.Member.objects.all().values()
<QuerySet [{'id': 1, 'firstname': 'Gus', 'lastname': 'Fring'}]>
```

## Delete Data Django API shell
```powershell
(venv) ➜ project1 git:(main) python manage.py shell
(InteractiveConsole)
>>> from members import models
>>> models.Member.objects.all().values()
<QuerySet [{'id': 1, 'firstname': 'Gus', 'lastname': 'Fring'}]>
>>> member1 = models.Member.objects.all()[0]
>>> member1.delete() # removed the data, no need to call the save() function
(1, {'members.Member': 1})
>>> member1 = models.Member.objects.all().values()
>>> 
```

## Create Superuser for Admin Panel
```powershell
python manage.py createsuperuser
# Username: johndoe
# Email address: johndoe@dummymail.com
# Password:
# Password (again):
# This password is too short. It must contain at least 8 characters.
# This password is too common.
# This password is entirely numeric.
# Bypass password validation and create user anyway? [y/N]: y
# Superuser created successfully.

# Now you can go to the /admin and login to the admin interface to perform CRUD operations on models
```

## Collect Static Files
```
python manage.py collectstatic
```
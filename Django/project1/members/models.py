from django.db import models

# Member Table
class Member(models.Model):
    firstname = models.CharField(max_length=50) # firtname column
    lastname = models.CharField(max_length=50) # lastname column

# After writing a new model first you need to create a migration using following command:
# python manage.py makemigrations <app_name>
# it'll create a migration file under the migrations directory in the app level
# Then, you can update the database using migrate command: python manage.py migrate <app_name or empty to apply all migrations>

# Note that Django automatically adds an auto-increment-id field in the models, it's an auto-increment integer field however if you'd like to work with uuid's instead of integer ids you can override this behaviour

# If you want to know the SQL that was executed you can use the following command:
# python manage.py sqlmigrate <app_name -> members> <serial no of the migration -> 0001>
## BEGIN;
## --
## -- Create model Member
## --
## CREATE TABLE "members_member" ("id" integer NOT NULL PRIMARY KEY AUTOINCREMENT, "firstname" varchar(50) NOT NULL, "lastname" varchar(50) NOT NULL);
## COMMIT;

    # updating the model
    # you need to commit the migration after a model update
    phone = models.IntegerField(null = True)
    date = models.DateField(null = True)

    # You can override the __str__ method to get a presentation of objects when you're dealing with them on Django's shell API or admin panel
    def __str__(self):
        return f"{self.pk} {self.firstname} {self.lastname} |"
    
# database relationships 
class Interest(models.Model):
    title = models.CharField(max_length=100)

    def __str__(self):
        return self.title

class City(models.Model):
    title = models.CharField(max_length=100)

    def __str__(self):
        return self.title

class Person(models.Model):
    name = models.CharField(max_length=30)
    mobile = models.CharField(max_length=20)
    interests = models.ManyToManyField(Interest)
    
    def __str__(self):
        return self.name

class PersonAddress(models.Model):
    person = models.OneToOneField(Person, on_delete=models.CASCADE)
    city = models.ForeignKey(City, on_delete=models.CASCADE)
    street_address = models.CharField(max_length=100)

    def __str__(self):
        return f"{self.person.name} ({self.street_address})"
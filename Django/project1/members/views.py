from django.shortcuts import render

# returning HTTP Response
from django.http import HttpResponse

def firstHTTPResponse(request):
    return HttpResponse("Hello World!")
    # now we're ready to go the URL conf file and bind this view with a path 
    # create the .urls.py, import the .view.py and bind the view with a path you'd like to

# first we need to create the templates directory in the level of application
# create a directory named templates
# create a test HTML
# Then append the app name into the INSTALLED_APPS list in settings.py, it's in the project level
# After this operation you may want to prepare the admin, auth, contenttypes, sessions tables, to do so run the following command
# python manage.py migrate
def templateRender(request):
    
    # returning the template
    return render(request, "test_html.html")

# return members view
from .models import Member

def members(request):
    members = Member.objects.all().values()[:5] # get the first 5 objects
    context = {
        "members" : members
    }
    return render(request, "display_members.html", context = context)

# return detail about users
from .models import Member
def details(request, id):
    try:
        member = Member.objects.get(pk = id)
        context = {
            "member" : member
        }
        return render(request, "member_detail.html", context = context)
    except Member.DoesNotExist:
        return render(request, "404.html")

# test view for template language of Django
def testtemplate(request):
    context = {
        "x" : [],
        "y" : ["hulo", "hulolo"]
    }
    return render(request, "django-template-test.html", context=context)

# test view for queryset object methods
def testquerysets(request):
    allQuerSetObjects = Member.objects.all() # returns all QuerySet Objects
    allQuerSetObjectsButDict = Member.objects.all().values() # return all objects as a python dictionary
    fieldData = Member.objects.all().values_list("firstname") # return only the values of specified column 
    filterRow = Member.objects.filter(firstname = "Walter").values() # WHERE in SQL

    # FILTER

    andInSQL = Member.objects.filter(firstname = "Walter", lastname = "White")
    # SELECT * FROM member WHERE firstname = "Walter" and lastname = "White"

    orInSQL = Member.objects.filter(firstname = "Walter").values() | Member.objects.filter(firstname = "Gus").values()
    # SELECT * FROM members WHERE firstname = "Walter" OR firstname = "Gus"

    # Or you can use the Q expressions
    from django.db.models import Q
    orInSQL = Member.objects.filter(Q(firstname = "Walter") | Q(firstname = "White")).values()

    # Field Lookups: A special way to filter the values
    # __startswith
    lLastnames = Member.objects.filter(lastname__startswith = "L")
    # SELECT * FROM members WHERE firstname LIKE "L%"

    # Filed Lookup syntax: <field_name>__<field lookup keyword>, here are the options you can use:
    
    # contains	    Contains the phrase
    # icontains	    Same as contains, but case-insensitive
    # date	        Matches a date
    # day	        Matches a date (day of month, 1-31) (for dates)
    # endswith	    Ends with
    # iendswith	    Same as endswidth, but case-insensitive
    # exact	        An exact match
    # iexact	    Same as exact, but case-insensitive
    # in	        Matches one of the values
    # isnull	    Matches NULL values
    # gt	        Greater than
    # gte	        Greater than, or equal to
    # hour	        Matches an hour (for datetimes)
    # lt	        Less than
    # lte	        Less than, or equal to
    # minute	    Matches a minute (for datetimes)
    # month	        Matches a month (for dates)
    # quarter	    Matches a quarter of the year (1-4) (for dates)
    # range 	    Match between
    # regex 	    Matches a regular expression
    # iregex	    Same as regex, but case-insensitive
    # second	    Matches a second (for datetimes)
    # startswith	Starts with
    # istartswith	Same as startswith, but case-insensitive
    # time	        Matches a time (for datetimes)
    # week	        Matches a week number (1-53) (for dates)
    # week_day	    Matches a day of week (1-7) 1 is sunday
    # iso_week_day	Matches a ISO 8601 day of week (1-7) 1 is monday
    # year	        Matches a year (for dates)
    # iso_year	    Matches an ISO 8601 year (for dates)

    # ORDER BY
    orderBy = Member.objects.all().order_by("firstname").values()
    # SELECT * FROM members ORDER BY firstname ASC
    orderBy = Member.objects.all().order_by("-firstname").values()
    # SELECT * FROM members ORDER BY firstname DESC
    pass

def random_output_view(request):
    # return render(request, "some-random.html")
    return render(request, "test_html.html")

from .forms import NameForm
from django.http import HttpResponseRedirect
def testingForms(request):
    if request.method == "POST":
        form = NameForm(request.POST)
        if form.is_valid():
            return HttpResponseRedirect("thanks")
    else:
        print("I'm here")
        form = NameForm()
        return render(request, "test-form.html", {"form": form})
    
def thanks(request):
    return HttpResponse("<h1>Thanks for submitting the form.</h1>")

        
    


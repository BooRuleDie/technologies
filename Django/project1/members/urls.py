# First HTTP Response
from django.urls import path
from . import views

urlpatterns = [
    # the first argument is case-sensitivie, you can't access the view if you try to go to the FirstHTTPREsponse for instance
    path('firsthttpresponse', views.firstHTTPResponse, name='firstHTTPREsponse'),
    # After that we need to bind this conf file with the root URL conf file and we should be ready to go
    # Go to the project1/project1/urls.py, import the include and do the binding

    # first template response endpoing
    path('templateresponse', views.templateRender, name='templateResponse'),

    # display members view 
    path('members', views.members, name='memberUrl'),

    # member details
    path('details/<int:id>', views.details, name='memberDetails'),

    # django template test binding
    path("testtemplate", views.testtemplate, name="test-template"),

    # test view fpr random junk
    path("random-junk", views.random_output_view, name = "random-junk"),

    # testing forms
    path("test-form", views.testingForms, name = "testing-forms" ),
    path("thanks", views.thanks, name = "thanks" )
]
from django.contrib import admin
from .models import Member

# You can also change the format of display
class MemberAdmin(admin.ModelAdmin):
    list_display = ("firstname", "lastname", "date")

# This is how you can register a model for the admin interface
# If you modified the field-display settings you should also specify the class
admin.site.register(Member, MemberAdmin)
# Now you should be able to perform CRUD operations on this model   

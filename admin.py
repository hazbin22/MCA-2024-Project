# from django.contrib import admin
# from .models import RegisteredUsers

# # Register your models here.

# class UserAdmin(admin.UserAdmin):
#     list_display =('email','fname', 'lname','date_of_birth','house','street', 'place', 'district', 'pincode', 'phone', 'password', 'confirm_password', 'role')

# admin.site.register(RegisteredUsers,UserAdmin)
from django.contrib import admin
from .models import RegisteredUsers

class UserAdmin(admin.ModelAdmin):
    list_display = ('email', 'fname', 'lname', 'date_of_birth', 'house', 'street', 'place', 'district', 'pincode', 'phone', 'password', 'role')

admin.site.register(RegisteredUsers, UserAdmin)

from django.contrib import admin
from django.urls import path
from pharmio import views

urlpatterns = [
    path('',views.home, name='home'),
    path('login/',views.loginn, name='login'),
    path('register/',views.register, name='register'),
]
from django.shortcuts import render,redirect
from django.http import HttpResponse
from .models import User

# Create your views here.
def home(request):
    return render(request,'index.html')
def loginn(request):
    return render(request,'login.html')
def register(request):    
    if request.method=="POST":
        username=request.POST.get("username")
        name=request.POST.get("name")
        email=request.POST.get("email")
        phno=request.POST.get("phone")
        password=request.POST.get("password")
        confirm_pass=request.POST.get("confirm_password")
        if password == confirm_pass:
            if User.objects.filter(username=username).exists() or User.objects.filter(email=email).exists():
                return redirect('register')  # 'register' is the name of your registration URL pattern
            else:
                myuser= User(name=name,email=email,phno=phno,username=username,password=password,confirm_pass=confirm_pass)
                myuser.save()
                return redirect('login')
        else:
            return redirect('register')
    return render(request,'register.html')


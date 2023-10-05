from django.shortcuts import render,redirect
from django.urls import reverse
from django.contrib import messages
from django.contrib.auth import login
#from .models import CustomUser

# Create your views here.
def home(request):
    return render(request,'index.html')
def loginn(request):
    # # if request.method == "POST":
    # #     username = request.POST['username']
    # #     password = request.POST['password']
    # #     user = CustomUser.objects.get(username=username,password=password)
        
    # #     if user is not None:
    # #         # Authentication successful
    # #         login(request, user)  # Log the user in
    # #         messages.success(request, "Login successful")

    # #         if user.role == 'S':
    # #             return redirect('staff')
    # #         elif user.role == 'C':
    # #             return redirect('customer')
    # #         elif user.role == 'D':
    # #             return redirect('delivery')
    # #     else:
    # #         messages.error(request, "Login failed. Please check your credentials.")
    #         print("Authentication failed for user:", username)
            

    #return render(request,'index.html')
    return render(request,'login.html')








def register(request):    
    # if request.method=="POST":
    #     username=request.POST.get("username")
    #     fname=request.POST.get("fname")
    #     lname=request.POST.get("lname")
    #     email=request.POST.get("email")
    #     password=request.POST.get("password")
    #     confirm_pass=request.POST.get("confirm_password")
    #     role=request.POST.get("role")
    #     if password == confirm_pass:
    #         if CustomUser.objects.filter(username=username).exists() or CustomUser.objects.filter(email=email).exists():
    #             return redirect('register')  # 'register' is the name of your registration URL pattern
    #         else:
    #             myuser= CustomUser(fname=fname,lname=lname,email=email,username=username,password=password,confirm_pass=confirm_pass,role=role)
    #             myuser.save()
    #             return redirect('login')
    #     else:
    #         return redirect('register')
    return render(request,'register.html')

def staff(request):
    return render(request,'staff.html')

def customer(request):
    return render(request,'customer.html')

def delivery(request):
    return render(request,'delivery.html')
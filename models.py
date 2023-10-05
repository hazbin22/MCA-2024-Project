from django.db import models
from django.contrib.auth.models import AbstractBaseUser, BaseUserManager

# Create your models here.

class RegisteredUsers(BaseUserManager):
    def create_user(self, email, password=None, **extra_fields):
        if not email:
            raise ValueError('The Email field must be set')
        email = self.normalize_email(email)
        user = self.model(email=email, **extra_fields)
        user.set_password(password)
        user.save(using=self._db)
        return user

    def create_superuser(self, email, password=None, **extra_fields):
        extra_fields.setdefault('is_staff', True)
        extra_fields.setdefault('is_superuser', True)

        if extra_fields.get('is_staff') is not True:
            raise ValueError('Superuser must have is_staff=True.')
        if extra_fields.get('is_superuser') is not True:
            raise ValueError('Superuser must have is_superuser=True.')

        return self.create_user(email, password, **extra_fields)

class RegisteredUsers(AbstractBaseUser):
    email = models.EmailField(unique=True)
    fname = models.CharField(max_length=50)
    lname = models.CharField(max_length=50)
    date_of_birth = models.DateField()
    house = models.CharField(max_length=50)
    street = models.CharField(max_length=50)
    place = models.CharField(max_length=50)
    district = models.CharField(max_length=50)
    pincode = models.CharField(max_length=6)
    phone = models.CharField(max_length=10)
    password = models.CharField(max_length=50)
    confirm_password = models.CharField(max_length=50)
    ROLE_CHOICES = [
        ('S', 'Staff'),
        ('C', 'Customer'),
        ('D', 'Delivery Team'),
    ]
    role = models.CharField(max_length=1, choices=ROLE_CHOICES, default='C')

    objects = RegisteredUsers()

    USERNAME_FIELD = 'email'
    REQUIRED_FIELDS = ['email','fname','lname']

    def __str__(self):
        return self.email

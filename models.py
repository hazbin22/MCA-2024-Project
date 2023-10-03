from django.db import models

# Create your models here.
class User(models.Model):
    username=models.CharField(max_length=50)
    name=models.CharField(max_length=50)
    email=models.EmailField()
    phno=models.CharField(max_length=12, blank=True, null=True)
    password=models.CharField(max_length=50)
    confirm_pass=models.CharField(max_length=50)
    def __str__ (self):
        return self.name,self.email,self.phno,self.password
    
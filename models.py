from django.db import models

# Create your models here.
class LoginDetails(models.Model):
    user_id=models.AutoField(primary_key=True)
    password=models.CharField(max_length=10)
    type=models.CharField(max_length=10)
    status=models.BinaryField()


class AddressDetails(models.Model):
    user_id = models.OneToOneField(LoginDetails, primary_key=True, on_delete=models.CASCADE)  # OneToOneField to LoginDetails
    buildingname = models.CharField(max_length=255)
    street = models.CharField(max_length=255)
    place = models.CharField(max_length=255)
    district = models.CharField(max_length=255)
    pincode = models.CharField(max_length=6)
    phone_number = models.CharField(max_length=10)
    status = models.BinaryField()
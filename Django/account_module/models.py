from django.db import models

# Create your models here.

from django.contrib.auth.models import AbstractUser
class User(AbstractUser):
    phone_number = models.CharField(max_length=120)
    avatar = models.ImageField(upload_to='avatars')
    def __str__(self):
        return self.username


from pickle import UNICODE
from django.db import models
from django.contrib.auth.decorators import login_required
from django.shortcuts import get_object_or_404, redirect
from slugify import slugify, SLUG_OK
from phonenumber_field.modelfields import PhoneNumberField
from django.contrib.auth.models import User
from decimal import  ROUND_HALF_UP
# Create your models here.


class user(models.Model):
    name = models.CharField(max_length=120)
    last_name = models.CharField(max_length=120)
    email = models.EmailField(unique=True)
    username = models.CharField(max_length=120)
    password = models.CharField(max_length=120)
    def __str__(self):
        return self.name


class teacher(models.Model):
    name=models.CharField(max_length=120)
    field=models.CharField(max_length=120)

    def __str__(self):
        return self.name

class products(models.Model):
    title=models.CharField(max_length=100,null=True,blank=True,verbose_name="تیتر")
    desc=models.TextField(verbose_name="توضیحات محصول")
    teacher=models.ForeignKey(teacher,on_delete=models.PROTECT,default=1)
    price=models.CharField(max_length=100)
    off=models.IntegerField()
    image=models.ImageField(upload_to='images_products')
    views=models.CharField(max_length=100)
    level = models.CharField(max_length=255)
    status = models.CharField(max_length=255)
    episodes = models.IntegerField()
    slug=models.SlugField(null=True,blank=True,allow_unicode=True)

    def save(self, *args, **kwargs):
        self.slug=slugify(self.title)

        return super().save(*args, **kwargs)

    def __str__(self):
        return self.title
    class Meta:
        verbose_name_plural="محصولات"
        verbose_name="محصول"


class syllabs(models.Model):
    title = models.CharField(max_length=120)
    course = models.ManyToManyField(products)
    video = models.CharField(max_length=120)
    image = models.ImageField(upload_to='images_products', null=True, blank=True)


class Company(models.Model):
    title = models.CharField(max_length=100)
    desc = models.TextField()
    image = models.ImageField(upload_to='images_products')

    def __str__(self):
        return self.title


class Article(models.Model):
    title = models.CharField(max_length=200, verbose_name="عنوان مقاله")
    content = models.TextField(verbose_name="محتوا")
    category = models.CharField(max_length=100, verbose_name="دسته‌بندی")
    image = models.ImageField(upload_to='images_products')
    author = models.CharField(max_length=100, verbose_name="نویسنده")
    views = models.IntegerField(default=0, verbose_name="تعداد بازدیدها")
    created_at = models.DateTimeField(auto_now_add=True, verbose_name="تاریخ ایجاد")

    def __str__(self):
        return self.title


class Achievement(models.Model):
    title = models.CharField(max_length=200, verbose_name="عنوان مقاله")
    content = models.TextField(verbose_name="محتوا")
    image = models.ImageField(upload_to='images_products')
    views = models.IntegerField(default=0, verbose_name="تعداد بازدیدها")

    def __str__(self):
        return self.title



class Courses(models.Model):
    title = models.CharField(max_length=100)
    slug = models.SlugField(unique=True, allow_unicode=True)
    desc = models.TextField()
    created_at = models.DateTimeField(auto_now_add=True)
    start_date = models.DateTimeField()
    image = models.ImageField(upload_to='images_products', null=True, blank=True)
    is_active = models.BooleanField(default=True)

    def __str__(self):
        return self.title

    class Meta:
        verbose_name_plural = "درسها"
        verbose_name = "درس"


class CourseItem(models.Model):
    course = models.ForeignKey(Courses, on_delete=models.CASCADE, related_name="items")
    title = models.CharField(max_length=255)
    slug = models.SlugField(unique=True, allow_unicode=True)
    order = models.PositiveIntegerField()
    description = models.TextField(blank=True, null=True)
    is_active = models.BooleanField(default=True)

    class Meta:
        ordering = ['order']
        verbose_name_plural = "سرفصل ها"
        verbose_name = "سرفصل"
        unique_together = ['course', 'order']

    def __str__(self):
        return f"{self.order} - {self.title}"




class info_main_page(models.Model):
    title = models.CharField(max_length=100)
    desc = models.TextField()
    address = models.TextField()
    email = models.EmailField(max_length=100, default='example@example.com')
    telephone = PhoneNumberField(max_length=13, default='+989123456789')

    def __str__(self):
        return self.title


class teacher_test(models.Model):
    name = models.CharField(max_length=100, null=True, blank=True)
    lname = models.CharField(max_length=100, null=True, blank=True)
    code = models.CharField(max_length=100, null=True, blank=True)

    def __str__(self):
        return self.name


class teacher_info_test(models.Model):
    name = models.OneToOneField(teacher_test, on_delete=models.CASCADE, null=True, blank=True)
    course = models.CharField(max_length=100, null=True, blank=True)
    phone = models.CharField(max_length=100, null=True, blank=True)
    address = models.TextField(max_length=100, null=True, blank=True)

    def __str__(self):
        return self.course


class ContactMessage(models.Model):
    name = models.CharField(max_length=100)
    email = models.EmailField()
    message = models.TextField(null=True, blank=True)  # امکان NULL یا خالی بودن
    created_at = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return f"Message from {self.name}"


class SearchQuery(models.Model):
    query = models.CharField(max_length=255, verbose_name="عبارت جستجو")
    created_at = models.DateTimeField(auto_now_add=True, verbose_name="تاریخ جستجو")

    def __str__(self):
        return self.query

class blogpost(models.Model):
    title = models.CharField(max_length=200)
    content = models.TextField()
    excerpt = models.TextField()
    author = models.CharField(max_length=100)
    created_at = models.DateTimeField(auto_now_add=True)

    def __str__(self):
        return self.title



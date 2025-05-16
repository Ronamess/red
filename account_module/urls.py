
from django.contrib import admin
from django.urls import path
from . import  views

urlpatterns = [
#path('signup/', views.signup, name='signup_account_module'),
    path("signup/",views.sign.as_view(),name="signup_account_module"),
]
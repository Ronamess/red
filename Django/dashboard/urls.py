from tkinter.font import names

from django.contrib import admin
from django.urls import path

from . import views

urlpatterns = [
    path("dashboard/dashboardindex", views.dashboardindex, name="dashboardindex"),


]


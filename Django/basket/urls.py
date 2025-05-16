from django.contrib import admin
from django.urls import path
from django.contrib.auth.views import LogoutView
from .views import add_to_cart, basket, remove_from_cart, update_cart, index  # ایمپورت بهینه‌شده

urlpatterns = [
    path('', index, name='index'),  # صفحه اصلی
    path('add-to-cart/<int:product_id>/', add_to_cart, name='add_to_cart'),
    path('basket/', basket, name='basket'),
    path('remove-from-cart/<int:cart_item_id>/', remove_from_cart, name='remove_from_cart'),
    path('update-cart/<int:cart_item_id>/', update_cart, name='update_cart'),
    path('logout/', LogoutView.as_view(), name='logout'),  # خروج کاربر
]
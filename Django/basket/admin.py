from django.contrib import admin
from .models import Cart

class CartAdmin(admin.ModelAdmin):
    list_display = ('user', 'product', 'quantity', 'total_price')  # فیلدهایی که در لیست نمایش داده می‌شوند
    list_filter = ('user',)  # فیلتر بر اساس کاربر
    search_fields = ('product__title',)  # جستجو بر اساس عنوان محصول

admin.site.register(Cart, CartAdmin)
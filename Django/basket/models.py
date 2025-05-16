from django.contrib.auth.decorators import login_required
from django.contrib.auth.models import User
from django.db import models
from django.shortcuts import get_object_or_404, redirect
from django.conf import settings
from products.models import products


# Create your models here.


class Cart(models.Model):
    user = models.ForeignKey(settings.AUTH_USER_MODEL, on_delete=models.CASCADE, verbose_name="کاربر")
    product = models.ForeignKey(products, on_delete=models.CASCADE, verbose_name="محصول")
    quantity = models.PositiveIntegerField(default=1, verbose_name="تعداد")

    @property
    def total_price(self):
        return self.product.final_price * self.quantity

    def __str__(self):
        return f"{self.user.username} - {self.product.title}"

    class Meta:
        verbose_name_plural = "سبدهای خرید"
        verbose_name = "سبد خرید"




@login_required
def add_to_cart(request, product_id):
    product = get_object_or_404(products, id=product_id)
    cart_item, created = Cart.objects.get_or_create(user=request.user, product=product)
    if not created:
        cart_item.quantity += 1
        cart_item.save()
    return redirect('cart_view')



from django.contrib.auth.decorators import login_required
from django.shortcuts import render, get_object_or_404, redirect
from django.contrib import messages
from .models import products, Cart


# افزودن محصول به سبد خرید
@login_required
def add_to_cart(request, product_id):
    product = get_object_or_404(products, id=product_id)
    cart_item, created = Cart.objects.get_or_create(user=request.user, product=product)

    if not created:
        cart_item.quantity += 1
        cart_item.save()
        messages.success(request, f"تعداد {product.title} در سبد خرید شما به‌روزرسانی شد.")
    else:
        messages.success(request, f"{product.title} به سبد خرید شما اضافه شد.")

    return redirect('sabadkharid')


# به‌روزرسانی تعداد محصول در سبد خرید
@login_required
def update_cart(request, cart_item_id):
    cart_item = get_object_or_404(Cart, id=cart_item_id, user=request.user)
    new_quantity = int(request.POST.get('quantity', 1))

    if new_quantity > 0:
        if new_quantity > cart_item.product.stock:  # بررسی موجودی انبار
            messages.error(request, "تعداد درخواستی بیشتر از موجودی انبار است.")
        else:
            cart_item.quantity = new_quantity
            cart_item.save()
            messages.success(request, f"تعداد {cart_item.product.title} به‌روزرسانی شد.")
    else:
        cart_item.delete()
        messages.success(request, f"{cart_item.product.title} از سبد خرید شما حذف شد.")

    return redirect('sabadkharid')


# حذف محصول از سبد خرید
@login_required
def remove_from_cart(request, cart_item_id):
    cart_item = get_object_or_404(Cart, id=cart_item_id, user=request.user)
    cart_item.delete()
    messages.success(request, f"{cart_item.product.title} از سبد خرید شما حذف شد.")
    return redirect('sabadkharid')


# نمایش سبد خرید
@login_required
def basket(request):
    cart_items = Cart.objects.filter(user=request.user)
    total_price = sum(item.total_price for item in cart_items)
    return render(request, "sabadkharid.html", {'cart_items': cart_items, 'total_price': total_price})


def index(request):
    return  render(request,"products/index.html")
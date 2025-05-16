from django.shortcuts import render
from products.models import products
# Create your views here.

# Import libraries
import json
import requests

def dashboardindex(request):
    count_product=products.objects.count()
    print(count_product)
    # key = "https://api.binance.com/api/v3/ticker/price?symbol=BTCUSDT"
    # data = requests.get(key)
    # data = data.json()
    # print(f"{data['symbol']} price is {data['price']}")
    return render(request, "dashboard/index.html",
                  {"count_product": count_product})
                   # "price_btc":data['symbol']})



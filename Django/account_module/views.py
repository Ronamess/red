from django.contrib.auth.decorators import login_required
from django.http import HttpResponse
from django.shortcuts import render, redirect
from django.contrib.auth import  authenticate,login,logout
from . import forms
from . import models
# Create your views here.
def signup(request):
    if request.method == 'POST':
        form = forms.signup_form(request.POST)
        if form.is_valid():
            name=form.cleaned_data['name']
            email=form.cleaned_data['email']
            lname=form.cleaned_data['lname']
            password=form.cleaned_data['password']
            username=form.cleaned_data['username']
            new_user=models.user(name=name,email=email,last_name=lname,password=password)
            new_user.save()
            return redirect("/login")

        else:
            return HttpResponse("Not Valid!!!!!!")
        return  HttpResponse("POSTTTTTTT")
    else:
        data_form = forms.signup_form()
        return render(request,"account_module/sign-up.html",{"form":data_form})


from django.views import View
from django.utils.decorators import method_decorator
class sign(View):
    def get(self, request):
        data_form = forms.signup_form()
        return render(request, "account_module/sign-up.html", {"form": data_form})
    def post(self, request):
        form = forms.signup_form(request.POST)
        if form.is_valid():
            name = form.cleaned_data['name']
            email = form.cleaned_data['email']
            lname = form.cleaned_data['lname']
            password = form.cleaned_data['password']
            username = form.cleaned_data['username']
            if len(password) < 9:
                form.add_error('password', 'طول کاراکتر پسورد شما کمتر از 8 میباشد')
            else:
                user : bool=models.User.objects.filter(username=username).exists()
                if user:
                    form.add_error('username',"نام کاربری تکراری می باشد")
                else:
                    new_user=models.User(first_name=name,
                                         email=email,
                                         last_name=lname,
                                         username=username,
                                         is_active=True,
                                         )
                    new_user.set_password(password)
                    new_user.save()
                    return redirect("/login")
        return render(request, "account_module/sign-up.html", {"form": form})





class login_view(View):
    def get(self, request):
        data_form = forms.login_form()
        return render(request, "products/login.html", {"form": data_form})
    def post(self, request):
        form = forms.login_form(request.POST)
        if form.is_valid():
            password = form.cleaned_data['password']
            username = form.cleaned_data['username']
            user=models.User.objects.filter(username=username)
            user_auth=authenticate(username=username, password=password)
            if user_auth :
                login(request, user_auth)
                return redirect("/")
            else:
                form.add_error("username","نام کاربری یا کلمه عبور صحیح نمی باشد")
        return render(request, "products/login.html", {"form": form})



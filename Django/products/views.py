from django.http import HttpResponse
from django.shortcuts import render, redirect ,get_object_or_404
from django.contrib.auth.decorators import login_required
from . import models
from .models import products, ContactMessage,Article, SearchQuery
from .models import Article, SearchQuery
from django.db.models import Q
from .models import ContactMessage 
from django.contrib.auth.models import User
from django.contrib.auth import login as auth_login, logout
from django.contrib.auth import authenticate, login as auth_login
from django.contrib.auth.views import LogoutView
from django.core.paginator import Paginator
from django import forms
from django.contrib import messages
from django.views import View
from django.contrib.auth import logout
from django.shortcuts import redirect
from .models import products
from .models import blogpost
from .models import products, Courses, Company, Article, info_main_page, Achievement


# Create your views here.

def product(request):
    if request.user.is_authenticated:
        user = request.user
    else:
        user = None
    data_product = models.products.objects.all()
    print((data_product))
    data_courses = models.Courses.objects.all()
    data_company = models.Company.objects.all()
    data_Article = models.Article.objects.all()
    data_info = models.info_main_page.objects.all().first()
    data_Achievement = models.Achievement.objects.all()
    return render(request, "products/index.html", {
        "data_product": data_product,
        "data_courses": data_courses,
        "data_company": data_company,
        "user": user,
        "data_Achievement": data_Achievement,
        "data_info": data_info,
        "data_Article": data_Article,

    })

from django.shortcuts import render
from .models import products
def product_list(request):
    data_product = products.objects.all()
    data_info = models.info_main_page.objects.all().first()
    return render(request, 'products/index.html', {'data_product': data_product,"data_info": data_info})


def contact_us(request):
    data_info = models.info_main_page.objects.all().first()

    if request.method == 'POST':
        name = request.POST.get('name')
        email = request.POST.get('email')
        message = request.POST.get('message')

        if not message:
            messages.error(request, 'لطفاً پیام خود را وارد کنید!')
            return redirect('contact_us')

        ContactMessage.objects.create(name=name, email=email, message=message)
        messages.success(request, 'پیام شما با موفقیت ارسال شد!')
        return redirect('contact_us')

    return render(request, "products/contact-us.html", {"data_info": data_info,})


from django.shortcuts import render, get_object_or_404
from . import models

def course(request):
    data_info = models.info_main_page.objects.all().first()
    data_product = models.products.objects.all()
    return render(request, "products/course.html", {"data_info": data_info, "data_product": data_product})

def course_list(request):
    data_info = models.info_main_page.objects.all().first()
    data_product = models.products.objects.all()
    data_courses = models.Courses.objects.all().order_by('-datetime')
    return render(request, "products/course.html", {"data_courses": data_courses,"data_info": data_info, "data_product": data_product})


def course_detail(request, course_id):
    data_info = models.info_main_page.objects.all().first()
    data_product = models.products.objects.all()
    course = get_object_or_404(models.Courses, id=course_id)

    recommended_courses = models.Courses.objects.exclude(id=course_id)[:3]

    return render(request, "products/course_detail.html", {
        "course": course,
        "data_info": data_info,
        "data_product": data_product,
        "recommended_courses": recommended_courses
    })

def login(request):
    data_info = models.info_main_page.objects.all().first()
    if request.method == "POST":
        username = request.POST['username']
        password = request.POST['password']
        user = authenticate(request, username=username, password=password)
        if user is not None:
            auth_login(request, user)
            messages.success(request, "ورود با موفقیت انجام شد.")
            return redirect("index")
        else:
            messages.error(request, "نام کاربری یا رمز عبور اشتباه است.")
            return redirect("login")
    else:
        return render(request, "products/login.html", {"data_info": data_info,})

@login_required(login_url='login/')
def panel_user(request):
    data_info = models.info_main_page.objects.all().first()
    return render(request, "products/panel-user.html", {"data_info": data_info,})

def custom_logout(request):
    logout(request)
    messages.success(request, "شما با موفقیت از سیستم خارج شدید.")
    return redirect('index')

def search(request):
    data_info = models.info_main_page.objects.all().first()
    query = request.GET.get('query')
    if query:
        SearchQuery.objects.create(query=query)
        return redirect(f'/search/results/?query={query}')
    return render(request, "products/search.html", {"data_info": data_info,})

def search_results(request):
    data_info = models.info_main_page.objects.all().first()
    query = request.GET.get('query')
    results = []
    if query:
        results = Article.objects.filter(Q(title__icontains=query) | Q(content__icontains=query)).order_by('-created_at')
    return render(request, "products/search_results.html", {'query': query, 'results': results, 'data_info': data_info})

def search_history(request):
    data_info = models.info_main_page.objects.all().first()
    queries = SearchQuery.objects.all().order_by('-created_at')
    return render(request, "products/search_history.html", {'queries': queries, 'data_info': data_info})


def sign_up(request):
    if request.method == "POST":
        name_form = request.POST.get('name')
        lname_form = request.POST.get('lname')
        email_form = request.POST.get('email')
        password_form = request.POST.get('password')
        username_form = request.POST.get('username')
        if not (name_form and lname_form and email_form and password_form and username_form):
            messages.error(request, "لطفاً تمام فیلدها را پر کنید.")
            return redirect("sign_up")
        if User.objects.filter(username=username_form).exists():
            messages.error(request, "نام کاربری قبلاً استفاده شده است.")
            return redirect("sign_up")
        if User.objects.filter(email=email_form).exists():
            messages.error(request, "ایمیل قبلاً استفاده شده است.")
            return redirect("sign_up")
        user = User.objects.create_user(
            username=username_form,
            first_name=name_form,
            last_name=lname_form,
            email=email_form,
            password=password_form,
            is_active=False,
            # is_staff=False
        )
        user.set_password(password_form)
        user.save()

        messages.success(request, "ثبت‌نام با موفقیت انجام شد. لطفاً وارد شوید.")
        return redirect("login")
    else:
        return render(request, "account_module/sign-up.html")

def teach(request):
    data_info = models.info_main_page.objects.all().first()
    return render(request, "products/teach.html",{'data_info': data_info})

def error404(request):
    return render(request, "products/error404.html")

def article(request):
    data_info = models.info_main_page.objects.all().first()
    return render(request, "products/article.html",{"data_info": data_info,})


def blog(request):
    data_info = models.info_main_page.objects.all().first()
    query = request.GET.get('q')
    category = request.GET.get('category')

    articles = Article.objects.all().order_by('-created_at')

    if query:
        articles = articles.filter(title__icontains=query)

    if category:
        articles = articles.filter(category=category)

    paginator = Paginator(articles, 6)
    page_number = request.GET.get('page')
    page_obj = paginator.get_page(page_number)

    return render(request, "products/blog.html", {'page_obj': page_obj, 'data_info': data_info})

    # data_info = models.info_main_page.objects.all().first()
    # , {"data_info": data_info, }) درسته؟

def blog_post(request, post_id):
    data_info = models.info_main_page.objects.all().first()
    post = get_object_or_404(blogpost, id=post_id)
    return render(request, "products/blog_post.html", {'post': post, 'data_info': data_info})


def blog_list(request):
    data_info = models.info_main_page.objects.all().first()
    posts = blogpost.objects.all()
    return render(request, "products/blog_list.html", {'posts': posts, 'data_info': data_info})

def category(request):
    data_info = models.info_main_page.objects.all().first()
    return render(request, "products/category.html",{ 'data_info': data_info})

def forget_password(request):
    return render(request, "products/forget-password.html")

def index(request):
    return  render(request,"products/index.html")

def sabadkharid(request):
    return render(request,"products/sabadkharid.html")


def test(request, slug):
    data = models.products.objects.filter(slug=slug).first()
    return render(request, "products/course.html", {"data": data})


def calculator(request):
    data_info = models.info_main_page.objects.all().first()
    result = None
    error = None

    if request.method == "POST":
        num1 = request.POST.get('input1')
        num2 = request.POST.get('input2')
        operation = request.POST.get('operation')

        if not num1 or not num2:
            error = "لطفاً دو عدد وارد کنید!"
        else:
            try:
                num1 = int(num1)
                num2 = int(num2)

                if operation == 'sum':
                    result = num1 + num2
                elif operation == 'minez':
                    result = num1 - num2
                elif operation == 'zarb':
                    result = num1 * num2
                elif operation == 'taghsim':
                    result = "تقسیم بر صفر ممکن نیست" if num2 == 0 else num1 / num2
                else:
                    error = "عملیات نامعتبر است!"
            except ValueError:
                error = "لطفاً فقط عدد وارد کنید!"

    return render(request, "products/calculator.html", {
        "result": result,
        "error": error,
        "data_info": data_info
    })





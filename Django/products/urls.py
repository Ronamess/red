from tkinter.font import names

from django.contrib import admin
from django.urls import path
from django.contrib.auth.views import LogoutView
from .views import custom_logout,contact_us,search_results,course_detail,course_list,product_list
from . import views

urlpatterns = [
    path("", views.product, name="index"),
    path("sabadkharid/", views.sabadkharid, name='sabadkharid'),
    path("contact_us/", views.contact_us, name="contact_us"),
    path('products/', views.product_list, name='product_list'),
    path("course/", views.course, name="course"),
    path('courses/', views.course_list, name='course_list'),
    path('course/<int:course_id>/', views.course_detail, name='course_detail'),
    path('course/<int:id>/', views.course, name='course'),
    path("login/", views.login, name="login"),
    path('logout/', custom_logout, name='logout'),
    path("error404/", views.error404, name="error404"),
    path("article/", views.article, name="article"),
    path("blog/", views.blog, name="blog"),
    path('blog/<int:post_id>/', views.blog_post, name='blog_post'),
    path('blog/', views.blog_list, name='blog_list'),
    path("category/", views.category, name="category"),
    path("forget-password/", views.forget_password, name="forget_password"),
    path("panel-user/", views.panel_user, name="panel_user"),
    path("search/", views.search, name="search"),
    path("search/results/", views.search_results, name="search_results"),
    path("search/history/", views.search_history, name="search_history"),
    path("sign-up/", views.sign_up, name="sign_up"),
    path("teach/", views.teach, name="teach"),
    path("product/<str:slug>", views.test, name="test"),
    path("calculator/", views.calculator, name="calculator")

]
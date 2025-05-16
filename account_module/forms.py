from django import forms

class signup_form(forms.Form):
    name=forms.CharField(widget=forms.TextInput(attrs={"type":"text",
                                                       "class":"form-control",
                                                       "placeholder":"نام خود را وارد کنید"}))
    lname=forms.CharField(widget=forms.TextInput(attrs={"type":"text",
                                                       "class":"form-control",
                                                       "placeholder":"نام خانوادگی  خود را وارد کنید"}))
    email=forms.EmailField(widget=forms.TextInput(attrs={"type":"text",
                                                       "class":"form-control",
                                                       "placeholder":"ایمیل خود را وارد کنید"}))
    password=forms.CharField(widget=forms.TextInput(attrs={"type":"text",
                                                       "class":"form-control",
                                                       "placeholder":"پسورد خود را وارد کنید"}))
    username=forms.CharField(widget=forms.TextInput(attrs={"type":"text",
                                                       "class":"form-control",
                                                       "placeholder":"نام کاربری خود را وارد کنید"}))


class login_form(forms.Form):
    password=forms.CharField(widget=forms.TextInput(attrs={"type":"text",
                                                       "class":"form-control",
                                                       "placeholder":"پسورد خود را وارد کنید"}))
    username=forms.CharField(widget=forms.TextInput(attrs={"type":"text",
                                                       "class":"form-control",
                                                       "placeholder":"نام کاربری خود را وارد کنید"}))
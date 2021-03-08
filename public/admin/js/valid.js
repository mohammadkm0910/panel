jQuery.validator.addMethod("noneSpace" , function(value, element){
    return this.optional(element) || value.match(/^\S*$/);
}, "Cannot contain empty space");
$(function () {
    $("#form-group").validate({
        rules: {
            title: {
                required: true,
                minlength: 3,
                maxlength: 150,
            }
        },
        messages: {
            title: {
                required: "لصفاً عنوان خود را وارد کنید",
                minlength: "مقدار کارکتر وارد شده کمتر از 3 تاست.",
                maxlength: "مقدار کارکتر وارد شده بیشتر از 150 تاست"
            }
        },
        submitHandler:function (form) {
            form.submit();
        }
    });
});
$(function () {
   $("#form-page").validate({
       rules: {
           title: {
               required: true,
               minlength: 3,
               maxlength: 150,
           },
           summary: {
               required: true,
               minlength: 20,
               maxlength: 500,
           },
           body: {
               required: true,
               minlength: 30
           }
       },
       messages: {
           title: {
               required: "لصفاً عنوان خود را وارد کنید",
               minlength: "مقدار کارکتر وارد شده کمتر از 3 تاست.",
               maxlength: "مقدار کارکتر وارد شده بیشتر از 150 تاست",
           },
           summary: {
               required: "توضیح مختصر نمی تواند خالی باشد",
               minlength: "مقدار کارکتر وارد شده کمتر از 20 تاست",
               maxlength: "مقدار کارکتر وارد شده بیشتر از 500 تاست"
           },
           body: {
               required: "متن نمی تواند خالی باشد",
               minlength: "مقدار کارکتر وارد شده کمتر از 30 تاست"
           }
       },
       submitHandler:function (form) {
           form.submit();
       }
   });
});
$(function () {
    $("#form-register").validate({
        rules: {
            username: {
                required: true,
                minlength: 3,
                maxlength: 100,
                noneSpace: true,
            },
            email: {
                required: true,
                maxlength: 150,
                email: true,
            },
            password: {
                required: true,
                minlength: 5,
                maxlength: 100,
                noneSpace: true,
            }
        },
        messages: {
            username: {
                required: "نام کاربری خود را وارد کنید",
                minlength: "مقدار کارکتر وارد شده کمتر از 3 تاست.",
                maxlength: "مقدار کارکتر وارد شده بیشتر از 100 تاست",
                noneSpace: "نمی تواند شامل فصای خالی باشد",
            },
            email: {
                required: "ایمیل خود را وارد کنید",
                maxlength: "مقدار کارکتر وارد شده بیشتر از 150 تاست",
                email: "ایمیل معتر وارد کنید",
            },
            password: {
                required: "پسورد خود را وارد کنید",
                minlength: "مقدار کارکتر وارد شده کمتر از 5 تاست",
                maxlength: "مقدار کارکتر وارد شده بیشتر از 100 تاست",
                noneSpace: "نمی تواند شامل فصای خالی باشد",
            }
        }
    });
});
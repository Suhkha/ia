(function ($, window) {
        $('#birthday').datepicker({dateFormat: 'dd-mm-yy'});

        $("#state").change(function(event){
            var id = $("#state").find(':selected').val();
            console.log(id);
            $("#city").load('../blocks/__block--load_city.php?id='+id);
        });

        $('.flexslider').flexslider({
            animation: "slide"
          });

        $('#login-form').validate({
        rules : {
            email :{
                required: true,
                email   : true
            },
            password :{
                required: true,
                minlength: 8,
                maxlength: 12
            }
        },
        messages: {
            required: "Campo obligatorio.",
            email: "Ingrese un email válido."
        }
    });

        $('#register-form').validate({
        rules : {
            image_tmp   : {
                required   : true,
                extension  : "jpg|png|gif|jpeg"
            },
            username      : 'required',
            lastname_1       : 'required',
            lastname_2 : 'required',
            gender         : 'required',
            localidad   : 'required',
            birthday        : 'required',
            email       : {
                required: true,
                email   : true
            },
            password :{
                required: true,
                minlength: 8,
                maxlength: 12
            },
            confirm_password : {
                required: true,
                equalTo : "#password",
                minlength: 8,
                maxlength: 12
            },
            street        : 'required',
            number          : {
                required: true,
                digits  : true
            },
            location        : 'required',
            zip          : {
                required: true,
                digits  : true
            },
            state        : 'required',
            city        : 'required'
            
        },
        messages: {
            profile_image: {
                  extension: "Seleccione una imagen válida"
                },
            zip: {
                  required: "Ingrese un código postal",
                },
            email: {
                  email: "Ingrese un email válido"
                },
            confirm_password: {
                  confirm_password: "Ingrese un password válido",
                  equalTo: "Los passwords no coinciden"
                }
        }
    });

    $('#update-profile-form').validate({
        rules : {
            image_tmp   : {
                extension  : "jpg|png|gif|jpeg"
            },
            username      : 'required',
            lastname_1       : 'required',
            lastname_2 : 'required',
            gender         : 'required',
            localidad   : 'required',
            birthday        : 'required',
            email       : {
                required: true,
                email   : true
            },
            password :{
                minlength: 8,
                maxlength: 12
            },
            confirm_password : {
                equalTo : "#password",
                minlength: 8,
                maxlength: 12
            },
            street        : 'required',
            number          : {
                required: true,
                digits  : true
            },
            location        : 'required',
            zip          : {
                required: true,
                digits  : true
            },
            state        : 'required',
            city        : 'required'
            
        },
        messages: {
            profile_image: {
                  extension: "Seleccione una imagen válida"
                },
            zip: {
                  required: "Ingrese un código postal",
                },
            email: {
                  email: "Ingrese un email válido"
                },
            confirm_password: {
                  confirm_password: "Ingrese un password válido",
                  equalTo: "Los passwords no coinciden"
                }
        }
    });
    }(jQuery, window));